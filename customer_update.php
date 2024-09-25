<?php
session_start();
if (isset($_SESSION['customer_email'])) {
    $customer_email = $_SESSION['customer_email'];
} else {
    die("Customer email not set in session.");
}

$conn = new mysqli("localhost", "java", "Java_420_da", "customer details");

// Improved error handling for connection
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch and sanitize user inputs
    $name = $conn->real_escape_string($_POST['name']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $address = $conn->real_escape_string($_POST['address']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE customer SET name=?, mobile=?,address=?, email=?, password=? WHERE email=?");
    $stmt->bind_param("sssss", $name, $mobile,$address, $email, $password, $customer_email);

    if ($stmt->execute()) {
        header("Location:customer_viewprf.php");
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request method.";
}

// Close the connection
$conn->close();
?>
