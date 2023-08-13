<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Validation
    $errors = array();
    if (empty($fullName)) {
        $errors[] = "Full Name is required.";
    }
    if (empty($phoneNumber)) {
        $errors[] = "Phone Number is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }
    if (empty($message)) {
        $errors[] = "Message is required.";
    }
    
    if (empty($errors)) {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contactdata";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Insert data into the database
        $sql = "INSERT INTO contact_form (fullName, phoneNumber, email, subject, message, ip_address, submission_time)
                VALUES ('$fullName', '$phoneNumber', '$email', '$subject', '$message', '" . $_SERVER['REMOTE_ADDR'] . "', NOW())";
        
        if ($conn->query($sql) === TRUE) {
            // Send email notification
            $to = "test@techsolvitservice.com";
            $subject = "New Contact Form Submission";
            $messageBody = "Full Name: $fullName\nPhone Number: $phoneNumber\nEmail: $email\nSubject: $subject\nMessage: $message";
            
            mail($to, $subject, $messageBody);
            
            echo "Form submitted successfully. We'll be in touch soon!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
