<?php include "../../Backend/Connection/connection.php";
$CodeD=$_GET['CodeD'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ESU</title>
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
      <a class="navbar-brand" href="../HomePage/HomePage.php"><img src="../../assets/LogoFolder/ESUWD.png" alt="Logo" width="70px" height="50px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="../HomePage/HomePage.php" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">

          <li class="nav-item"><a href="../About/about.php" class="nav-link">About</a></li>

          <li class="nav-item"><a href="../Contact/contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="table-responsive">

    <table class="table table-striped table-bordered table-hover" style="border: 2px solid black">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Course Code</th>
          <th scope="col">Name</th>
          <th scope="col">Credits</th>
          <th scope="col">Code Semester</th>
          <th scope="col">Year</th>

        </tr>
      </thead>
      <tbody>
        <?php 
        $q = "select CourseCode,Name,Credits,CodeSemester,Year
              from course
              where CodeD='$CodeD'";

        $res = $PDO->prepare($q);
        $res->execute();
        while ($row = $res->fetch()) {
          echo "<tr class='coloredRow'>";
          echo "<td>" . $row[0] . "</td>";
          echo "<td>" . $row[1] . "</td>";
          echo "<td>" . $row[2] . "</td>";
          echo "<td>" . $row[3] . "</td>";
          echo "<td>" . $row[4] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>


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