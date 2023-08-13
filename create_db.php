<?php
$servername = "127.0.0.1";
$username = "Ankita";
$password = "ankita";

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$dbName = "contactdata";
$sqlCreateDb = "CREATE DATABASE $dbName";

if ($conn->query($sqlCreateDb) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

// Create a connection to the new database
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the table
$sqlCreateTable = "CREATE TABLE contact_form (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
