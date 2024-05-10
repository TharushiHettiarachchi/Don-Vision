<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <div class="headerMain" style="background-color: white; z-index: 100;">
        <nav style="background-color: white;">
            <div class="navbar" style="background-color: white;">
                <img src="resources/logo.jpg" class="logo" />

                <ul class="text">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="aboutUs.php">About</a></li>
                    <li><a href="contactUs.php">Contact Us</a></li>
                </ul>
                <ul class="icon">
                    <li><a href="favourite.php"><i class="bi bi-heart"></i></a></li>
                    <li><a href="cart.php"><i class="bi bi-cart4"></i></a></li>
                    <li><a href="profile.php"><i class="bi bi-person-circle"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
   
    <!-- Top Navigation Menu -->
    <div class="topnav">
        <div class="active">
            <img src="resources/logo.jpg" class="logo" />
            <div class="headerDiv1">
                <a href="favourite.php"><i class="bi bi-heart headerIcon2"></i></a>
                <a href="cart.php"><i class="bi bi-cart4 headerIcon2"></i></a>
                <a href="profile.php"><i class="bi bi-person-circle headerIcon2"></i></a>

            </div>


        </div>

        <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
            <a href="index.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="aboutUs.php">About</a>
            <a href="contactUs.php">Contact Us</a>
        </div>
        <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

</body>

</html>