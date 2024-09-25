<?php
$email = $_POST["email"];
$password = $_POST["password"];

$con = new mysqli ("localhost", "java","Java_420_da","admin");
if ($con->connect_error) {
    die("Failed to connect : " .$con->connect_error);
} else {
    $stmt = $con->prepare("select * from admin_info where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            session_start();
            $_SESSION['admin_id'] = $data['id'];
            header("Location:admin_main.php");
        }else {
            
            header("Location:admin popup.html");
        }
    }else {
        header("Location:admin popup.html");
    }
}
