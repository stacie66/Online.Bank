<?php
function predict_default($loan_amount, $income, $credit_history, $term_years, $credit_score, $age) {
    // Create a score based on risk factors
    $dti = $loan_amount / max(1, $income);
    $risk = 0;
    $risk += ($dti > 0.4) ? 2 : 0;
    $risk += ($loan_amount > 500000) ? 1 : 0;
    $risk += ($term_years > 10) ? 1 : 0;
    $risk += ($credit_score < 600) ? 2 : 0;
    $risk += ($credit_history == 0) ? 2 : 0;
    $risk += ($age < 21 || $age > 65) ? 1 : 0;

    // Normalize risk to probability between 0–1
    $prob = min(1, $risk / 8);
    $label = ($prob >= 0.5) ? "Likely Default" : "Likely Good";

    return ['label' => $label, 'prob' => round($prob * 100, 2)];
}

// Calculate rewards points
function calculate_rewards($regular_savings, $timely_repayments) {
    $points = 0;
    if ($regular_savings) $points += 50;   // e.g., 50 points for regular savings
    if ($timely_repayments) $points += 100; // 100 points for timely loan repayments
    return $points;
}

$prediction = null;
$errors = [];
$reward_points = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Safely get POST inputs with null coalescing to avoid warnings
    $amt = floatval($_POST['loan_amount'] ?? 0);
    $inc = floatval($_POST['income'] ?? 0);
    $credHist = intval($_POST['credit_history'] ?? 0);
    $term = floatval($_POST['loan_term'] ?? 0);
    $score = intval($_POST['credit_score'] ?? 0);
    $age = intval($_POST['age'] ?? 0);

    $regular_savings = isset($_POST['regular_savings']);
    $timely_repayments = isset($_POST['timely_repayments']);

    // Validate inputs
    if ($amt <= 0) $errors[] = "Loan amount must be positive.";
    if ($inc <= 0) $errors[] = "Income must be positive.";
    if ($term <= 0) $errors[] = "Loan term must be positive.";
    if ($score < 0 || $score > 850) $errors[] = "Credit score must be between 0 and 850.";
    if ($age < 18 || $age > 100) $errors[] = "Age must be between 18 and 100.";

    if (empty($errors)) {
        $prediction = predict_default($amt, $inc, $credHist, $term, $score, $age);
        $reward_points = calculate_rewards($regular_savings, $timely_repayments);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Loan Default Predictor with Rewards</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background: #f1f4f8; }
    .card { margin-top: 50px; }
    .result { font-weight: bold; }
  </style>
</head>
<body>
<div class="container">
  <div class="card mx-auto col-md-8 col-lg-6 shadow-sm">
    <div class="card-body">
      <h3 class="card-title text-center mb-4">Loan Default Predictor with Rewards</h3>

      <?php if ($errors): ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach ($errors as $e): ?>
              <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="post" novalidate>
        <?php
        function old($k) {
            if ($k === 'regular_savings' || $k === 'timely_repayments') {
                return isset($_POST[$k]);
            }
            return isset($_POST[$k]) ? htmlspecialchars($_POST[$k]) : '';
        }
        ?>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="loan_amount">Loan Amount (KES)</label>
            <input type="number" step="0.01" id="loan_amount" name="loan_amount" class="form-control" value="<?= old('loan_amount') ?>" required />
          </div>
          <div class="form-group col-md-6">
            <label for="income">Monthly Income (KES)</label>
            <input type="number" step="0.01" id="income" name="income" class="form-control" value="<?= old('income') ?>" required />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="credit_history">Credit History</label>
            <select id="credit_history" name="credit_history" class="form-control" required>
              <option value="1" <?= old('credit_history') === '1' ? 'selected' : '' ?>>Good (No defaults)</option>
              <option value="0" <?= old('credit_history') === '0' ? 'selected' : '' ?>>Bad / None</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="loan_term">Loan Term (years)</label>
            <input type="number" step="0.1" id="loan_term" name="loan_term" class="form-control" value="<?= old('loan_term') ?>" required />
          </div>
          <div class="form-group col-md-4">
            <label for="credit_score">Credit Score</label>
            <input type="number" id="credit_score" name="credit_score" class="form-control" min="0" max="850" value="<?= old('credit_score') ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" id="age" name="age" class="form-control" min="18" max="100" value="<?= old('age') ?>" required />
        </div>

        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="regular_savings" name="regular_savings" <?= old('regular_savings') ? 'checked' : '' ?>>
          <label class="form-check-label" for="regular_savings">I have regular savings</label>
        </div>

        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="timely_repayments" name="timely_repayments" <?= old('timely_repayments') ? 'checked' : '' ?>>
          <label class="form-check-label" for="timely_repayments">I have repaid loans on time</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Predict</button>
      </form>

      <?php if ($prediction): ?>
        <div class="alert alert-info mt-4">
          <p class="result">Result: <?= $prediction['label'] ?></p>
          <p>Confidence: <?= $prediction['prob'] ?>%</p>
          <hr>
          <p><strong>Reward Points Earned:</strong> <?= $reward_points ?></p>
          <small>Earn points for regular savings and timely repayments!</small>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
