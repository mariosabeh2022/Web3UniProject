<?php
include "../../../Backend/Connection/connection.php";
session_start();
if (empty($_SESSION['Username']) || empty($_SESSION['IDD'])) {
    header("Location:../../LogIn/LogIn.php");
} else {
    $ID = $_SESSION['IDD'];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Space</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-ico" href="../../../assets/LogoFolder/ESUICO.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../../css/animate.css">

    <link rel="stylesheet" href="../../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../css/magnific-popup.css">

    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="doctorSpace.css">
    <script src="../../../Backend/Validation/InspectDeny.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="../../HomePage/HomePage.php"><img src="../../../assets/LogoFolder/ESUWD.png" alt="Logo" width="70px" height="50px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="../../HomePage/HomePage.php" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown active">
                        <?php
                        if (empty($_SESSION['Username']) && empty($_SESSION['Page'])) {
                            echo "<a class='nav-link' href='../../Login/login.php'>Login</a>";
                        } else {
                            echo "<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'>" . $_SESSION['Username'] . "</a>";
                            echo "<ul class='dropdown-menu'>";
                            echo "<li><a class='dropdown-item'>My page</a></li>";
                            echo "<li><a class='dropdown-item' href='../../Logout/Logout.php'>Logout</a></li>";
                            echo "</ul>";
                        }
                        ?>
                    <li class="nav-item"><a href="../../About/about.php" class="nav-link">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Diploma</a>
                        <ul class="dropdown-menu">
                            <?php
                            $q = "select CodeD,Name from diploma";
                            $statement = $PDO->prepare($q);
                            $statement->execute();
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                $Name = $row['Name'];
                                $CodeD = $row['CodeD'];
                                echo "<li><a class='dropdown-item' href='../../HomePage/DisplayDiplomaCourses.php?CodeD=$CodeD'>$Name</a></li>";
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="../../Contact/contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="ftco-section ftco-services">
        <div class="container1">
            <div class="row">
                <div class="col-md-4 d-flex services align-self-stretch px-4">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url(../../../assets/LogoFolder/Students.jpg);"></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading">Students Enrolled</h3>
                            <p><a href="StudentsEnrolled/StudentsEnrolled.php" class="btn btn-primary">View</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex services align-self-stretch px-4">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url(../../../assets/LogoFolder/Exam.jpg);"></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading">Create Exam</h3>
                            <p><a href="Exam/Exam.php" class="btn btn-primary">Create</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex services align-self-stretch px-4">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url(../../../assets/LogoFolder//Grades.jpg);"></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading">Notes</h3>
                            <p><a href="Notes/Notes.php" class="btn btn-primary">View</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading"><a href="#" class="logo">ESU</a></h2>
                    <p>Our university is nestled amidst the vibrant community of scholars, where knowledge flows like a river, enriching minds with the necessary tools for academic excellence.</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="../../Contact/contact.php" class="py-1 d-block">Location</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Subscribe to our latest updates</h2>
                    <form action="../../Subscribe/subscribe.php" class="subscribe-form" method="POST">
                        <div class="form-group d-flex">
                            <input type="email" name="Email" class="form-control rounded-left" placeholder="Enter email address">
                            <button type="submit" name="SendMSGbtn" class="form-control submit rounded-right"><span class="sr-only">Submit</span><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading mt-5">Connect with Us</h2>
                    <ul class="ftco-footer-social p-0">
                        <li><a href="https://www.linkedin.com/" data-toggle="tooltip" data-placement="top" title="linkedin"><span class="fa fa-linkedin"></span></a></li>
                        <li><a href="https://www.facebook.com/" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="https://www.instagram.com/" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-100 mt-5 border-top py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <p class="copyright mb-0">
                            All rights reserved to <a href="../../DevelopersInfo/DevelopersInfo.php" target="_blank">Developers info</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/jquery.easing.1.3.js"></script>
    <script src="../../../js/jquery.waypoints.min.js"></script>
    <script src="../../../js/jquery.stellar.min.js"></script>
    <script src="../../../js/jquery.animateNumber.min.js"></script>
    <script src="../../../js/owl.carousel.min.js"></script>
    <script src="../../../js/jquery.magnific-popup.min.js"></script>
    <script src="../../../js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="../../../js/google-map.js"></script>
    <script src="../../../js/main.js"></script>
</body>

</html>