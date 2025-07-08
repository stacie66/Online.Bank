<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Banking & SACCO FAQs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .faq-question {
      cursor: pointer;
      padding: 12px;
      background-color: #f1f1f1;
      border-radius: 6px;
      margin-bottom: 8px;
      transition: background-color 0.2s;
    }

    .faq-question:hover {
      background-color: #e0e0e0;
    }

    .faq-answer {
      display: none;
      padding: 12px;
      background-color: #e7f9e7;
      border-left: 4px solid green;
      border-radius: 6px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h3 class="mb-4">Top 50 Banking & SACCO FAQs</h3>

  <!-- QUESTIONS & ANSWERS -->
  <div class="faq-question" onclick="toggleAnswer(this)">1. What are your working hours?</div>
  <div class="faq-answer">Branches operate Monday to Friday from 8:30 AM to 4:30 PM, and Saturdays from 9:00 AM to 1:00 PM.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">2. Where is your nearest branch?</div>
  <div class="faq-answer">Use our website or app's branch locator, or SMS "BRANCH [Your Location]" to 12345.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">3. How can I contact customer care?</div>
  <div class="faq-answer">Call us at 0700123456, email info@bank.co.ke, or visit any branch.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">4. Do you offer online banking?</div>
  <div class="faq-answer">Yes, our online banking allows balance checks, fund transfers, bill payments, and more.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">5. Is online banking secure?</div>
  <div class="faq-answer">Yes, we use advanced encryption and two-factor authentication to protect your account.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">6. How do I open a bank account?</div>
  <div class="faq-answer">Visit any branch with your ID, passport photo, and proof of address. Some accounts can be opened online.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">7. What types of accounts do you offer?</div>
  <div class="faq-answer">We offer savings, current, fixed deposit, student, and business accounts.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">8. What documents do I need to open an account?</div>
  <div class="faq-answer">You need a national ID/passport, proof of address, passport photo, and initial deposit.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">9. What is the minimum opening balance?</div>
  <div class="faq-answer">Savings accounts require KES 1,000; current accounts require KES 5,000.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">10. How do I close my account?</div>
  <div class="faq-answer">Visit any branch with your ID. Ensure the balance is zero before closure.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">11. Can I update my account details online?</div>
  <div class="faq-answer">Most changes require in-branch verification, especially name or ID updates.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">12. How do I get a bank statement?</div>
  <div class="faq-answer">Via the mobile app, online banking, or request a printed copy at any branch.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">13. How do I check my account balance?</div>
  <div class="faq-answer">Through our app, USSD (*123#), online banking, or ATM.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">14. What happens if my account is dormant?</div>
  <div class="faq-answer">Inactive accounts are classified as dormant after 6 months. Visit a branch to reactivate.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">15. Can I open a joint account?</div>
  <div class="faq-answer">Yes, joint accounts can be opened by two or more individuals with proper identification.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">16. How do I register for mobile banking?</div>
  <div class="faq-answer">Dial *123# or download our app and follow the registration instructions.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">17. What can I do with mobile banking?</div>
  <div class="faq-answer">Check balances, transfer funds, pay bills, buy airtime, apply for loans, and more.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">18. Is mobile banking free?</div>
  <div class="faq-answer">Registration is free. Transaction fees may apply for certain services.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">19. I forgot my mobile banking PIN. What do I do?</div>
  <div class="faq-answer">Use the app’s “Forgot PIN” option or dial *123# and follow the reset instructions.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">20. Can I use mobile banking without a smartphone?</div>
  <div class="faq-answer">Yes, our USSD service works on any phone by dialing *123#.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">21. Is it safe to use banking apps?</div>
  <div class="faq-answer">Yes, provided you keep your PIN secure and avoid sharing credentials.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">22. Can I block my card using the app?</div>
  <div class="faq-answer">Yes, go to the card settings section and choose “Block Card”.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">23. Can I open an account online?</div>
  <div class="faq-answer">Yes, through our website or app — valid ID and selfie verification required.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">24. How do I change my mobile number?</div>
  <div class="faq-answer">Visit a branch with your ID and request the update.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">25. What should I do if mobile banking is not working?</div>
  <div class="faq-answer">Contact customer care or visit a branch for assistance.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">26. How do I get an ATM card?</div>
  <div class="faq-answer">Visit a branch with your ID. The card is usually ready in 7 working days.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">27. How do I activate my new card?</div>
  <div class="faq-answer">Use *123# or ATM activation as instructed during card collection.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">28. What should I do if my card is blocked?</div>
  <div class="faq-answer">Call 0700123456 to unblock or request a replacement.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">29. Are there charges for ATM withdrawals?</div>
  <div class="faq-answer">ATM withdrawals at our ATMs are free; other banks charge KES 30.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">30. Can I use my card abroad?</div>
  <div class="faq-answer">Yes, ensure international usage is enabled. Inform us before traveling.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">31. What if I lose my card?</div>
  <div class="faq-answer">Call us immediately to block it. Visit a branch for replacement.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">32. What is the daily ATM withdrawal limit?</div>
  <div class="faq-answer">KES 40,000 per day.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">33. Can I tap to pay?</div>
  <div class="faq-answer">Yes, our Visa and MasterCard debit cards support contactless payments.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">34. How do I change my card PIN?</div>
  <div class="faq-answer">Visit an ATM or use the mobile app’s card settings.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">35. What if someone knows my PIN?</div>
  <div class="faq-answer">Change it immediately and monitor your account for unusual activity.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">36. How do I apply for a loan?</div>
  <div class="faq-answer">Use our app, online banking, or visit a branch with required documents.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">37. What loan products do you offer?</div>
  <div class="faq-answer">We offer personal, business, mortgage, SACCO, and emergency loans.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">38. What is the interest rate on loans?</div>
  <div class="faq-answer">Rates start at 12% p.a., depending on the product and your credit rating.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">39. How long does loan approval take?</div>
  <div class="faq-answer">Typically 24 hours for existing customers with complete documents.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">40. What are loan application requirements?</div>
  <div class="faq-answer">You’ll need ID, payslips, bank statements, and CRB clearance.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">41. How do I check my loan balance?</div>
  <div class="faq-answer">Via our app, USSD *123#, or visit a branch.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">42. What is a SACCO?</div>
  <div class="faq-answer">A SACCO is a cooperative that pools member savings to offer affordable credit.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">43. How do I join the SACCO?</div>
  <div class="faq-answer">Visit our office with ID, passport photos, registration fee, and share capital.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">44. What are SACCO benefits?</div>
  <div class="faq-answer">Lower loan rates, dividends, savings growth, and financial education.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">45. Can I withdraw my SACCO savings?</div>
  <div class="faq-answer">Yes, with a 60-day notice. Emergency withdrawals have special conditions.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">46. When are SACCO dividends paid?</div>
  <div class="faq-answer">Dividends are paid annually after the Annual General Meeting, usually in March.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">47. Do you offer forex services?</div>
  <div class="faq-answer">Yes, we buy and sell major currencies at competitive rates.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">48. How do I report fraud?</div>
  <div class="faq-answer">Call our fraud hotline at 0700987654 or visit a nearby branch.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">49. Can I get investment options?</div>
  <div class="faq-answer">Yes, we offer fixed deposits, mutual funds, and treasury bonds.</div>

  <div class="faq-question" onclick="toggleAnswer(this)">50. How do SACCO loans work?</div>
  <div class="faq-answer">After saving for 3 months, members can borrow up to 3x their savings.</div>

</div>

<script>
  function toggleAnswer(element) {
    // Close all others
    document.querySelectorAll('.faq-answer').forEach(el => {
      if (el !== element.nextElementSibling) el.style.display = 'none';
    });
    // Toggle selected
    const answer = element.nextElementSibling;
    answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
  }
</script>

</body>
</html>
