<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Your Wellbeing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/about.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/planner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="../home/home.php" class="navbar-brand logo"><span style="color: #fa0202;">Your</span> Wellbeing</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="../home/home.php" class="nav-item nav-link active home-lnk">Home</a>
                <a href="../home/home.php" class="nav-item nav-link about-lnk">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle planner-lnk" data-toggle="dropdown">Planner</a>
                    <div class="dropdown-menu">
                        <a href="../workouts/planner.php" class="dropdown-item">Exercise Planner</a>
                        <a href="../coaches/coach-list.php" class="dropdown-item">Expert Panel</a>
                        <a href="../DietChart/Dietplanner.php" class="dropdown-item">Diet Planner</a>
                        <a href="../bmi/bmi.php" class="dropdown-item">BMI Calculator</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle products-lnk" data-toggle="dropdown">Products</a>
                    <div class="dropdown-menu">
                        <a href="../Products/products.php" class="dropdown-item">Our Products</a>
                        <a href="../Products/cart.php" class="dropdown-item">My Cart</a>
                        <a href="../Products/orders.php" class="dropdown-item">My orders</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle info-lnk" data-toggle="dropdown">Info</a>
                    <div class="dropdown-menu">
                        <a href="../Contact/contact-view.php" class="dropdown-item">Contact Us</a>
                        <?php
                        if (isset($_SESSION['role'])) {
                            echo '<a href="../faq/faq-list.php" class="dropdown-item">FAQ List</a>';
                        } else {
                            echo '<a href="../faq/faq.php" class="dropdown-item">FAQ</a>';
                        }
                        ?>
                        <a href="#" class="dropdown-item">Testimonials</a>
                        <a href="#" class="dropdown-item">Newsletter</a>
                    </div>
                </div>
            </div>
            <div class="navbar-nav">
                <?php
                if (isset($_SESSION['role'])) {
                    echo '<a href="../login/user-list.php" class="nav-item nav-link">Users List</a>';
                    echo ' <a href="../login/logout.php" class="nav-item nav-link">Sign out</a>';
                } else {
                    echo '<a href="../login/login.php" class="nav-item nav-link">Login</a>';
                    echo ' <a href="../login/registration.php" class="nav-item nav-link">Register</a>';
                }

                ?>
            </div>
        </div>
    </nav>