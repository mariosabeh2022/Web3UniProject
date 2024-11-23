<?php 
include "../../../../Backend/Validation/Encryption.php";
include "../../../../Backend/Validation/Sanitizing.php";
include "../../../../Backend/Connection/connection.php";
session_start();
if(!isset($_SESSION['IDA'])||
   !isset($_SESSION['Username']))
header("location:../../../LogIn/LogIn.html");
else{
$IDA=$_SESSION['IDA'];
$Username=$_SESSION['Username'];
}
if(!empty($_POST['FirstName'])&&
   !empty($_POST['MiddleName'])&&
   !empty($_POST['LastName'])&&
   !empty($_POST['Username'])&&
   !empty($_POST['Email'])&&
   !empty($_POST['Password'])){

    $FN=$_POST['FirstName'];
    $MN=$_POST['MiddleName'];
    $LN=$_POST['LastName'];
        
    $CheckFirst="SELECT * FROM users WHERE FirstName='$FN' 
                  AND MiddleName='$MN' AND LastName ='$LN'";
    $statement=$PDO->prepare($CheckFirst);
    $statement->execute();
    if($row=$statement->fetch(PDO::FETCH_ASSOC)){
        echo "<script>alert('You have entered an existing student');</script>";
        header("refresh:1, url=AddDiploma.php");
    }
    else{
    $User=$_POST['Username'];
    $Email=sanitizeString($_POST['Email']);
    $Password=encrypt($_POST['Password']);

    $query_user="INSERT INTO users (FirstName,MiddleName,LastName,Username,Email,Password,Role) VALUES
                ('$FN','$MN','$LN','$User','$Email','$Password','Student')";
    $ex = $PDO->prepare($query_user);
    $ex->execute();

    $fetching_ID="select ID from users where Email='$Email'";
    $result= $PDO->prepare($fetching_ID);
    $result->execute();
    $row=$result->fetch(PDO::FETCH_ASSOC);
    $ID=$row['ID'];

    $query="INSERT INTO student (IDS,FirstName,MiddleName,LastName,Username,Email,Password,IDA)
            VALUES ('$ID','$FN','$MN','$LN','$User','$Email','$Password',$IDA);";
    $ex = $PDO->prepare($query);
    $ex->execute();
    header("location: ../../AdminSpace/adminSpace.php");
   }
}
else echo "<script>alert('You must fill all the fields');</script>";
header("refresh:3, url=StudentSignUp.php");
?>