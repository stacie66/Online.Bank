<?php
function predict_default($loan_amount, $income, $credit_history) {
    // Simplified rule-based logic:
    // if DTI > 40% or no credit history → likely default
    $dti = $loan_amount / max(1, $income);
    if ($credit_history == 0 || $dti > 0.4) {
        return ['pred'=>'Likely Default', 'prob'=>min(1, $dti)];
    } else {
        return ['pred'=>'Likely Good', 'prob'=>1 - $dti];
    }
}

$prediction = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loan_amount = floatval($_POST['loan_amount']);
    $income = floatval($_POST['income']);
    $credit_history = intval($_POST['credit_history']);
    $result = predict_default($loan_amount, $income, $credit_history);
    $prediction = [
        'label' => $result['pred'],
        'prob'  => round($result['prob'] * 100, 2)
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan Default Predictor (PHP)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .card { margin-top: 40px; }
    </style>
</head>
<body>
<div class="container">
    <div class="card mx-auto col-md-6">
        <div class="card-body">
            <h4 class="card-title text-center">Loan Default Prediction</h4>
            <form method="post" class="mt-4">
                <div class="form-group">
                    <label for="loan_amount">Loan Amount (KES)</label>
                    <input type="number" step="0.01" name="loan_amount" id="loan_amount" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="income">Monthly Income (KES)</label>
                    <input type="number" step="0.01" name="income" id="income" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="credit_history">Credit History</label>
                    <select name="credit_history" id="credit_history" class="form-control" required>
                        <option value="1">Good (No Defaults)</option>
                        <option value="0">Bad / None</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Predict</button>
            </form>

            <?php if ($prediction): ?>
            <div class="alert alert-info mt-4">
                <h5 class="mb-1">Result: <?php echo htmlspecialchars($prediction['label']); ?></h5>
                <p>Confidence: <?php echo htmlspecialchars($prediction['prob']); ?>%</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
