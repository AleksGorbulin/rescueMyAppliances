<?php
// Disable error display in production
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/emailModel/emailModel.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name          = filter_var($_POST['name']     ?? '', FILTER_SANITIZE_STRING);
    $customerEmail = filter_var($_POST['email']    ?? '', FILTER_SANITIZE_EMAIL);
    $phone         = filter_var($_POST['phone']    ?? '', FILTER_SANITIZE_STRING);
    $address       = filter_var($_POST['address']  ?? '', FILTER_SANITIZE_STRING);
    $appliance     = filter_var($_POST['appliance']?? '', FILTER_SANITIZE_STRING);
    $problem       = filter_var($_POST['problem']  ?? '', FILTER_SANITIZE_STRING);

    if (!$customerEmail || !filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email';
        exit;
    }

    $customerEmailContent = getCustomerEmailContent($name, $customerEmail, $phone, $address, $appliance, $problem);
    $servicerEmailContent = getServicerEmailContent($name, $customerEmail, $phone, $address, $appliance, $problem);

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0; // Disable debug output in production

    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USERNAME;
        $mail->Password   = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;

        $mail->CharSet = 'UTF-8';
        $mail->setFrom(COMPANY_EMAIL, COMPANY_NAME);
        $mail->isHTML(true);

        // Send confirmation to customer
        $mail->clearAllRecipients();
        $mail->Subject = 'Service Request Confirmation';
        $mail->Body    = $customerEmailContent;
        $mail->addAddress($customerEmail, $name);
        $sentCustomer = $mail->send();

        // Send notification to company
        $mail->clearAllRecipients();
        $mail->Subject = 'Service Request Notification';
        $mail->Body    = $servicerEmailContent;
        $mail->addAddress(COMPANY_EMAIL, 'Request notification');
        $sentServicer = $mail->send();

        echo ($sentCustomer && $sentServicer) ? 'success' : 'Email sending failed.';
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

}
