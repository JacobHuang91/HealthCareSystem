<?php

if (!empty($_SESSION)) {
    session_unset();
    session_destroy();
}

require ("../common.php");

if (isset($_POST['next'])){
    $pw1 = $_POST['pass1'];
    $pw2 = $_POST['pass2'];

    if ($pw2 != $pw1){
        $message = "two passwords are NOT same";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $email = $_POST['email'];
        // prevent duplicate user
        $query = "select * from Patient where email = :email";

        $query_params = array(
            ':email' => $email,
        );

        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);

        $result = $stmt->fetch();
        if($result != null){
            header("Location: HaveRegistered.php");
        } else {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['pass1'];

            // sign the RegisterPage action
            $_SESSION['action'] = 'RegisterPage';
            header("Location: RegisterStep2.php");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

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
            <h2>Register - step 1</h2>
            <hr/>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form method="post" action="RegisterStep1.php">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="username@gmail.com" required>
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="newPass">Password:</label>
                    <input id="password1" type="password" class="form-control" name="pass1" placeholder="Password" value="123" required onkeyup="pw()">
                </div>

                <div class="form-group">
                    <label for="newPass">Confirm Password:</label>
                    <input id="password2" type="password" class="form-control" name="pass2" placeholder="Confirm Password" value="123" required onkeyup="pw()">
                    <span id="diffPass"></span>
                </div>

                <a href="../index.php">
                    <button type="button" class="btn btn-outline-primary">Back</button>
                </a>
                <button id="submit" type="submit" class="btn btn-primary" name="next">Next</button>
            </form>
        </div>
    </div>
</div>

<script>
    function pw() {
        // prevent submit if two passwords are different
        var pw1 = document.getElementById("password1").value;
        var pw2 = document.getElementById("password2").value;

        if (pw1 === pw2){
            document.getElementById("diffPass").innerHTML = '';
            $('#submit').prop('disabled', false);

        } else {
            document.getElementById("diffPass").style.color = 'red';
            document.getElementById("diffPass").innerHTML = 'Two passwords are NOT matching';
            $('#submit').prop('disabled', true);
        }
    }
</script>
<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/js/mdb.min.js"></script>
</body>
</html>

