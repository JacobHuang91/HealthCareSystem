<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 7/4/18
 * Time: 2:10 PM
 */

require ("../common.php");

$notRegister = "";
if (!empty($_SESSION['notRegister'])){
    $notRegister = $_SESSION['notRegister'];
}

?>
<!DOCTYPE html><html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Reset Password</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/css/mdb.min.css" />
    <style>
        .jumbotron {
            border: none !important;
            box-shadow: none !important;
        }
    </style>

</head>
<body class="grey lighten-3">

<div class="jumbotron jumbotron-fluid grey lighten-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 offset-sm-2 flex-first">
                <h3 class="display-5">Health Care System</h3>
                <p>By</p>
                <p>School of Computing and Information</p>
                <p>University of Pittsburgh</p>
            </div>
            <div class="col-sm-3 offset-sm-2 flex-last">
                <img class="d-flex img-thumbnail align-self-center" style="height: 10em; width: 20em;" src="./src/img/logo.png" alt="logo">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center  grey lighten-3">
                <div class="card-block">
                    <h4 class="card-title"><strong><?php echo $notRegister?></strong> is not a valid user account.</h4>
                    <a href="../RegisterPage/RegisterStep1.php" class="btn btn-primary">Register Now!</a>
                    <a href="../index.php" class="btn btn-primary">Change another account to login!</a>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
