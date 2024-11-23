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
if(!empty($_POST['CourseCode'])&&
    !empty($_POST['Name'])&&
    !empty($_POST['Credits'])&&
    !empty($_POST['Diploma'])&&
    !empty ($_POST['Doctor'])&&
    !empty ($_POST['CodeSemester'])&&
    !empty ($_POST['Year'])){

    $CCode=$_POST['CourseCode'];
    $CCredits=$_POST['Credits'];
    $CheckFirst="SELECT * FROM course WHERE CourseCode='$CCode'";
    $statement=$PDO->prepare($CheckFirst);
    $statement->execute();
    if($row=$statement->fetch(PDO::FETCH_ASSOC)){
        echo "<script>alert('You have entered an existing course');</script>";
        header("refresh:1, url=AddCourse.php");
    }
    else if(is_integer($CCredits)){
        echo "<script>alert('You have entered an invalid credit type');</script>";
        header("refresh:1, url=AddCourse.php");
    }
    else{
    $CName=$_POST['Name'];
    $DFN=$_POST['Doctor'];
    $space1=strpos($DFN," ");
    $DocFirstName=substr($DFN,0,$space1);
    $space2=strpos(substr($DFN,$space1+1),' ');
    $DocMiddleName=substr($DFN,$space1+1,$space2);
    $MiddleToLast=substr(substr($DFN,$space1+1),strpos(substr($DFN,$space1),' '));
    $DocLastName=substr($MiddleToLast,strpos($MiddleToLast,' ')+1);
    $q="select IDD from doctor 
    where FirstName='$DocFirstName' and MiddleName='$DocMiddleName' and LastName='$DocLastName'";
    $statement=$PDO->prepare($q);
    $statement->execute();
    if($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $IDD=$row['IDD'];
    }
    else echo "An error occured in the query";
    
    $DName=$_POST['Diploma'];
    $q="select CodeD from diploma where Name='$DName'";
    $statement=$PDO->prepare($q);
    $statement->execute();
    if($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $CodeD=$row['CodeD'];
    }
    else echo "An error occured in the query";

    $CS=$_POST['CodeSemester'];
    $CY=$_POST['Year'];


    $query="INSERT INTO course VALUES
    ('$CCode','$CName','$CCredits',$IDA,'$IDD','$CodeD','$CS','$CY')";
    $ex = $PDO->prepare($query);
    $ex->execute();

    header("location: ../../AdminSpace/adminSpace.php");
   }
}
else echo "<script>alert('You must fill all the fields');</script>";
header("refresh:3, url=AddCourse.php");
?>