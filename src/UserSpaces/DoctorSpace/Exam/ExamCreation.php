<?php
include "../../../../Backend/Connection/connection.php";
session_start();
if (empty($_SESSION['Username']) || empty($_SESSION['IDD'])) {
    header("Location:../../../LogIn/LogIn.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddExam'])) {
    $IDD = $_SESSION['IDD'];
    $ECode = $_POST['ECode'];
    $EName = $_POST['EName'];
    $CourseCode = $_POST['Course'];

    if (!empty($ECode) && !empty($EName) && !empty($CourseCode)) {
        $query = "insert into exam (ECode, EName, CourseCode, IDD) values ('$ECode', '$EName', '$CourseCode', '$IDD')";
        $stmt = $PDO->prepare($query);
        if ($stmt->execute()) {
            header("location:../DoctorSpace.php");
        } else {
            echo "Error adding exam.";
        }
    } else {
        echo "All fields are required!";
    }
}
