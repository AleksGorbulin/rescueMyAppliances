<?php
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/emailModel/emailModel.php';

use Mailgun\Mailgun;

// === CONFIG ===
$apiKey = MAILGUN_API_KEY;
$domain  = 'rescuemyappliances.com'; // your verified Mailgun domain
$from    = 'Rescue My Appliances <fixit@rescuemyappliances.com>';
$company = 'fixit@rescuemyappliances.com'; // your internal notification inbox

// === COLLECT FORM DATA ===
// Use ternary operators instead of ?? for PHP 7.0 support
$name      = isset($_POST['name'])      ? $_POST['name']      : '';
$email     = isset($_POST['email'])     ? $_POST['email']     : '';
$phone     = isset($_POST['phone'])     ? $_POST['phone']     : '';
$address   = isset($_POST['address'])   ? $_POST['address']   : '';
$appliance = isset($_POST['appliance']) ? $_POST['appliance'] : '';
$problem   = isset($_POST['problem'])   ? $_POST['problem']   : '';

// === BUILD EMAIL CONTENTS ===
$customerEmailContent = getCustomerEmailContent($name, $email, $phone, $address, $appliance, $problem);
$servicerEmailContent = getServicerEmailContent($name, $email, $phone, $address, $appliance, $problem);

// === SEND VIA MAILGUN (SDK v3.x syntax) ===
try {
    // Create Mailgun client with API key
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
    echo 'false';
}
