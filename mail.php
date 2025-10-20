<?php
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/emailModel/emailModel.php';

use Mailgun\Mailgun;

// === CONFIG ===
$apiKey = MAILGUN_API_KEY;
$domain  = 'rescuemyappliances.com'; // your verified Mailgun domain
$from    = 'Rescue My Appliances <fixit@rescuemyappliances.com>';
$company = 'fixit@rescuemyappliances.com'; // internal email for notifications

// =======================================================
// 1️⃣ BASIC ANTI-SPAM HONEYPOT CHECK
if (!empty($_POST['username'])) {
    // Hidden field that real users never fill
    http_response_code(403);
    file_put_contents(__DIR__ . '/spam_log.txt', date('Y-m-d H:i:s') . ' - ' . $_SERVER['REMOTE_ADDR'] . "\n", FILE_APPEND);
    exit('Spam detected.');
}


// =======================================================
// 2️⃣ GOOGLE reCAPTCHA v3 VERIFICATION
$recaptchaSecret = '6LcLKvArAAAAAGq6dbD7mzLYDtMFyxTCkLl0XpvU';  // <-- replace this with your real secret key
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

if (!$recaptchaResponse) {
    http_response_code(403);
    exit('Missing reCAPTCHA.');
}

$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret="
    . $recaptchaSecret . "&response=" . $recaptchaResponse . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
$responseData = json_decode($verify);

if (!$responseData->success || ($responseData->score ?? 0) < 0.5) {
    http_response_code(403);
    file_put_contents(__DIR__ . '/spam_log.txt',
        date('Y-m-d H:i:s') . " - reCAPTCHA failed (score: " . ($responseData->score ?? 'N/A') . ") from " . $_SERVER['REMOTE_ADDR'] . "\n",
        FILE_APPEND);
    exit('Spam detected (reCAPTCHA).');
}

// =======================================================
// 2️⃣ SANITIZE AND RETRIEVE FORM DATA
$name      = trim($_POST['name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$phone     = trim($_POST['phone'] ?? '');
$address   = trim($_POST['address'] ?? '');
$appliance = trim($_POST['appliance'] ?? '');
$problem   = trim($_POST['problem'] ?? '');

// =======================================================
// 3️⃣ VALIDATION RULES

// Required fields check
// if (empty($name) || empty($email) || empty($phone) || empty($problem)) {
//     http_response_code(400);
//     exit('Please fill in all required fields.');
// }

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit('Invalid email format.');
}

// Validate name (letters, spaces, apostrophes, hyphens)
if (!preg_match("/^[a-zA-Z\s'\-]+$/", $name)) {
    http_response_code(400);
    exit('Invalid name format.');
}

// ✅ Looser phone validation — only checks allowed characters, not length
// if (!preg_match("/^[0-9\-\+\(\)\s]+$/", $phone)) {
//     http_response_code(400);
//     exit('Invalid phone number format.');

// Optional: block disposable email domains
$blockedDomains = ['tempmail.com', 'mailinator.com', 'guerrillamail.com', '10minutemail.com'];
foreach ($blockedDomains as $domainBlocked) {
    if (str_ends_with(strtolower($email), $domainBlocked)) {
        http_response_code(403);
        exit('Temporary email addresses are not accepted.');
    }
}

// =======================================================
// 4️⃣ GENERATE EMAIL CONTENT USING EXISTING TEMPLATES
$customerEmailContent = getCustomerEmailContent($name, $email, $phone, $address, $appliance, $problem);
$servicerEmailContent = getServicerEmailContent($name, $email, $phone, $address, $appliance, $problem);

// =======================================================
// 5️⃣ SEND EMAILS VIA MAILGUN
try {
    $mg = Mailgun::create($apiKey);

    // Send confirmation to customer
    $mg->messages()->send($domain, [
        'from'    => $from,
        'to'      => $email,
        'subject' => 'Service Request Confirmation',
        'html'    => $customerEmailContent,
        'text'    => strip_tags($customerEmailContent)
    ]);

    // Send notification to company
    $mg->messages()->send($domain, [
        'from'    => $from,
        'to'      => $company,
        'subject' => 'New Service Request Notification',
        'html'    => $servicerEmailContent,
        'text'    => strip_tags($servicerEmailContent)
    ]);

    echo 'true';
} catch (\Exception $e) {
    error_log('Mailgun error: ' . $e->getMessage());
    http_response_code(500);
    echo 'false';
}
?>
