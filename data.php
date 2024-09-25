<?php
// Database connection parameters
$servername = "localhost";
$dbusername = "java";
$dbpass = "Java_420_da";
$dbname = "customer details"; // Corrected the database name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Connect to the main database
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user details into the 'customer' table
        $query = "INSERT INTO customer (name, mobile, address, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$name, $mobile, $address, $email, $password]);

        // Get the last inserted ID
        $customerId = $db->lastInsertId();

        // Start session and set session variables
        session_start();
        $_SESSION['customer_id'] = $customerId;
        $_SESSION['email'] = $email;

        // Close connection
        $db = null;

        // Redirect to another page
        header("Location: customer_login.html");
        exit();

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
