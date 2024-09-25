<?php
session_start();
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
} else {
    die("Customer not logged in.");
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

$con = mysqli_connect("localhost", "java", "Java_420_da", "customer details");
if (!$con) {
    die("Connection Error");
}
$query = "SELECT * FROM request WHERE user_id = $customer_id and total_bill = '-'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Fetch Data From Database in PHP</title>
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

        .table-custom {
            background-color: rgba(0, 0, 0, 0.484); /* Background color of the table */
        }

        .table-custom th {
            background-color: black; /* Header background color */
            color: white; /* Header text color */
        }

        .table-custom td {
            background-color: #f2f2f2; /* Cell background color */
        }

        .table-custom tr:nth-child(even) {
            background-color: #e9e9e9; /* Even row background color */
        }

        .table-custom tr:hover {
            background-color: #d1d1d1; /* Row hover background color */
        }
    </style>
</head>
<body class="gradient-background">
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


    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: white;border-color: white;">
                <img src="img/custo.png" style="margin-left: 10px;width: 30px;">
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="admin_viewprf.php">View Profile</a></li>
                <li><a class="dropdown-item" href="admin_login.html">Logout</a></li>
            </ul>
        </div>
        <a class="navbar-brand" href="project_home.html">Vehicle Service Management</a>
        <form class="d-flex mt-2" role="search">
        <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" style="width:400px">
            <button class="btn btn-success" type="submit" style="background-color:#7f7f7f;width:100px"><b>Search</b></button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Vehicle Service Management</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="background-color: #000000;">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <div class="list-group" style="margin: auto;width:350px;">
                        <a href="admin_main.php"><button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                            <svg class="bi me-2" width="0" height="32"><use xlink:href="#bootstrap"></use></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" style="color: rgb(81, 80, 79);" width="20" height="20" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                            </svg>
                            <br> DASHBOARD
                        </button></a>
                        <button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                            <img src="img/cus.png"><br> CUSTOMER
                        </button>
                        <button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                            <img src="img/mec.png"><br> MECHANIC
                        </button>
                        <button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                            <img src="img/req.png"><br> REQUEST
                        </button>
                        <button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                            <img src="img/feed.png"><br> FEEDBACK
                        </button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        function updateTime() {
            const timeElement = document.getElementById('time');
            const currentTime = new Date();

            // Format the time as HH:MM:SS
            const hours = String(currentTime.getHours()).padStart(2, '0');
            const minutes = String(currentTime.getMinutes()).padStart(2, '0');
            const seconds = String(currentTime.getSeconds()).padStart(2, '0');
            timeElement.innerHTML = `${hours}:${minutes}:${seconds}`;
        }

        // Update the time every second
        setInterval(updateTime, 1000);

        // Initialize the time when the page loads
        window.onload = updateTime;
    </script>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-8 text-center">VIEW STATUS</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center table-custom">
                            <tr class="bg-dark text-white">
                                
                                <th>Vehicle Type</th>
                                <th>Vehicle Number</th>
                                <th>Vehicle Brand</th>
                                <th>Vehicle Model</th>
                                <th>Request Status</th>
                                <th>Problem Description</th>
                                <th>Expected Delivery</th>
                                <th>Request</th>
                                <th>Cancel Request</th>
                            </tr>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)){

                            ?>  
                            <tr>
                            
                                
                                <td><?php echo ucwords($row['vehicle_type']); ?></td>
                                <td><?php echo strtoupper($row['vehicle_number']); ?></td>
                                <td><?php echo ucwords($row['vehicle_brand']); ?></td>
                                <td><?php echo ucwords($row['vehicle_model']); ?></td>
                                <td><?php echo ucwords($row['repair_status']); ?></td>
                                <td><?php echo ucwords($row['problem_description']); ?></td>
                                <td><?php echo ucwords($row['expected_delivery']); ?></td>
                                
                                <?php if ($row['request_status'] == '-') {
                                        // Mechanic not assigned, allow cancel request
                                        echo "<td><a href=\"customer_delireq.php?req_id=".$row['id']."\" class=\"btn btn-primary\">Request</a></td>";
                                    } else {
                                        // Mechanic assigned, do not allow cancel request
                                        echo "<td><a href=\"customer_delireq.php?req_id=".$row['id']."\" class=\"disabled btn btn-primary\">Request</a></td>";
                                    } ?>
                                <?php 
                                    // Check if a mechanic is assigned
                                    if ($row['repair_status'] == 'Pending') {
                                        // Mechanic not assigned, allow cancel request
                                        echo "<td><a href=\"delete.php?Del=".$row['id']."\" class=\"btn btn-close\" style=\"background-color:red\"></a></td>";
                                    } else {
                                        // Mechanic assigned, do not allow cancel request
                                        echo "<td><a href=\"delete.php?Del=".$row['id']."\" class=\"disabled btn btn-close\" style=\"background-color:red\"></a></td>";
                                    }

                                    


                                ?>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
