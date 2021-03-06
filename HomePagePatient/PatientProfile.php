<?php
require ("../common.php");


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

<body>

<!--Main Navigation-->
<header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">
            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link waves-effect" href="HomePatient.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link waves-effect " href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="PatientAppointment.php">Appointment</a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link border border-light rounded waves-effect"
                        >
                            Log out
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="mt-5 pt-5">
    <div class="container">


    <hr class="my-5">

    <!--Section: Cards-->
    <section class="text-center">
        <!-- Card Regular -->

        <div class="row">
            <div class="col-6">
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
                        <h4 class="card-title"><strong>Name: <?php echo $_SESSION['user']['name'];?></strong></h4>
                        <!-- Subtitle -->
                        <h6 class="font-weight-bold indigo-text py-2">Age: <?php echo $_SESSION['user']['age'];?></h6>
                        <!-- Text -->
                        <h6 class="font-weight-bold indigo-text py-2">Gender: <?php echo $_SESSION['user']['gender']?></h6>

                        <h6 class="font-weight-bold indigo-text py-2">Email: <?php echo $_SESSION['user']['email']?></h6>

                    </div>

                </div>

            </div>
            <div class="col-6">
                <div class="card card-cascade">

                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="http://images.mentalfloss.com/sites/default/files/styles/mf_image_16x9/public/164609725.jpg?itok=cQ7v_Y4B&resize=1100x619" alt="Card image cap">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">
                        <?php
                        $PatientId = $_SESSION['user']['ID'];
                        $query = "select Doctor.name, Doctor.email, Doctor.Position from Patient, PatientDoctor, Doctor
                                    where Patient.ID = :id
                                    and Patient.ID = PatientDoctor.PatientID
                                    and PatientDoctor.DoctorID = Doctor.ID";

                        $query_params = array(
                            ':id' => $PatientId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $row = $stmt->fetch();
                        ?>
                        <!-- Title -->
                        <h4 class="card-title"><strong>Your Doctor Information</strong></h4>
                        <h6 class="font-weight-bold indigo-text py-2">Name: <?php echo $row['name'];?></h6>
                        <!-- Text -->
                        <h6 class="font-weight-bold indigo-text py-2">Gender: <?php echo $row['email']?></h6>

                        <h6 class="font-weight-bold indigo-text py-2">Email: <?php echo $row['Position']?></h6>

                    </div>

                </div>
            </div>
        </div>


    </section>

</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">

    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
        <a href="https://www.facebook.com/mdbootstrap" target="_blank">
            <i class="fa fa-facebook mr-3"></i>
        </a>

        <a href="https://twitter.com/MDBootstrap" target="_blank">
            <i class="fa fa-twitter mr-3"></i>
        </a>

        <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
            <i class="fa fa-youtube mr-3"></i>
        </a>

        <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
            <i class="fa fa-google-plus mr-3"></i>
        </a>

    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2018 Copyright:
        <a href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"> University of Pittsburgh </a>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

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