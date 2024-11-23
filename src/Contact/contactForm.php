<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../../Backend/Connection/connection.php";

if (isset($_POST['SendMSGbtn'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (empty($name) || empty($subject) || empty($message)) {
        echo "<script>alert('All fields are required.'); history.back();</script>";
        exit();
    }
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'esu.university.lb@gmail.com';
        $mail->Password   = 'djmg vvkd xuqx jgoe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('esu.university.lb@gmail.com', 'ESU Help');
        $mail->addAddress('esu.university.lb@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<p>Name: $name</p><p>Message: $message</p>";
        $mail->send();
        echo "<script>alert('Email Sent');</script>";
        header("Refresh:0; url=../HomePage/HomePage.php");
        exit();
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid form submission.'); history.back();</script>";
}
