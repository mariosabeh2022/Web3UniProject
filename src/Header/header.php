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
					<?php
					session_start();
					if (empty($_SESSION['Username']) && empty($_SESSION['Page'])) {
						echo "<a class='nav-link' href='../Login/login.php'>Login</a>";
					} else {
						echo "<a class='nav-link dropdown-toggle' href='../HomePage/HomePage.php' role='button' data-bs-toggle='dropdown'>" . $_SESSION['Username'] . "</a>";
						echo "<ul class='dropdown-menu'>";
						echo "<li><a class='dropdown-item' href=" . $_SESSION['Page'] . ">My page</a></li>";
						echo "<li><a class='dropdown-item' href='../Logout/Logout.php'>Logout</a></li>";
						echo "</ul>";
					}
					?>
	        	<li class="nav-item"><a href="../About/about.php" class="nav-link">About</a></li>
				<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">Diploma</a>
						<ul class="dropdown-menu">
						<?php
						$q="select CodeD,Name from diploma";
						$statement=$PDO->prepare($q);
						$statement->execute();
						while($row=$statement->fetch(PDO::FETCH_ASSOC)){
							$Name=$row['Name'];
							$CodeD=$row['CodeD'];
							echo "<li><a class='dropdown-item' href='../HomePage/DisplayDiplomaCourses.php?CodeD=$CodeD'>$Name</a></li>";
						}
						?>
                        </ul>
                </li>
	          <li class="nav-item"><a href="../Contact/contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>