<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $v_type = $_POST["v_type"];
    $v_number = $_POST["v_number"];
    $v_brand = $_POST["v_brand"];
    $v_model = $_POST["v_model"];
    $v_problem = $_POST["v_problem"];
    
        

        session_start();

            if (isset($_SESSION['customer_id'])) {
                $customer_id = $_SESSION['customer_id'];}
                

            $con = new mysqli ("localhost", "java","Java_420_da","customer details");
                if ($con->connect_error) {
                    die("Failed to connect : " .$con->connect_error);
                } else {
                    $stmt1 = $con->prepare("select * from customer where id = ?");
                    $stmt1->bind_param("i", $customer_id);
                    $stmt1->execute();
                    $stmt_result = $stmt1->get_result();
                    if ($stmt_result->num_rows > 0) {
                        $data = $stmt_result->fetch_assoc();
                        if($data['id'] === $customer_id) {
                            $query = "INSERT INTO request(user_id,customer_email,vehicle_type, vehicle_number, vehicle_brand, vehicle_model, problem_description) VALUES (?,?,?,?,?,?,?)";
                            $stmt2 = $con->prepare($query);
                            $stmt2->execute([$customer_id,$data['email'],$v_type,$v_number, $v_brand, $v_model,$v_problem]) ;
                            $con = null;
                            
                        }}}
                

        header("Location: customer_page1.php");
        exit();
}
