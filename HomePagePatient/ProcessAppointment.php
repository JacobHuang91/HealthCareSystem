<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 6/21/18
 * Time: 9:03 PM
 */

require("../common.php");

var_dump($_POST);

var_dump($_SESSION);

$patientId = $_POST['patientId'];
$doctorId = $_POST['doctorId'];
$date = $_POST['date'];
$time = $_POST['time'];
$event = $_POST['event'];

// check patient doctor
$query = "select DoctorID from PatientDoctor WHERE PatientID=:id";

$query_params = array(
    ':id' => $patientId
);

try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    die("Failed to run query: " . $ex->getMessage());
}

// validate user and password
$rows = $stmt->fetchAll();
var_dump($rows);

$pair = false;

foreach ( $rows as $item) {
    if ($item['DoctorID'] === $doctorId) {
        $pair = true;
        break;
    }
}

if (!$pair){
//     insert into the patient doctor table
    $query = "INSERT INTO PatientDoctor (ID,
                                PatientID,
                                DoctorID)
        VALUES (NULL,
                :patient,
                :doctor)";


$query_params = array(
    ':patient' => $patientId,
    ':doctor' => $doctorId
);

$stmt = $db->prepare($query);
$stmt->execute($query_params);

}


// get datetime
$datetime = $date.' '.$time.':00';



// insert into doctor calendar
$query = "INSERT INTO DoctorCalendar (ID,
                                DoctorID,
                                PatientID,
                                Event,
                                Date,
                                Completed)
        VALUES (NULL,
                :doctor,
                :patient,
                :events,
                :datetime ,
                DEFAULT )";


$query_params = array(
    ':doctor' => $doctorId,
    ':patient' => $patientId,
    ':events' => $event,
    'datetime' => $datetime
);

$stmt = $db->prepare($query);
$stmt->execute($query_params);

