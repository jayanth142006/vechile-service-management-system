<?php

$servername = "localhost";
$dbusername = "java";
$dbpass = "Java_420_da";
$dbname = "admin";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password before storing it
    

    try {
        // Connect to the main database
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user details into the 'admin_info' table
        $query = "INSERT INTO admin_info (name, mobile, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$name, $mobile, $email, $password]);
        
        // Redirect to the login page
        header('Location: admin_login.html');

        // Close the database connection and statement
        $db = null;
        $stmt = null;
        exit();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
