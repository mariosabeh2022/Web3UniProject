<?php
include "../../../../Backend/Connection/connection.php";
session_start();
if (empty($_SESSION['Username']) || empty($_SESSION['IDD'])) {
    header("Location:../../../LogIn/LogIn.php");
} else {
    $ID = $_SESSION['IDD'];
}
$q = "select student.IDS,student.FirstName,student.MiddleName,student.LastName,student.Username,student.Email,grades.Grade
from student, course, enroll , grades
where student.IDS = enroll.IDS 
and course.CourseCode = enroll.CourseCode 
and student.IDS = grades.IDS
and course.IDD = $ID
order by student.IDS";
$PDOstatement = $PDO->prepare($q);
$PDOstatement->execute();
$print = "<table border=1>";
$print .= "<tr>";
$print .= "<th>IDS</th>";
$print .= "<th>Firstname</th>";
$print .= "<th>Middlename</th>";
$print .= "<th>Lastname</th>";
$print .= "<th>Username</th>";
$print .= "<th>Email</th>";
$print .= "<th>Note</th>";
$print .= "</tr>";
while ($result = $PDOstatement->fetch(PDO::FETCH_ASSOC)) {
    $print .= "<tr>";
    $print .= "<th>" . $result['IDS'] . "</th>";
    $print .= "<th>" . $result['FirstName'] . "</th>";
    $print .= "<th>" . $result['MiddleName'] . "</th>";
    $print .= "<th>" . $result['LastName'] . "</th>";
    $print .= "<th>" . $result['Username'] . "</th>";
    $print .= "<th>" . $result['Email'] . "</th>";
    $print .= "<th>" . $result['Grade'] . "</th>";

    $print .= "</tr>";
}
$print .= "</table>";
header('content-type:application/xls');
header('content-Disposition:attachment;filename=StudentGrades.xls');
echo $print;
