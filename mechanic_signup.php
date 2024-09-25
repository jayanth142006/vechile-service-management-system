<?php

$servername = "localhost";
$dbusername = "java";
$dbpass = "Java_420_da";
$dbname = "mechanic";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Connect to the main database
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user details into the 'admin_info' table
        $query = "INSERT INTO mechanic_info (name, mobile, address, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$name, $mobile, $address, $email, $password]);

        // Redirect to the login page
        header('Location: mechanic_login.html');
        $db = null;
        $stmt = null;
        exit();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
