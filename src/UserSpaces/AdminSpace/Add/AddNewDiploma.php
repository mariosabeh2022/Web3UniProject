<?php 
include "../../../../Backend/Validation/Encryption.php";
include "../../../../Backend/Connection/connection.php";
session_start();
if(!isset($_SESSION['IDA'])||
   !isset($_SESSION['Username']))
header("location:../../../LogIn/LogIn.html");
else{
    $IDA=$_SESSION['IDA'];
}
if(!empty($_POST['DiplomaCode'])&&
   !empty($_POST['Name'])){

    $DC=$_POST['DiplomaCode'];
    $DN=$_POST['Name'];

    $CheckFirst="SELECT * FROM diploma WHERE CodeD='$DC'";
    $statement=$PDO->prepare($CheckFirst);
    $statement->execute();
    if($row=$statement->fetch(PDO::FETCH_ASSOC)){
        echo "<script>alert('You have entered an existing diploma');</script>";
        header("refresh:1, url=AddDiploma.php");
    }
    else{
    $query="INSERT INTO diploma (CodeD,Name,IDA)
            VALUES ('$DC','$DN','$IDA');";
    $ex = $PDO->prepare($query);
    $ex->execute();

    header("location: ../../AdminSpace/adminSpace.php");
    }
}
else echo "<script>alert('You must fill all the fields');</script>";
header("refresh:2, url=AddDiploma.php");
?>