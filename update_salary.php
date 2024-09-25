<?php
// Establish a database connection
$con = mysqli_connect("localhost", "java", "Java_420_da", "mechanic");
if (!$con) {
    die("Connection Error");
}

// Check if the form is submitted
if(isset($_POST['id']) && isset($_POST['newSalary'])) {
    $id = $_POST['id'];
    $newSalary = $_POST['newSalary'];

    // Query to update the customer's salary
    $query = "UPDATE mechanic_info SET salary = '$newSalary' WHERE id = $id";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location:admin_mechanicview.php");
        

    } else {
        echo "Error updating salary: " . mysqli_error($con);
    }
} else {
    echo "Form data not received!";
}
?>
