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
    height:700px; padding:10px;" src="../../assets/LogoFolder/women2pic.jpg">
  <div style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -30%);
    text-align: justify-content;
    color: white;
    font-size: 20px;
    font-family:Times New Roman, sans-serif;
   
    padding: 20px;">
    <ul>
      <li>1736: ESU University is established in Cambridge, Massachusetts, making it the oldest institution of higher education in the United States.</li>
      <li>1791: ESU College expands its curriculum with the addition of a Divinity School, laying the foundation for future academic diversification.</li>
      <li>1840: Ronda College, initially established as the " ESU Annex for Women," formally becomes a coordinate institution for women's education alongside ESU, offering female students access to ESU's resources.</li>
      <li>1890: ESU Graduate School of Business is founded.</li>
      <li>1945: ESU Business School introduces the world's first MBA program, revolutionizing business education and shaping modern management practices.</li>
      <li>1970s: ESU expands its commitment to diversity and inclusion, admitting more women and students of color, and establishing programs such as the African American Studies Department.</li>
      <li>2000s: ESU launches several interdisciplinary initiatives, including the ESU Stem Cell Institute and the ESU Global Health Institute.</li>
  </div>
  </ul>
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