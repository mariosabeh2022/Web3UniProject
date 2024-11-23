<?php include "../../Backend/Connection/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>About</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-ico" href="../../assets/LogoFolder/ESUICO.ico">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../../css/animate.css">

  <link rel="stylesheet" href="../../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../css/magnific-popup.css">

  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../Backend/Validation/InspectDeny.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../HomePage/HomePage.php"><img src="../../assets/LogoFolder/ESUWD.png" alt="Logo" width="70px" height="50px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="../HomePage/HomePage.php" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">
            <?php
            session_start();
            if (empty($_SESSION['Username']) && empty($_SESSION['Page'])) {
              echo "<a class='nav-link' href='../Login/login.php'>Login</a>";
            } else {
              echo "<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'>" . $_SESSION['Username'] . "</a>";
              echo "<ul class='dropdown-menu'>";
              echo "<li><a class='dropdown-item' href=" . $_SESSION['Page'] . ">My page</a></li>";
              echo "<li><a class='dropdown-item' href='../Logout/Logout.php'>Logout</a></li>";
              echo "</ul>";
            }
            ?>
          <li class="nav-item active"><a href="about.php" class="nav-link">About</a></li>

          </li>
          <li class="nav-item"><a href="../Contact/contact.php" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="../About/About.php" class="nav-link">Back</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <img style=" width:100%;
    height:500px; padding:20px;" src="../../assets/LogoFolder/uni3pic.jpg">
  <div style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -40%);
    text-align: center;
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
    font-size: 20px;
    font-family:Times New Roman, sans-serif;
   
    padding: 20px;">University missions and goals serve as guiding principles that shape the institution's direction,
    purpose, and values. These statements encapsulate the aspirations and commitments of universities towards academic excellence,
    research advancement, and societal impact.
    The mission outlines the fundamental purpose of the institution,
    often emphasizing principles such as fostering critical thinking,
    advancing knowledge, and promoting diversity and inclusion. Concurrently,
    goals delineate specific objectives and milestones towards realizing this mission,
    whether through expanding research initiatives, enhancing educational programs,
    or strengthening community engagement. Together,
    they provide a roadmap for universities to navigate the complexities of higher education,
    driving innovation, progress, and positive change in the world.</div>
</body>
<?php include "../Footer/footer.php"; ?>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery-migrate-3.0.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.easing.1.3.js"></script>
<script src="../../js/jquery.waypoints.min.js"></script>
<script src="../../js/jquery.stellar.min.js"></script>
<script src="../../js/jquery.animateNumber.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="../../js/google-map.js"></script>
<script src="../../js/main.js"></script>

</body>

</html>