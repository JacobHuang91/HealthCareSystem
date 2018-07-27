<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 6/22/18
 * Time: 10:38 AM
 */
require ("../common.php");

$email = $_SESSION['email'];
$name = $_POST['name'];
$password = $_SESSION['password'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$Diagnoses = "";




$query = "INSERT INTO Patient (id, 
                                email, 
                                name,
                                password, 
                                gender,
                                age,
                                Diagnoses)
        VALUES (NULL, 
                :email, 
                :name, 
                :password, 
                :gender, 
                :age, 
                :Diagnoses)";


$query_params = array(
    ':email' => $email,
    ':name' => $name,
    ':password' => $password,
    ':gender' => $gender,
    ':age' => $age,
    ':Diagnoses' => $Diagnoses
);

$stmt = $db->prepare($query);
$stmt->execute($query_params);

// get the user and save into session
$query = "SELECT * FROM Patient WHERE email = :email";

$query_params = array(
    ':email' => $email
);

$stmt = $db->prepare($query);
$result = $stmt->execute($query_params);
$row = $stmt->fetch();
unset($_SESSION['password']);
unset($_SESSION['username']);
$_SESSION['user'] = $row;

header("Location: ../HomePagePatient/HomePatient.php");