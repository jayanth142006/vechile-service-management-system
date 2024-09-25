<?php
// Establish a database connection
$con = mysqli_connect("localhost", "java", "Java_420_da", "mechanic");
if (!$con) {
    die("Connection Error");
}

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to fetch customer information based on ID
    $query = "SELECT * FROM mechanic_info WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $currentSalary = $row['salary'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Edit Salary</title>
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


        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            text-align: left;
            z-index: 10;
        }
    </style>
</head>

<body class="gradient-background">
    
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" style="margin-left: 30px;">
                    <img src="img/logo.png" style="height: 40px;">
                    <br><br>
                    <span style="color: white; font-size: 20px; margin-left: 10px;">S.L REPAIR & SERVICE CENTER</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav nav-pills" style="margin-right: 30px;">
                    <li class="nav-item"><a href="project_home.html" class="nav-link">Home</a></li>
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
                                    <svg class="bi me-2" width="0" height="32"><use xlink:href="admin_main.php"></use></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color: rgb(81, 80, 79);" width="20" height="20" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464l7.13-2.852z"></path>
                                    </svg><br> DASHBOARD
                                </button></a>
                                <a href="admin_cust.php"><button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                                    <img src="img/cust.png"><br> CUSTOMER
                                </button></a>
                                <a href="admin_mech.php"><button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                                    <img src="img/mec.png"><br> MECHANIC
                                </button></a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-5 form-container" >
            <h2>Edit Salary</h2>
            <form action="update_salary.php" method="POST">
                <div class="mb-3">
                    <label for="salary" class="form-label">Current Salary:</label>
                    <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $currentSalary; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="newSalary" class="form-label">New Salary:</label>
                    <input type="text" class="form-control" id="newSalary" name="newSalary" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary">Update Salary</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VnYBu1IFf9+Rcoh6F6FOlLh02lvSbL9M1fwNVmch8r3q4sbZo0iH7N6FXIowhxJ5" crossorigin="anonymous"></script>
</body>
</html>

<?php
    } else {
        echo "Customer not found!";
    }
} else {
    echo "Customer ID not provided!";
}
?>
