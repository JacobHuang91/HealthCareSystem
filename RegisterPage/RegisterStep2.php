<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 2018/2/10
 * Time: 下午2:14
 */

	require("../common.php");
?>


<!DOCTYPE html><html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/css/mdb.min.css" />


</head>

<body class="grey lighten-3">

<br>
<br>

<div class="container text-area">
    <div class="row">
        <div class="col-sm-12">
            <h2>Register - step 2</h2>
            <hr/>
        </div>
    </div>
</div>



<!-- basic info -->
<div class="container mb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="Process.php" method="post">
                <div class="form-group">
                    <label for="name">name:</label>
                    <input id="name" type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="male"> Male </option>
                        <option value="female"> Female </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="age">age:</label>
                    <input id="age" type="text" class="form-control" name="age" required>
                </div>

                <button type="submit" class="btn btn-primary">Register and Login</button>
            </form>

        </div>
    </div>
</div>
<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/js/mdb.min.js"></script>
</body>
</html>