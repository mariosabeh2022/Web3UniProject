<?php
include "../../../../Backend/Connection/connection.php";
session_start();
if(empty($_SESSION['Username'])||empty($_SESSION['IDA'])){
    header("Location:../../../LogIn/LogIn.php");
    }
    else{
      $ID=$_SESSION['IDA'];
    }

    $Email=$_GET['Email'];
    if(empty($Email))header("location:../Display/DisplayStudents.php");
    else{
    $q="select * from users where Email ='$Email'";
    $statement=$PDO->prepare($q);
    $statement->execute();
    $row=$statement->fetch(PDO::FETCH_ASSOC);
    $ID=$row['ID'];
    $FN=$row['FirstName'];
    $MN=$row['MiddleName'];
    $LN=$row['LastName'];
    $Username=$row['Username'];
    $Email=$row['Email'];
    $Password=$row['Password'];
    $Role=$row['Role'];
    $insertIntoHistory="insert into history values ('$ID','$FN','$MN','$LN','$Username','$Email','$Password','$Role')";
    $statement1=$PDO->prepare($insertIntoHistory);
    $statement1->execute();
    $q="delete from student where Email='$Email'";
    $statement2=$PDO->prepare($q);
    $statement2->execute();
    header("location:../Display/DisplayStudents.php");   
}
header("location:../Display/DisplayStudents.php");
?>