<?php
// Company info
define('COMPANY_NAME','Rescue My Appliances');
define('COMPANY_PHONE','(619)-888-6420');
define('COMPANY_WEBSITE','www.RescueMyAppliances.com');
define('COMPANY_EMAIL','RescueMyAppliancesDispatch@gmail.com'); // also used as SMTP username in example

// Load secrets if available
if (file_exists(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
}

define('CSS_EMAIL', '
<style>
.emailBody { font-family: Arial, sans-serif; text-align: left; background:#f5f5f5; padding:10px; margin:0; }
.emailContent { font-family: Arial, sans-serif; text-align: left; background:#fff; max-width:600px; margin:0 auto; padding:20px; border-radius:5px; box-shadow:0 2px 5px rgba(0,0,0,.1); }
</style>
');
