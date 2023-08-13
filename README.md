# TechSolvIT
Contact Form - PHP, MySQL, and Email Integration

---

**Overview:**

This is a simple example of a contact form that collects user input, validates it, saves it to a MySQL database, and sends an email notification to a specified address.

**Instructions:**

1. Configure the Database:

   - Create a MySQL database on your server.
   - Update the following variables in 'process.php' to match your database credentials:
     - $servername: Your MySQL server hostname
     - $username: Your MySQL username
     - $password: Your MySQL password
     - $dbname: Name of the database you created

2. Upload Files:

   - Upload 'index.html' and 'process.php' to your server's directory where you want the contact form to be accessible.

3. Create the Database Table:

   - Run the following SQL command in your MySQL database (using phpMyAdmin or a MySQL client) to create the necessary table:
     
     CREATE TABLE contact_form (
         id INT(11) AUTO_INCREMENT PRIMARY KEY,
         fullname VARCHAR(255) NOT NULL,
         phone VARCHAR(15) NOT NULL,
         email VARCHAR(255) NOT NULL,
         subject VARCHAR(255) NOT NULL,
         message TEXT NOT NULL,
         submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
         ip_address VARCHAR(45)
     );

4. Usage:

   - Access the contact form by opening 'index.html' in a web browser.
   - Fill in all the required fields: Full Name, Phone Number, Email, Subject, and Message.
   - Click the 'Submit' button.
   - You will receive a success message upon successful submission.

5. Notes:

   - Validation is done using PHP to ensure that required fields are filled in and that the email is in the correct format.
   - Submitted data is sanitized before being inserted into the database to prevent SQL injection.
   - The form data, along with IP address and submission timestamp, is saved to the 'contact_form' table.
   - An email notification is sent to 'test@techsolvitservice.com' containing the form submission details.

---





