<?php

require ("../common.php");
// get age data
// [12, 19, 3, 5, 2, 3],

$doctorId = $_SESSION['user']['ID'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

<!--Main Navigation-->
<header>


    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">
            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="DoctorDashboard.php">Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link waves-effect" href="#" >Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="DoctorPatientList.php">Patient List</a>
                    </li>
                </ul>

                <ul class="navbar-nav nav-flex-icons">

                    <li class="nav-item">
                        <a href="../index.php" class="nav-link border border-light rounded waves-effect">
                            Log out
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
            <img src="../src/img/logo.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <a href="DoctorDashboard.php" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-pie-chart mr-3"></i>Dashboard
            </a>
            <a href="#" class="list-group-item active  waves-effect">
                <i class="fa fa-user mr-3"></i>Profile</a>
            <a href="DoctorPatientList.php" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-table mr-3"></i>Patient List</a>

        </div>

    </div>
    <!-- Sidebar -->

</header>
<!--Main Navigation-->

<br>
<br>

<!--Main layout-->
<main class="pt-5 mx-lg-5">

    <!-- Card Regular -->
    <div class="card card-cascade">

        <!-- Card image -->
        <div class="view view-cascade overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/men.jpg" alt="Card image cap">
            <a>
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">

            <!-- Title -->
            <h4 class="card-title"><strong><?php echo $_SESSION['user']['name'];?></strong></h4>
            <!-- Subtitle -->
            <h6 class="font-weight-bold indigo-text py-2"><?php echo $_SESSION['user']['Position'];?></h6>
            <!-- Text -->
            <p class="card-text"><?php echo $_SESSION['user']['Company'];?>
            </p>

        </div>

    </div>
    <!-- Card Regular -->
</main>

<br>
<br>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>


</body>

</html>