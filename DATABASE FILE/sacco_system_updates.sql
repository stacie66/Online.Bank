-- OTP Verification Fields
ALTER TABLE members ADD otp_code VARCHAR(6);
ALTER TABLE members ADD otp_expiry DATETIME;
ALTER TABLE members ADD is_verified BOOLEAN DEFAULT 0;

-- Credit Scoring
ALTER TABLE members ADD credit_score INT DEFAULT 0;

-- Gamified Savings
ALTER TABLE members ADD points INT DEFAULT 0;

-- Loan Default Prediction
ALTER TABLE members ADD late_payment_count INT DEFAULT 0;
