<?php
include "../../../../Backend/Connection/connection.php";
session_start();
if(empty($_SESSION['Username'])||empty($_SESSION['IDA'])){
    header("Location:../../../LogIn/LogIn.php");
    }
    else{
      $ID=$_SESSION['IDA'];
    }

    $CourseCode=$_GET['CourseCode'];
    if(empty($CourseCode))header("location:../Display/DisplayCourses.php");
    else{
    $q="select * from course where CourseCode ='$CourseCode'";
    $statement=$PDO->prepare($q);
    $statement->execute();
    $row=$statement->fetch(PDO::FETCH_ASSOC);
    $CC=$row['CourseCode'];
    $N=$row['Name'];
    $Credits=$row['Credits'];
    $insertIntoHistory="insert into coursehistory values ('$CC','$N','$Credits')";
    $statement1=$PDO->prepare($insertIntoHistory);
    $statement1->execute();
    $q="delete from course where CourseCode='$CourseCode'";
    $statement=$PDO->prepare($q);
    $statement->execute();
    echo $q;
    header("location:../Display/DisplayCourses.php");   
}
header("location:../Display/DisplayCourses.php");
?>