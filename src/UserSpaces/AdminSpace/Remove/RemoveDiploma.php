<?php
include "../../../../Backend/Connection/connection.php";
session_start();
if(empty($_SESSION['Username'])||empty($_SESSION['IDA'])){
    header("Location:../../../LogIn/LogIn.php");
    }
    else{
      $ID=$_SESSION['IDA'];
    }

    $CodeD=$_GET['CodeD'];
    if(empty($CodeD))header("location:../Display/DisplayDiplomas.php");
    else{
    $q="select * from diploma where CodeD ='$CodeD'";
    $statement=$PDO->prepare($q);
    $statement->execute();
    $row=$statement->fetch(PDO::FETCH_ASSOC);
    $DC=$row['CodeD'];
    $N=$row['Name'];
    $insertIntoHistory="insert into diplomahistory values ('$DC','$N')";
    $statement1=$PDO->prepare($insertIntoHistory);
    $statement1->execute();
    $q="delete from diploma where CodeD='$CodeD'";
    $statement=$PDO->prepare($q);
    $statement->execute();
    echo $q;
    header("location:../Display/DisplayDiplomas.php");   
}
header("location:../Display/DisplayDiplomas.php");
?>