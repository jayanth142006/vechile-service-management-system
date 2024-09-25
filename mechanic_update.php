<?php
session_start();
if (isset($_SESSION['mechanic_id'])) {
    $mechanic_id = $_SESSION['mechanic_id'];
} else {
    die("Mechanic ID not set in session.");
}

$conn = new mysqli("localhost", "java", "Java_420_da", "mechanic");

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
    $stmt = $conn->prepare("UPDATE mechanic_info SET name=?, mobile=?, address=?, email=?, password=? WHERE id=?");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("sssssi", $name, $mobile, $address, $email, $password, $mechanic_id);

    if ($stmt->execute()) {
        header("Location: mechanic_viewprf.php");
        exit;
    } else {
        echo "Error updating record: " . htmlspecialchars($stmt->error);
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request method.";
}

// Close the connection
$conn->close();
?>
