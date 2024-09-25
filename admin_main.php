<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Main Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            margin-top: 12%;
        }

        .button-group button {
            height: 350px;
            width: 350px;
            border-radius: 10%;
            margin-right: 50px;
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
                <li class="nav-item"><a href="customer_login.html" class="nav-link">Customer</a></li>
                <li class="nav-item"><a href="mechanic_login.html" class="nav-link">Mechanic</a></li>
                <li class="nav-item"><a href="admin_login.html" class="nav-link active" aria-current="page">Admin</a></li>
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
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                            </svg>
                            <br> DASHBOARD
                        </button></a>
                        <a href="admin_customer.html"><button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                            <img src="img/cus.png"><br> CUSTOMER
                        </button></a>
                        <a href="admin_mechanic.html"><button type="button" class="list-group-item list-group-item-action" style="margin-bottom: 10px;text-align: center;background-color: white;color: black;">
                            <img src="img/mec.png"><br> MECHANIC
                        </button></a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>

        <div class="button-group">
            <a href="admin_customer.html"><button>
                <img src="img/cus.png"><br>customer
            </button></a>
            <a href="admin_mechanic.html"><button>
                <img src="img/mec.png"><br>mechanic
            </button></a>
            
            
        </div>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
