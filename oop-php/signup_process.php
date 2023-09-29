<?php
// Include your database connection class
require_once "dbconnect.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password
    $postaladdress = $_POST["postaladdress"];

    // Create a new instance of your database connection class
    $database = new Database();
    $db = $database->getConnection();

    // Define the SQL query using a prepared statement
    $query = "INSERT INTO users (fullname, email, password, postaladdress) VALUES (:fullname, :email, :password, :postaladdress)";

    // Prepare the statement
    $stmt = $db->prepare($query);

    // Bind parameters
    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":postaladdress", $postaladdress);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Registration failed. Please try again later.";
    }
}
?>
