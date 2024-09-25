<?php
$email = $_POST["email"];
$password = $_POST["password"];

$con = new mysqli ("localhost", "java","Java_420_da","customer details");
if ($con->connect_error) {
    die("Failed to connect : " .$con->connect_error);
} else {
    $stmt = $con->prepare("select * from customer where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            session_start();
            $_SESSION['customer_id'] = $data['id'];
            header("Location:customer_page1.php");
        }else {
            
            header("Location:customer_popup.html");
        }
    }else {
        header("Location:customer_popup.html");
    }
}
