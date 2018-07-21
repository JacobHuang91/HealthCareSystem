<?php

require ("../common.php");
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
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="DoctorProfile.php" >Profile</a>
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
                <a href="#" class="list-group-item active waves-effect">
                    <i class="fa fa-pie-chart mr-3"></i>Dashboard
                </a>
                <a href="DoctorProfile.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-user mr-3"></i>Profile</a>
                <a href="DoctorPatientList.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Patient List</a>

            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-9 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="myChart"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 mb-4">

                    <!--Card-->
                    <div class="card mb-4">

                        <!-- Card header -->
                        <div class="card-header text-center">
                            Patient Gender Distribution
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <canvas id="pieChart"></canvas>

                        </div>

                    </div>
                    <!--/.Card-->


                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <div class="card-title">
                                    Calendar
                                </div>
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                    <tr>
                                        <th>#</th>
                                        <th>Patient Name</th>
                                        <th>Event</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>

                                <?php // get age
                                $query = "select DoctorCalendar.Event, DoctorCalendar.Date, Patient.name
                                            from DoctorCalendar,Doctor, Patient where DoctorCalendar.DoctorID=Doctor.ID
                                            and Doctor.ID = :id
                                            and DoctorCalendar.PatientID = Patient.ID
                                            and DoctorCalendar.Completed= 'false'
                                            order by DoctorCalendar.Date";

                                $query_params = array(
                                    ':id' => $doctorId
                                );

                                try {
                                    $stmt = $db->prepare($query);
                                    $result = $stmt->execute($query_params);
                                } catch (PDOException $ex) {
                                    die("Failed to run query: " . $ex->getMessage());
                                }

                                $login_ok = false;

                                // validate user and password
                                $rows = $stmt->fetchAll();
                                $count = 1;
                                ?>

                                <?php foreach ($rows as $row): ?>
                                    <tr>
                                        <th scope="row"><?php echo $count++?></th>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['Event']?></td>
                                        <td><?php echo $row['Date']?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <div class="card-title">
                                    History
                                </div>
                                <!-- Table head -->
                                <thead class="blue-grey lighten-4">
                                    <tr>
                                        <th>#</th>
                                        <th>Lorem</th>
                                        <th>Ipsum</th>
                                        <th>Dolor</th>
                                    </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>

                                <?php // get age
                                $query = "select DoctorCalendar.Event, DoctorCalendar.Date, Patient.name
                                            from DoctorCalendar,Doctor, Patient where DoctorCalendar.DoctorID=Doctor.ID
                                            and Doctor.ID = :id
                                            and DoctorCalendar.PatientID = Patient.ID
                                            and DoctorCalendar.Completed= 'true'
                                            order by DoctorCalendar.Date";

                                $query_params = array(
                                    ':id' => $doctorId
                                );

                                try {
                                    $stmt = $db->prepare($query);
                                    $result = $stmt->execute($query_params);
                                } catch (PDOException $ex) {
                                    die("Failed to run query: " . $ex->getMessage());
                                }

                                $login_ok = false;

                                // validate user and password
                                $rows = $stmt->fetchAll();
                                $count = 1;
                                ?>

                                <?php foreach ($rows as $row): ?>
                                    <tr>
                                        <th scope="row"><?php echo $count++?></th>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['Event']?></td>
                                        <td><?php echo $row['Date']?></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->


        </div>
    </main>

    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

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

    <!-- Charts -->
    <script>

        // Line
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: ["0-10", "11-20", "21-30", "31-40", "41-50", "51-60", "61-70","71-80","81-90", "91+"],
                datasets: [{
                    label: 'Patient Age Distribution',

                    data: [<?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age <= 10
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,
                        <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >10
                                  and Patient.age <= 20
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,  <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >20
                                  and Patient.age <= 30
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,  <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >30
                                  and Patient.age <= 40
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,  <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >40
                                  and Patient.age <= 50
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,  <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >50
                                  and Patient.age <= 60
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>, <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >60
                                  and Patient.age <= 70
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,
                        <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >70
                                  and Patient.age <= 80
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,
                        <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >80
                                  and Patient.age <= 90
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>,
                        <?php
                        // get age
                        $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                  WHERE PatientDoctor.DoctorId = :id and Patient.age >90
                                  and Patient.ID = PatientDoctor.PatientID";

                        $query_params = array(
                            ':id' => $doctorId
                        );

                        try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                        } catch (PDOException $ex) {
                            die("Failed to run query: " . $ex->getMessage());
                        }

                        $login_ok = false;

                        // validate user and password
                        $num = $stmt->fetchAll();
                        $num = $num[0]['COUNT(*)'];
                        $num = (int)$num;
                        echo $num;

                        ?>],




                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        //pie
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: ["Male", "Female"],
                datasets: [
                    {
                        data: [<?php
                            // get age
                            $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                      WHERE PatientDoctor.DoctorId = :id
                                      and Patient.ID = PatientDoctor.PatientID
                                      and Patient.gender= :gender";

                            $gender = 'Male';
                            $query_params = array(
                                ':id' => $doctorId,
                                ':gender' => $gender
                            );

                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute($query_params);
                            } catch (PDOException $ex) {
                                die("Failed to run query: " . $ex->getMessage());
                            }

                            $login_ok = false;

                            // validate user and password
                            $num = $stmt->fetchAll();
                            $num = $num[0]['COUNT(*)'];
                            $num = (int)$num;
                            echo $num;

                            ?>, <?php
                            // get age
                            $query = "SELECT COUNT(*) FROM PatientDoctor, Patient
                                      WHERE PatientDoctor.DoctorId = :id
                                      and Patient.ID = PatientDoctor.PatientID
                                      and Patient.gender= :gender";

                            $gender = 'Female';
                            $query_params = array(
                                ':id' => $doctorId,
                                ':gender' => $gender
                            );

                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute($query_params);
                            } catch (PDOException $ex) {
                                die("Failed to run query: " . $ex->getMessage());
                            }

                            $login_ok = false;

                            // validate user and password
                            $num = $stmt->fetchAll();
                            $num = $num[0]['COUNT(*)'];
                            $num = (int)$num;
                            echo $num;

                            ?>],
                        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });


        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });


        //radar
        var ctxR = document.getElementById("radarChart").getContext('2d');
        var myRadarChart = new Chart(ctxR, {
            type: 'radar',
            data: {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });

        //doughnut
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'doughnut',
            data: {
                labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                datasets: [
                    {
                        data: [300, 50, 100, 40, 120],
                        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });

    </script>

</body>

</html>