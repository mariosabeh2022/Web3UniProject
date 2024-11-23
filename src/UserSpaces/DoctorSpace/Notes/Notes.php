<?php
include "../../../../Backend/Connection/connection.php";
session_start();
if (empty($_SESSION['Username']) || empty($_SESSION['IDD'])) {
    header("Location:../../../LogIn/LogIn.php");
} else {
    $IDD = $_SESSION['IDD'];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Notes</title>
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
                            $q = "select CodeD,Name from diploma";
                            $statement = $PDO->prepare($q);
                            $statement->execute();
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                $Name = $row['Name'];
                                $CodeD = $row['CodeD'];
                                echo "<li><a class='dropdown-item' href='../../../HomePage/DisplayDiplomaCourses.php?CodeD=$CodeD'>$Name</a></li>";
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="../../../Contact/contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="NotesTable.php" class="nav-link">Export to excel sheet</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <form class="row g-3" action="Notes.php" method="POST">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Diplomas</label>
                        <select id="inputState" class="form-select" name="Diploma">
                            <?php
                            $queryD = "select CodeD,Name from diploma";
                            $statement1 = $PDO->prepare($queryD);
                            $statement1->execute();
                            while ($result1 = $statement1->fetch(PDO::FETCH_ASSOC)) {
                                $CodeD = $result1['CodeD'];
                                $Name = $result1['Name'];
                                $Diploma = $CodeD . " " . $Name;
                                echo "<option value='$Diploma'>$Diploma</option>";
                            }
                            ?>
                        </select>
                        <input type="submit" class="btn btn-primary" value="Filter by diploma" name="Filter1">
                    </div>
                </form>
                <br>
                <form class="row g-3" action="Notes.php" method="POST">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Courses</label>
                        <select id="inputState" class="form-select" name="Course">
                            <?php
                            if (isset($_POST['Filter1'])) {
                                if (isset($_POST['Diploma'])) {
                                    $FilteredDiploma = $_POST['Diploma'];
                                    $space = strpos($FilteredDiploma, ' ');
                                    $FilteredDiplomaCode = substr($FilteredDiploma, 0, $space);
                                    $queryC = "select CourseCode,Name from course where CodeD='$FilteredDiplomaCode'";
                                    $sttmt = $PDO->prepare($queryC);
                                    $sttmt->execute();
                                    while ($result2 = $sttmt->fetch(PDO::FETCH_ASSOC)) {
                                        $CodeC = $result2['CourseCode'];
                                        $Name = $result2['Name'];
                                        $Course = $CodeC . " " . $Name;
                                        echo "<option value='$Course'>$Course</option>";
                                    }
                                } else echo "<option></option>";
                            } else echo "<option></option>";
                            ?>
                        </select>
                        <input type="submit" class="btn btn-primary" value="Filter by course" name="Filter2">
                    </div>
                </form>
                <br>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <?php
        if (isset($_POST['Filter1'])) {
            $FilteredD = $_POST['Diploma'];
            $space = strpos($FilteredD, ' ');
            $FilteredDCode = substr($FilteredD, 0, $space);
            $query = "select count(*)
                            from student,course,enroll
                            where
                            student.IDS = enroll.IDS 
                            and enroll.CourseCode = course.CourseCode 
                            and course.IDD = '$IDD'
                            and course.CodeD='$FilteredDCode'";
            $statement = $PDO->prepare($query);
            $statement->execute();
            $res = $statement->fetch();
            $count = $res[0];
        } else if (isset($_POST['Course'])) {
            $FilteredC = $_POST['Course'];
            $space = strpos($FilteredC, ' ');
            $FilteredCCode = substr($FilteredC, 0, $space);
            $query = "select count(*)
                            from student,course,enroll
                            where
                            student.IDS = enroll.IDS 
                            and enroll.CourseCode = course.CourseCode 
                            and course.IDD = '$IDD'
                            and course.CourseCode='$FilteredCCode'";
            $statement = $PDO->prepare($query);
            $statement->execute();
            $res = $statement->fetch();
            $count = $res[0];
        } else
        ?>
        <h2>Total of
            <?php
        if (isset($_POST['Filter1']) || isset($_POST['Course']))
            if ($count > 1) echo $count . " Students";
            else echo $count . " Student";
        else echo 0 . " Student";
            ?>
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="border: 2px solid black">
                <thead class="thead-dark">
                    <tr>
                        <th>FirstName</th>
                        <th>MiddleName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Grade</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['Filter1'])) {
                        $FilteredD = $_POST['Diploma'];
                        $space = strpos($FilteredD, ' ');
                        $FilteredDCode = substr($FilteredD, 0, $space);
                        $query = "select student.IDS,student.FirstName, student.MiddleName, student.LastName,student.Email,enroll.CourseCode 
                                   from student, course, enroll 
                                   where student.IDS = enroll.IDS
                                   and enroll.CourseCode = course.CourseCode 
                                   and course.IDD = '$IDD'
                                   and course.CodeD = '$FilteredDCode'";
                        $statement = $PDO->prepare($query);
                        $statement->execute();
                        while ($row = $statement->fetch()) {
                            $SFN = $row[1];
                            $SMN = $row[2];
                            $SLN = $row[3];
                            $SEmail = $row[4];
                            $SCourse = $row[5];
                            echo "<tr class='coloredRow'>";
                            echo "<td>" . $SFN . "</td>";
                            echo "<td>" . $SMN . "</td>";
                            echo "<td>" . $SLN . "</td>";
                            echo "<td><a>" . $SEmail . "</a></td>";
                            echo "<td>" . $SCourse . "</td>";
                            $query_grade = "select Grade 
                                             from grades 
                                             where IDS = $row[0]
                                             and IDD = '$IDD'
                                             and ECode in
                                            (select ECode from exam where CourseCode ='$SCourse'); ";
                            $sttmt = $PDO->prepare($query_grade);
                            $sttmt->execute();
                            if ($row2 = $sttmt->fetch())
                                $grade = $row2[0];
                            else $grade = null;
                            if (!empty($grade)) {
                                echo "<td>" . $grade . "</td>";
                                echo "<td><a href='EditNote.php?IDS=" . $row[0] . "&CourseCode=" . $row[5] . "'><button class='btn btn-primary'>Edit Note</button></a></td>";
                                echo "</tr>";
                            } else {
                                $null = null;
                                echo "<td>$null</td>";
                                echo "<td><a href='AddNote.php?IDS=" . $row[0] . "&CourseCode=" . $row[5] . "'><button class='btn btn-primary'>Add Note</button></a></td>";
                                echo "</tr>";
                            }
                        }
                    } else if (isset($_POST['Course'])) {
                        $FilteredC = $_POST['Course'];
                        $space = strpos($FilteredC, ' ');
                        $FilteredCCode = substr($FilteredC, 0, $space);
                        $query = "select student.IDS,student.FirstName, student.MiddleName, student.LastName, student.Email,enroll.CourseCode 
                                from student, course, enroll 
                                where student.IDS = enroll.IDS
                                and enroll.CourseCode = course.CourseCode 
                                and course.IDD = '$IDD'
                                and course.CourseCode = '$FilteredCCode'";
                        $statement = $PDO->prepare($query);
                        $statement->execute();
                        while ($row = $statement->fetch()) {
                            $SFN = $row[1];
                            $SMN = $row[2];
                            $SLN = $row[3];
                            $SEmail = $row[4];
                            $SCourse = $row[5];
                            echo "<tr class='coloredRow'>";
                            echo "<td>" . $SFN . "</td>";
                            echo "<td>" . $SMN . "</td>";
                            echo "<td>" . $SLN . "</td>";
                            echo "<td><a>" . $SEmail . "</a></td>";
                            echo "<td>" . $SCourse . "</td>";
                            $query_grade = "select Grade 
                                        from grades 
                                        where IDS = $row[0]
                                        and IDD = '$IDD'
                                        and ECode in
                                          (select ECode from exam where CourseCode ='$SCourse'); ";
                            $sttmt = $PDO->prepare($query_grade);
                            $sttmt->execute();
                            if ($row2 = $sttmt->fetch())
                                $grade = $row2[0];
                            else $grade = null;
                            if (!empty($grade)) {
                                echo "<td>" . $grade . "</td>";
                                echo "<td><a href='EditNote.php?IDS=" . $row[0] . "&CourseCode=" . $row[5] . "'><button class='btn btn-primary'>Edit Note</button></a></td>";
                                echo "</tr>";
                            } else {
                                $null = null;
                                echo "<td>$null</td>";
                                echo "<td><a href='AddNote.php?IDS=" . $row[0] . "&CourseCode=" . $row[5] . "'><button class='btn btn-primary'>Add Note</button></a></td>";
                                echo "</tr>";
                            }
                        }
                    } else echo "";
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