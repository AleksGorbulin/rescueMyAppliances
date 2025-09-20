<?php
function insertCustomerIfNotExists($name, $email, $phone, $streetAddress, $city, $state, $zip) {
    // Establish a database connection
    $dbh = new PDO("mysql:host=localhost;dbname=rescueMyAppliances", 'root', 'root');

    // Check if the customer already exists based on email and phone
    $checkCustomerSQL = "SELECT id FROM customer WHERE Email = ? OR Phone = ?";
    $stmt = $dbh->prepare($checkCustomerSQL);
    $stmt->execute([$email, $phone]);
    $existingCustomer = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$existingCustomer) {
        // Customer does not exist, insert them
        $insertCustomerSQL = "INSERT INTO customer (Name, Email, Phone, StreetAddress, City, State, Zip)
                              VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $dbh->prepare($insertCustomerSQL);
        $stmt->execute([$name, $email, $phone, $streetAddress, $city, $state, $zip]);

        // Retrieve the ID of the newly inserted customer
        $customerId = $dbh->lastInsertId();
    } else {
        // Customer already exists, use their existing ID
        $customerId = $existingCustomer['id'];
    }

    // Close the database connection
    $dbh = null;

    return $customerId;
}



function insertApplianceAndGetID($appliance, $model, $serial) {
    // Establish a database connection
    $dbh = new PDO("mysql:host=localhost;dbname=rescueMyAppliances", 'root', 'root');

    // Prepare the SQL statement to insert the appliance
    $insertApplianceSQL = "INSERT INTO appliance (appliance, model, serial)
                           VALUES (?, ?, ?)";
    $stmt = $dbh->prepare($insertApplianceSQL);
    $stmt->execute([$appliance, $model, $serial]);

    // Retrieve the ID of the newly inserted appliance
    $applianceId = $dbh->lastInsertId();

    // Close the database connection
    $dbh = null;

    return $applianceId;
}


function insertWorkOrder($customerId, $applianceId, $problem) {
    // Establish a database connection
    $dbh = new PDO("mysql:host=localhost;dbname=rescueMyAppliances", 'root', 'root');

    // Prepare the SQL statement
    $insertWorkOrderSQL = "INSERT INTO workOrder (customerId, applianceId, problem)
                           VALUES (?, ?, ?)";

    // Prepare and execute the SQL statement
    $stmt = $dbh->prepare($insertWorkOrderSQL);
    $stmt->execute([$customerId, $applianceId, $problem]);

    // Close the database connection
    $dbh = null;
}
?>
