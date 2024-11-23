<?php
include "../../../../Backend/Connection/connection.php";
session_start();

if (empty($_SESSION['Username']) || empty($_SESSION['IDD'])) {
    header("Location:../../../LogIn/LogIn.php");
    exit();
}

$IDS = $_GET['IDS'];
$FilteredCCode = $_GET['CourseCode'];
$IDD = $_SESSION['IDD'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ECode = $_POST['ECode'];
    $Grade = $_POST['Grade'];
    $qu = "select ECode from exam where CourseCode = '$FilteredCCode'";
    $satmt = $PDO->prepare($qu);
    $satmt->execute();

    $res = $satmt->fetch();
    $ECode = $res[0];
    $query = "update grades set Grade ='$Grade'
    where IDD='$IDD' and IDS='$IDS' and ECode ='$ECode' ";
    $stmt = $PDO->prepare($query);
    $stmt->execute();

    header("Location: Notes.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Edit Notes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-ico" href="../../../../assets/LogoFolder/ESUICO.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../../../css/animate.css">

    <link rel="stylesheet" href="../../../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../../css/magnific-popup.css">

    <link rel="stylesheet" href="../../../../css/style.css">
    <link rel="stylesheet" href="Notes.css">
    <script src="../../../../Backend/Validation/InspectDeny.js"></script>

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
                            echo "<li><a class='dropdown-item' href='../doctorSpace.php'>My page</a></li>";
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="hero-wrap js-fullheight" style="background-image: url('../../../../assets/LogoFolder/ESU.jpeg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-middle" style="margin-left: 397px;">
                <div class="col-md-6 mt-5">
                    <form action="EditNote.php?IDS=<?php echo $IDS; ?>&CourseCode=<?php echo $FilteredCCode; ?>" method="POST" class="appointment-form" style="margin-top: -568px;">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" name="Grade" id="Grade" class="form-control" placeholder="Grade" step="0.25" min="0" max="20">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
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