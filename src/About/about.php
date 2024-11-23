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
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('../../assets/Logofolder/grad.jpg');" data-stellar-background-ratio="0.5">
    <div style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #06BBCC;
    width:bold;
    font-size: 34px;
    font-family:Times New Roman, sans-serif;
   
    padding: 20px;"> Discover Your Path to Success: A Community of Scholars, Innovators, and Leaders,<br /> Where Every Opportunity Opens Doors to Infinite Possibilities.</div>
    <div class="container">

    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block services-wrap text-center">
            <div class="img" style="background-image: url('../../assets/LogoFolder/campusUni.jpg');"></div>
            <div class="media-body py-4 px-3">
              <h3 class="heading">Map Direction</h3>
              <p>Discover the Unseen: Unraveling the Charm of Every Corner in our University,Where Every Turn Tells a Story.</p>
              <p><a href="../../src/Contact/contact.php" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block services-wrap text-center">
            <div class="img" style="background-image: url('../../assets/Logofolder/goals.jpeg');"></div>
            <div class="media-body py-4 px-3">
              <h3 class="heading">Our Mission</h3>
              <p>To cultivate a dynamic learning environment that fosters critical thinking, creativity, and lifelong learning</p>
              <p><a href="../../src/About/mission.php" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block services-wrap text-center">
            <div class="img" style="background-image: url('../../assets/Logofolder/timeline.png') ; "></div>
            <div class="media-body py-4 px-3">
              <h3 class="heading">TimeLine</h3>
              <p>Charting the Journey: A Timeline Through Moments and Memories,Tracing Our Steps Through History.</p>
              <p><a href="../../src/About/timeline.php" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2> Students Feedbacks</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img" style="background-image: url(../../assets/LogoFolder/student1.jpg)">
                </div>
                <div class="text pl-4">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="fa fa-quote-left"></i>
                  </span>
                  <p>Business</p>
                  <p class="name">Mohamad Ali</p>
                  <span class="position">The faculty members are experienced professionals who bring
                    real-world insights into the classroom,
                    enriching our learning experience,and provide us with numerous
                    resources and support.</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img" style="background-image: url(../../assets/LogoFolder/student3.jpg)">
                </div>
                <div class="text pl-4">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="fa fa-quote-left"></i>
                  </span>
                  <p>Informatique</p>
                  <p class="name">Loren Hanna</p>
                  <span class="position"> My university has provided me with a solid foundation
                    in informatics and equipped me with the skills
                    and knowledge necessary to succeed in this rapidly evolving field.</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img" style="background-image: url(../../assets/LogoFolder/student5.jpg)">
                </div>
                <div class="text pl-4">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="fa fa-quote-left"></i>
                  </span>
                  <p>Civil Engineering</p>
                  <p class="name">Wang Li</p>
                  <span class="position">The curriculum encompasses a wide range of subjects,
                    from structural engineering to transportation systems,
                    allowing me to develop a well-rounded understanding of the field. </span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img" style="background-image: url(../../assets/LogoFolder/student4.jpg)">
                </div>
                <div class="text pl-4">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="fa fa-quote-left"></i>
                  </span>
                  <p>Business</p>
                  <p class="name">Jayden puten</p>
                  <span class="position">As a business student, I find that my university offers a comprehensive and dynamic learning
                    environment that prepares me well for the challenges of the business world.</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img" style="background-image: url(../../assets/LogoFolder/student2.jpg)">
                </div>
                <div class="text pl-4">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="fa fa-quote-left"></i>
                  </span>
                  <p>Civil Engineering</p>
                  <p class="name">Chaza Ibrahim</p>
                  <span class="position">the university offers state-of-the-art facilities and laboratories,
                    providing hands-on experience with the latest technologies and methodologies used in civil engineering practice. </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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