<!DOCTYPE html>
<html lang="en" data-bs-theme="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
        body, html {
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.941);
        }

        .gradient-background {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: linear-gradient(300deg, #00bfff, #ff4c68, #ef8172);
            background-size: 180% 180%;
            animation: gradient-animation 18s ease infinite;
            min-height: 100vh;
            position: relative;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .bottom-content {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 7%;
        }

        .button-group button {
            height: 150px;
            width: 250px;
            border-radius: 10%;
            margin-right: 10px;
        }

        .button-group button img {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;}
    </style>
</head>
<body>
<div class="gradient-background">
  <div class="gradient-ba" style="background-color:rgba(0, 0, 0, 0.941); ">
      <div class="container" style="background-color: rgba(0, 0, 0, 0.941);">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" style="margin-left: 30px;">
                <img src="img/logo.png" style="height: 40px;"><br><br>
                <span style="color: white; font-size: 20px; margin-left: 10px;">S.L REPAIR & SERVICE CENTER</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <ul class="nav nav-pills" style="margin-right: 30px;">
                <li class="nav-item"><a href="project_home.html" class="nav-link" >Home</a></li>
                <li class="nav-item"><a href="customer_login.html" class="nav-link active" aria-current="page">Customer</a></li>
                <li class="nav-item"><a href="mechanic_login.html" class="nav-link">Mechanic</a></li>
                <li class="nav-item"><a href="admin_login.html" class="nav-link">Admin</a></li>
                <li class="nav-item"><a href="contact_us.html" class="nav-link">Contact Us</a></li>
            </ul>
            
        </div>
    </nav>

                      
      </div>

    </div>
    <center>
    <div style="width:400px;height:550px;background-color:rgba(0, 0, 0, 0.484);margin-top:6%;border-radius:3%;color:white">
        <div style="margin-bottom:2%">
            <img src="img/custo.png" style="border-radius:50%;height:200px;width:200px;margin-top:10%">
            
        </div>
        <div style="text-align:left;margin-left:15%;margin-top:10%;margin-right:15%">
            <?php
            session_start();

            if (isset($_SESSION['customer_id'])) {
                $customer_id = $_SESSION['customer_id'];}
                

            $con = new mysqli ("localhost", "java","Java_420_da","customer details");
                if ($con->connect_error) {
                    die("Failed to connect : " .$con->connect_error);
                } else {
                    $stmt = $con->prepare("select * from customer where id = ?");
                    $stmt->bind_param("i", $customer_id);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    if ($stmt_result->num_rows > 0) {
                        $data = $stmt_result->fetch_assoc();
                        if($data['id'] === $customer_id) {
                            echo "<p><b style='font-size:20px'>NAME :</b> " .$data['name']. "</p>";
                            echo "<p><b style='font-size:20px'>MOBILE NUMBER :</b> " .$data['mobile']. "</p>";
                            echo "<p><b style='font-size:20px'>ADDRESS :</b> " .$data['address']. "</p>";
                            echo "<p><b style='font-size:20px'>EMAIL :</b> " .$data['email']. "</p>";
                            session_start();
                            $_SESSION['customer_name'] = $data['name'];
                            $_SESSION['customer_mobile'] = $data['mobile'];
                            $_SESSION['customer_address'] = $data['address'];
                            $_SESSION['customer_email'] = $data['email'];
                            $_SESSION['customer_password'] = $data['password'];
                        }}}
                
            ?>
            </div>
            <a href="customer_editprf.php"><button style="width:170px;height:45px;background-color:black;color:white;border-radius:10%;margin-bottom:5%">Edit Profile</button></a>
    </div>
    </center>
</div>
  </div>








        
        







  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    

</body>
