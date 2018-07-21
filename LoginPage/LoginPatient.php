<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 2018/2/9
 * Time: 上午10:05
 */

require ("../common.php");

if (!empty($_SESSION)) {
    session_unset();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TeleHealth Login</title>
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
                <h3 class="display-5">Health Care System - Patient</h3>
                <p>By</p>
                <p>School of Computing and Information</p>
                <p>University of Pittsburgh</p>
            </div>
            <div class="col-sm-3 offset-sm-2 flex-last">
                <img class="d-flex img-thumbnail align-self-center" src="../src/img/Patient.png" alt="logo">
            </div>
        </div>
    </div>
</div>
<!--  login  -->
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <form action="ProcessPatient.php" method="post">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" name="email" value="patient@gmail.com" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" value="123">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
                <span> Or </span>
                <a href= "../RegisterPage/RegisterStep1.php" role="button"> Register</a>
            </form>
        </div>
    </div>
</div>
<br>
<br>
<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/js/mdb.min.js"></script>
</body>
</html>
