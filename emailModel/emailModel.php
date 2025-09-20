<?php 

function getCustomerEmailContent($name, $customerEmail, $phone, $address, $appliance, $problem) {
    $emailContent = CSS_EMAIL .'
    <div class="emailBody">
        <div class="emailContent">
            <h1 style="color: #333; text-align: center;">Service Request Confirmation</h1>
            <p>Dear ' . $name . ',</p>
            <p>Thank you for choosing ' . COMPANY_NAME . '.</p>
            <p>We have received your Service Request:</p>
            <ul style="list-style-type: none; padding: 0;">
                <li><strong>Name:</strong> ' . $name . '</li>
                <li><strong>Email:</strong> ' . $customerEmail . '</li>
                <li><strong>Phone Number:</strong> ' . $phone . '</li>
                <li><strong>Address:</strong> ' . $address . '</li>
                <li><strong>Appliance:</strong> ' . $appliance . '</li>
                <li><strong>Service Request:</strong> ' . $problem . '</li>
            </ul>
            <p>Our team will be in touch with you shortly to discuss the details further.</p>
            <p>If you have any immediate questions or additional information you\'d like to share,
                please feel free to reply to this email or call our customer service team at ' . COMPANY_PHONE . '. We\'re here to help!</p>
            <p>Once again, thank you for choosing ' . COMPANY_NAME . '. We look forward to serving you and exceeding your expectations.</p>
            <br />
            <p style="text-align: left;">
                Best Regards,
                <br>Alex
                <br>Customer Support Specialist
                <br>' . COMPANY_NAME . '
                <br>' . COMPANY_PHONE . '
                <!-- <a href="{{companyWebsite}}"> -->
                <br><a href="'.COMPANY_WEBSITE.'">' . COMPANY_WEBSITE . '</a>
                <br>' . COMPANY_EMAIL . '
            </p>
        </div>
    </div>';

    return $emailContent;
}

function getServicerEmailContent($name,$customerEmail, $phone, $address, $appliance, $problem) {
        $emailContent = CSS_EMAIL .'
        <div class="emailBody">
                <div class="emailContent">
                    <h1 style="color: #333; text-align: center;">Service Request Confirmation</h1>
                    <p>Dear ' . COMPANY_NAME . ',</p>
                    <p>You received a new Service Request:</p>
                    <ul style="list-style-type: none; padding: 0;">
                        <li><strong>Name:</strong> ' . $name .'</li>
                        <li><strong>Email:</strong> ' . $customerEmail .'</li>
                        <li><strong>Phone Number:</strong> ' . $phone .'</li>
                        <li><strong>Address:</strong> ' . $address . '</li>
                        <li><strong>Appliance:</strong> ' . $appliance . '</li>
                        <li><strong>Service Request:</strong> ' . $problem . '</li>
                    </ul>
                    <p>Please contact the customer ASAP.</p>
                </div>
        </div>
            ';
    return $emailContent;
}

?>