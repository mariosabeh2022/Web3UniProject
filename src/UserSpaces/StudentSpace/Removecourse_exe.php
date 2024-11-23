<?php
include "../../../Backend/Connection/connection.php";
session_start();
if(empty($_SESSION['Username'])||empty($_SESSION['IDS'])){
header("Location:../../LogIn/LogIn.php");
}
else{
  $ID=$_SESSION['IDS'];
  $Username = $_SESSION['Username'];
}

$CourseCode=$_GET['CourseCode'];
$q="DELETE FROM enroll where IDS='$ID' AND CourseCode='$CourseCode'";
$res = $PDO->prepare($q);
          $res->execute();
          if ($result=$res->fetch() )header("location:Removecourse.php");
else header("location:Removecourse.php");
?>