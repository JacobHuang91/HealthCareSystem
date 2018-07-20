<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 6/21/18
 * Time: 9:03 PM
 */

require("../common.php");

if (!empty($_POST)) {
    // This query retreives the user's information from the database using their username.
    $query = "SELECT * FROM Doctor WHERE email = :email";

    $query_params = array(
        ':email' => $_POST['email']
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
    if ($row) {
        $check_password = $_POST['password'];
        if ($check_password === $row['password']) {
            $login_ok = true;
        }
        // not register user
    } else{
        $_SESSION['notRegister'] = $_POST['email'];
        header("Location: NotRegister.php");
        exit();
    }

    if ($login_ok) {
        // if valid, head to questionnaire page
        unset($row['password']);
        $_SESSION['user'] = $row;
        $_SESSION['action'] = 'Login';
        header("Location: ../HomePage/DoctorDashboard.php");
        exit();
    } else {
        // if invalid, head to LoginPage page
        $_SESSION['invalidPassword'] = "Password is wrong";
        header("Location: ../index.php");
        exit();
    }
}