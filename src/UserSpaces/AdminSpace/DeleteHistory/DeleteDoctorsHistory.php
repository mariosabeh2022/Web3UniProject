<?php 
include "../../../../Backend/Connection/connection.php";
session_start();
if(empty($_SESSION['Username'])||empty($_SESSION['IDA'])){
    header("Location:../../../LogIn/LogIn.php");
    }
$q="delete from history";
$statement=$PDO->prepare($q);
$statement->execute();
header("location:../Display/DisplayDoctors.php");
?>