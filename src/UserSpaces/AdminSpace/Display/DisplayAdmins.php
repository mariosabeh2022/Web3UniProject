<?php
include "../../../../Backend/Connection/connection.php";
session_start();
if (empty($_SESSION['Username']) || empty($_SESSION['IDA'])) {
  header("Location:../../../LogIn/LogIn.php");
} else {
  $ID = $_SESSION['IDA'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admins</title>
  <link rel="icon" type="image/x-ico" href="../../../../assets/LogoFolder/ESUICO.ico">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../../../../css/animate.css">

  <link rel="stylesheet" href="../../../../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../../../../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../../../css/magnific-popup.css">

  <link rel="stylesheet" href="../../../../css/style.css">
  <script src="../../../../Backend/Validation/InspectDeny.js"></script>
  <style>
    .table-bordered tbody tr:hover {
      background-color: #06BBCC;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../../../HomePage/HomePage.php"><img src="../../../../assets/LogoFolder/ESUWD.png" alt="Logo" width="70px" height="50px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="../../../HomePage/HomePage.php" class="nav-link">Home</a></li>
          <li class="nav-item dropdown active">
            <?php
            if (empty($_SESSION['Username']) && empty($_SESSION['Page'])) {
              echo "<a class='nav-link' href='../../../Login/login.php'>Login</a>";
            } else {
              echo "<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'>" . $_SESSION['Username'] . "</a>";
              echo "<ul class='dropdown-menu'>";
              echo "<li><a class='dropdown-item' href='../adminSpace.php'>My page</a></li>";
              echo "<li><a class='dropdown-item' href='../../../Logout/Logout.php'>Logout</a></li>";
              echo "</ul>";
            }
            ?>
          <li class="nav-item"><a href="../../../About/about.php" class="nav-link">About</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Diploma</a>
            <ul class="dropdown-menu">
            <?php
						$q="select CodeD,Name from diploma";
						$statement=$PDO->prepare($q);
						$statement->execute();
						while($row=$statement->fetch(PDO::FETCH_ASSOC)){
							$Name=$row['Name'];
							$CodeD=$row['CodeD'];
							echo "<li><a class='dropdown-item' href='../../../HomePage/DisplayDiplomaCourses.php?CodeD=$CodeD'>$Name</a></li>";
						}
						?>
            </ul>
          </li>
          <li class="nav-item"><a href="../../../Contact/contact.php" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="../Export/AdminExportToExcel.php" class="nav-link">Export to excel sheet</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <form class="row g-3" action="DisplayAdmins.php" method="POST">
          <div class="col-12">
            <input type="submit" class="btn btn-primary" name="submit" value="Filter my admins">
            <a href="DisplayAdmins.php" class="btn btn-primary">Display all admins</a>
          </div>
        </form>
      </div>
      <a href="../../AdminSpace/AdminSignup/AdminSignUp.php"><button class="btn btn-primary">Add a new Admin</button></a>
      <a href="../DeleteHistory/DeleteAdminsHistory.php"><button class="btn btn-danger">Clear History</button></a>
    </div>
  </nav>
  <div class="container mt-3">
    <h2>Total of
      <?php
      if (isset($_POST['submit']))
        $q = "SELECT count(*) 
                  FROM admin 
                  WHERE IDA IN 
                    (SELECT IDA FROM creates WHERE CreatesIDA = '$ID');";
      else
        $q = "SELECT count(*)
                  FROM admin";
      $res = $PDO->prepare($q);
      $res->execute();
      $res = $res->fetch();
      $res = $res[0];
      if ($res <= 1) echo $res . " admin";
      else echo $res . " admins";
      ?>
    </h2>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" style="border: 2px solid black">
        <thead class="thead-dark">
          <tr>
            <th scope="col">FirstName</th>
            <th scope="col">MiddleName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_POST['submit']))
            $q = "SELECT * 
                  FROM admin 
                  WHERE IDA IN 
                    (SELECT IDA FROM creates WHERE CreatesIDA = '$ID');";
          else
            $q = "select * from admin";
          $res = $PDO->prepare($q);
          $res->execute();
          while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr class='coloredRow'>";

            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['MiddleName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            $E = $row['Email'];
            echo "<td>
            <form method='POST' action='../Remove/RemoveAdmin.php?Email=$E'>
            <input type='submit' value='Remove' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this admin?\");'>
            </form>
            </td>";

            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
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
                    <li><a href="../../../Contact/contact.php" class="py-1 d-block">Location</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                <h2 class="footer-heading">Subscribe to our latest updates</h2>
                <form action="../../../Subscribe/subscribe.php" class="subscribe-form" method="POST">
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
                        All rights reserved to <a href="../../../DevelopersInfo/DevelopersInfo.php" target="_blank">Developers info</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
  </footer>
  <script src="../../../../js/jquery.min.js"></script>
  <script src="../../../../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../../../js/popper.min.js"></script>
  <script src="../../../../js/bootstrap.min.js"></script>
  <script src="../../../../js/jquery.easing.1.3.js"></script>
  <script src="../../../../js/jquery.waypoints.min.js"></script>
  <script src="../../../../js/jquery.stellar.min.js"></script>
  <script src="../../../../js/jquery.animateNumber.min.js"></script>
  <script src="../../../../js/owl.carousel.min.js"></script>
  <script src="../../../../js/jquery.magnific-popup.min.js"></script>
  <script src="../../../../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../../../../js/google-map.js"></script>
  <script src="../../../../js/main.js"></script>
</body>

</html>