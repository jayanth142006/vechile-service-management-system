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
    </style>
</head>
<body>
<div class="gradient-background">
  <div class="gradient-ba" style="background-color:rgba(0, 0, 0, 0.941); ">
      <div class="container" style="background-color: rgba(0, 0, 0, 0.941);">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" style="margin-left: 30px;">
                <img src="img/logo.png" style="height: 40px;">
                <span style="color: white; font-size: 20px; margin-left: 10px;">S.L REPAIR & SERVICE CENTER</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav nav-pills" style="margin-right: 30px;">
                <li class="nav-item"><a href="project_home.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="customer_login.html" class="nav-link">Customer</a></li>
                <li class="nav-item"><a href="mechanic_login.html" class="nav-link active" aria-current="page">Mechanic</a></li>
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
            <img src="img/mech.png" style="border-radius:50%;height:200px;width:200px;margin-top:10%">
            
        </div>
        <div style="text-align:left;margin-left:15%;margin-top:10%;margin-right:15%">
            
            <?php
            session_start();

            if (isset($_SESSION['mechanic_id'])) {
                $mechanic_id = $_SESSION['mechanic_id'];}
                

            $con = new mysqli ("localhost", "java","Java_420_da","mechanic");
                if ($con->connect_error) {
                    die("Failed to connect : " .$con->connect_error);
                } else {
                    $stmt = $con->prepare("select * from mechanic_info where id = ?");
                    $stmt->bind_param("i", $mechanic_id);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    if ($stmt_result->num_rows > 0) {
                        $data = $stmt_result->fetch_assoc();
                        if($data['id'] === $mechanic_id) {
                            echo "<p><b style='font-size:20px'>NAME :</b> " .$data['name']. "</p>";
                            echo "<p><b style='font-size:20px'>MOBILE NUMBER :</b> " .$data['mobile']. "</p>";
                            echo "<p><b style='font-size:20px'>ADDRESS :</b> " .$data['address']. "</p>";
                            echo "<p><b style='font-size:20px'>EMAIL :</b> " .$data['email']. "</p>";
                            session_start();
                            $_SESSION['mechanic_name'] = $data['name'];
                            $_SESSION['mechanic_mobile'] = $data['mobile'];
                            $_SESSION['mechanic_address'] = $data['address'];
                            $_SESSION['mechanic_email'] = $data['email'];
                            $_SESSION['mechanic_password'] = $data['password'];
                        }}}
                
            ?>
            </div>
            <a href="mechanic_editprf.php"><button style="width:170px;height:45px;background-color:black;color:white;border-radius:10%">Edit Profile</button></a>
        
    </div>
    </center>
</div>
  </div>








        
        







  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    

</body><!DOCTYPE html>
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
    </style>
</head>
<body>
<div class="gradient-background">
  <div class="gradient-ba" style="background-color:rgba(0, 0, 0, 0.941); ">
      <div class="container" style="background-color: rgba(0, 0, 0, 0.941);">
      <header class="d-flex flex-wrap justify-content-center py-3  border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="0" height="32"><use xlink:href="#bootstrap"></use></svg>
          <svg xmlns="http://www.w3.org/2000/svg" style="color: wheat;" width="26" height="26" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
              <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg>
          <span class="fs-4" style="color: white;">Company Name</span>
        </a>

        <ul class="nav nav-pills" style="margin-right: 30px;">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="customer_login.html" class="nav-link">Customer</a></li>
        <li class="nav-item"><a href="mechanic_login.html" class="nav-link">Mechanic</a></li>
        <li class="nav-item"><a href="admin_login.html" class="nav-link">Admin</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
      </ul>
      </header>

                      
      </div>

    </div>
    <center>
    <div style="width:400px;height:550px;background-color:rgba(0, 0, 0, 0.484);margin-top:6%;border-radius:3%;color:white">
        <div style="text-align:center;">
            <div style="margin-bottom:2%">
                <img src="img/bike2.png" style="border-radius:50%;height:200px;width:200px;margin-top:10%">
                
            </div>
            <?php
            session_start();

            if (isset($_SESSION['admin_id'])) {
                $admin_id = $_SESSION['admin_id'];}
                

            $con = new mysqli ("localhost", "java","Java_420_da","admin");
                if ($con->connect_error) {
                    die("Failed to connect : " .$con->connect_error);
                } else {
                    $stmt = $con->prepare("select * from admin_info where id = ?");
                    $stmt->bind_param("i", $admin_id);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    if ($stmt_result->num_rows > 0) {
                        $data = $stmt_result->fetch_assoc();
                        if($data['id'] === $admin_id) {
                            echo "<p><h4>NAME :</h4> <h5>" .$data['name']. "</h5></p>";
                            echo "<p><h4>MOBILE NUMBER :</h4> <h5>" .$data['mobile']. "</h5></p>";
                            echo "<p><h4>EMAIL :</h4> <h5>" .$data['email']. "</h5></p>";
                            session_start();
                            $_SESSION['admin_name'] = $data['name'];
                            $_SESSION['admin_mobile'] = $data['mobile'];
                            $_SESSION['admin_email'] = $data['email'];
                            $_SESSION['admin_password'] = $data['password'];
                        }}}
                
            ?>
            <a href="admin_edit.php"><button style="width:170px;height:45px;background-color:black;color:white;border-radius:10%">Edit Profile</button></a>
        </div>
    </div>
    </center>
</div>
  </div>