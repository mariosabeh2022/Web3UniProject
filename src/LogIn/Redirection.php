<?php

include '../../Backend/Connection/connection.php';
include '../../Backend/Validation/Sanitizing.php';
include '../../Backend/Validation/Encryption.php';
session_start();

if (isset($_POST['Login'])) {
    if (!empty($_POST['Email']) && !empty($_POST['Password'])) {
        $email = sanitizeString($_POST['Email']);
        $password = encrypt($_POST['Password']);

        $query = "SELECT * FROM history WHERE Email = '$email' AND Password = '$password'";
        $statement = $PDO->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $ID = $row['ID'];
        echo $ID;
        if ($ID!="")
           header("Location: LogIn.php?account_does_not_exist");
        else{
        $query = "SELECT * FROM users WHERE Email = :email AND Password = :password";
        $statement = $PDO->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $Role = $row['Role'];
            $redirect_url = '';
            $session_id = $row['ID'];
            $Username = $row['Username'];

            switch ($Role) {
                case 'Student':
                    $redirect_url = '../UserSpaces/StudentSpace/studentSpace.php';
                    $_SESSION['IDS'] = $session_id;
                    break;
                case 'Doctor':
                    $redirect_url = '../UserSpaces/DoctorSpace/doctorSpace.php';
                    $_SESSION['IDD'] = $session_id;
                    break;
                case 'Admin':
                    $redirect_url = '../UserSpaces/AdminSpace/adminSpace.php';
                    $_SESSION['IDA'] = $session_id;
                    break;
                default:
                    header("Location: LogIn.php?error=invalid_email_domain");
                    exit();
            }

            $_SESSION['Username'] = $Username;
            $_SESSION['Page'] = $redirect_url;
            header("Location: $redirect_url");
            exit();
        } else {
            header("Location: LogIn.php?invalid_credentials");
            exit();
        }
    }
    } else {
        header("Location: LogIn.php?invalid_input");
        exit();
    }
} else {
    header("Location: LogIn.php");
    exit();
}

?>