<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../../Backend/Connection/connection.php";
session_start();
if (empty($_SESSION['Username']) || empty($_SESSION['IDS'])) {
    header("Location:../../LogIn/LogIn.php");
} else {
    $ID = $_SESSION['IDS'];
}
if (isset($_POST['SendMSGbtn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<script>alert('All fields are required.'); history.back();</script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); history.back();</script>";
        exit();
    }


    $query = "select Email from student where IDS= :ID";
    $stmt = $PDO->prepare($query);
    $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $fromEmail = $result['Email'];
    } else {
        echo "<script>alert('No email found for the student.'); history.back();</script>";
        exit();
    }

    $toEmail = $email;

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'esu.university.lb@gmail.com';
        $mail->Password = 'cfzn tngp rqhs uwdc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom($fromEmail, 'ESU Contact Form');
        $mail->addAddress($toEmail);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<p>Name: $name</p><p>Message: $message</p>";
        $mail->send();
        echo "<script>alert('Email Sent');</script>";
        header("Refresh:0; url=../UserSpaces/StudentSpace/studentSpace.php");
        exit();
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid form submission.'); history.back();</script>";
}
