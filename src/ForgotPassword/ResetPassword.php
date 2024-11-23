<?php
include "../../Backend/Connection/connection.php";
include '../../Backend/Validation/Encryption.php';
if( empty($_POST['Email'])||
    empty($_POST['Password1'])||
    empty($_POST['Password2'])){
    header("location:ForgotPassword.php");
}
else {
    $email=$_POST['Email'];
    $password=encrypt($_POST['Password1']);
    $query="update users set Password='$password' where Email='$email'";
    $statement=$PDO->prepare($query);
    $statement->execute();
    if($row=$statement->fetch(PDO::FETCH_ASSOC)){
        echo "<script>alert('Your password have been updated')</script>";
        $query="select Role from users where Password='$password' where Email='$email'";
        $statement=$PDO->prepare($query);
        $statement->execute();
        $row=$statement->fetch(PDO::FETCH_ASSOC);
        $role=$row['Role'];
        if ($role) {
            $Role = $role['Role'];

            switch ($Role) {
                case 'Student':
                    $query="update student set Password='$password' where Email='$email'";
                    $statement=$PDO->prepare($query);
                    $statement->execute();
                    header("location:../LogIn/LogIn.php");
                    break;
                case 'Doctor':
                    $query="update doctor set Password='$password' where Email='$email'";
                    $statement=$PDO->prepare($query);
                    $statement->execute();
                    header("location:../LogIn/LogIn.php");
                    break;
                case 'Admin':
                    $query="update admin set Password='$password' where Email='$email'";
                    $statement=$PDO->prepare($query);
                    $statement->execute();
                    header("location:../LogIn/LogIn.php");
                    break;
            }

    }else echo "Account does not exist";
}else header("location:../LogIn/LogIn.php");
}
?>
