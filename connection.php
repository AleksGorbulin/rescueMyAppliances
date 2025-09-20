<!-- <?php
//Local connection on your computer -- Comment out Line 6 when you upload to the school server. Your password is root on a Mac. On a PC, the password is an empty string.
$dbh = new PDO("mysql:host=localhost;dbname=rescueMyAppliances", 'root', 'root');
//   echo 'I am connected to my home computer localhost. Yippee!';

// Define SQL statement to create customer table if it does not exist
$createCustomerTableSQL = "CREATE TABLE IF NOT EXISTS customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    StreetAddress VARCHAR(255) NOT NULL,
    City VARCHAR(20) NULL,
    State VARCHAR(50) NULL,
    Zip VARCHAR(20)  NULL
)";

// SQL statement to create the "appliance" table if it doesn't exist
$createApplianceTableSQL = "
    CREATE TABLE IF NOT EXISTS appliance (
        id INT AUTO_INCREMENT PRIMARY KEY,
        appliance VARCHAR(255) NOT NULL,
        model VARCHAR(255) NULL,
        serial VARCHAR(255) NULL
    )
";

// SQL statement to create the "work order" table if it doesn't exist
$createWorkOrderTableSQL = "
    CREATE TABLE IF NOT EXISTS workOrder (
        workOrderId INT AUTO_INCREMENT PRIMARY KEY,
        customerId INT,
        applianceId INT,
        problem TEXT,
        FOREIGN KEY (customerId) REFERENCES customer(id),
        FOREIGN KEY (applianceId) REFERENCES appliance(id)
    )
";

// Execute the SQL statement to create the table
if ($dbh->exec($createCustomerTableSQL) !== false &&
    $dbh->exec($createApplianceTableSQL) !== false &&
    $dbh->exec($createWorkOrderTableSQL) !== false) {
    echo "Tables created successfully or already exists.";
} else {
    echo "Error creating customer table: " . implode(", ", $dbh->errorInfo());
}

// Close the database connection
$dbh = null;
?> -->


