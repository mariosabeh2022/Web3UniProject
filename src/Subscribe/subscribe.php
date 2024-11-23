<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../../Backend/Connection/connection.php";

if (isset($_POST['SendMSGbtn'])) {
    if (!empty($_POST['Email'])) {
        $Email = $_POST['Email'];

        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format.'); history.back();</script>";
            exit();
        }

        $qu = "select count(*) as count from subscribe where Email = '$Email'";
        $stmt = $PDO->prepare($qu);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res && $res['count'] == 1) {
            echo "<script>alert('You are already subscribed. Redirecting to homepage.');</script>";
            header("Refresh:1; url=../HomePage/HomePage.php");
            exit();
        } else {
            $query = "insert into subscribe (Email) values ('$Email')";
            $stmt = $PDO->prepare($query);
            $stmt->execute();
            require '../../PHPMailer/src/Exception.php';
            require '../../PHPMailer/src/PHPMailer.php';
            require '../../PHPMailer/src/SMTP.php';

            $subject = "Subscription Confirmation";
            $message = "Thank you for subscribing to our service! We will keep you updated with the latest news and information.";

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'esu.university.lb@gmail.com';
                $mail->Password = 'cfzn tngp rqhs uwdc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('esu.university.lb@gmail.com', 'ESU Contact Form');
                $mail->addAddress($Email);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = "<p>$message</p>";

                $mail->send();
                echo "<script>alert('Subscription successful! Confirmation email sent.');</script>";
                header("Refresh:1; url=../HomePage/HomePage.php");
                exit();
            } catch (Exception $e) {
                echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); history.back();</script>";
            }
        }
    } else {
        echo "<script>alert('Email is required.'); history.back();</script>";
    }
}
