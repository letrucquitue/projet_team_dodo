<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("location: connexion.php");
}

include_once '../config/connectdb.php';

$stmt = $db_con->prepare("SELECT * FROM utilisateur WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>TimKY</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="../assets/css/animate.min.css" rel="stylesheet" />

	<!--  Light Bootstrap Table core CSS    -->
	<link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="../assets/css/demo.css" rel="stylesheet" />


	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>

	<div class="wrapper">
		<div class="sidebar" data-color="green" data-image="../assets/img/sidebar-5.jpg">

			<!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="#" class="simple-text">
						<img src="../assets/img/logo_white.png" alt="..." width="42" height="42">

                    TimKY
                </a>
				</div>

				<ul class="nav">
					<li class="active">
						<a href="index.php">
							<i class="pe-7s-home"></i>
							<p>Accueil</p>
						</a>
					</li>
					<li>
						<a href="recherchetrajet.php">
							<i class="pe-7s-search"></i>
							<p>Recherche Trajet</p>
						</a>
					</li>
					<li>
						<a href="succes.php">
							<i class="pe-7s-cup"></i>
							<p>Succés</p>
						</a>
					</li>
					<li>
						<a href="historique.php">
							<i class="pe-7s-clock"></i>
							<p>Historique
							</p>
						</a>
					</li>
					<li>
						<a href="classement.php">
							<i class="pe-7s-medal"></i>
							<p>Classement</p>
						</a>
					</li>
					<li>
						<a href="recompenses.php">
							<i class="pe-7s-gift"></i>
							<p>Récompenses</p>
						</a>
					</li>


				</ul>
			</div>
		</div>

		<div class="main-panel">
			<nav class="navbar navbar-default navbar-fixed">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="#">Accueil</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-left">
							<!-- <li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-dashboard"></i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li> -->
							<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-globe"></i>
									<b class="caret hidden-sm hidden-xs"></b>
									<span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Notification 1</a></li>
									<li><a href="#">Notification 2</a></li>
									<li><a href="#">Notification 3</a></li>
									<li><a href="#">Notification 4</a></li>
									<li><a href="#">Another notification</a></li>
								</ul>
							</li> -->
							<!-- <li>
								<a href="">
									<i class="fa fa-search"></i>
									<p class="hidden-lg hidden-md">Search</p>
								</a>
							</li> -->
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<!-- <li>
								<a href="">
									<p>Account</p>
								</a>
							</li> -->

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<p>
										Profil
										<b class="caret"></b>
									</p>

								</a>
								<ul class="dropdown-menu">
									<li><a href="profil.php"> <i class="pe-7s-user"></i> Editer Profil</a></li>

									<li><a href="logout.php"> <i class="pe-7s-power"></i> Se déconnecter</a></li>
								</ul>
							</li>

							<li class="separator hidden-lg hidden-md"></li>
						</ul>
					</div>
				</div>
			</nav>


			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="header">
									<h4 class="title">Light Bootstrap Table Heading</h4>
									<p class="category">Created using Roboto Font Family</p>
								</div>
								<div class="content">

									<div class="typo-line">
										<h1><p class="category">Header 1</p>Light Bootstrap Table Heading </h1>
									</div>

									<div class="typo-line">
										<h2><p class="category">Header 2</p>Light Bootstrap Table Heading</h2>
									</div>
									<div class="typo-line">
										<h3><p class="category">Header 3</p>Light Bootstrap Table Heading</h3>
									</div>
									<div class="typo-line">
										<h4><p class="category">Header 4</p>Light Bootstrap Table Heading</h4>
									</div>
									<div class="typo-line">
										<h5><p class="category">Header 5</p>Light Bootstrap Table Heading</h5>
									</div>
									<div class="typo-line">
										<h6><p class="category">Header 6</p>Light Bootstrap Table Heading</h6>
									</div>
									<div class="typo-line">
										<p><span class="category">Paragraph</span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
									</div>
									<div class="typo-line">
										<p class="category">Quote</p>
										<blockquote>
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.
											</p>
											<small>
                                     Steve Jobs, CEO Apple
                                     </small>
										</blockquote>
									</div>

									<div class="typo-line">
										<p class="category">Muted Text</p>
										<p class="text-muted">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
										</p>
									</div>
									<div class="typo-line">
										<!--
                                     there are also "text-info", "text-success", "text-warning", "text-danger" clases for the text
                                     -->
										<p class="category">Coloured Text</p>
										<p class="text-primary">
											Text Primary - Light Bootstrap Table Heading and complex bootstrap dashboard you've ever seen on the internet.
										</p>
										<p class="text-info">
											Text Info - Light Bootstrap Table Heading and complex bootstrap dashboard you've ever seen on the internet.
										</p>
										<p class="text-success">
											Text Success - Light Bootstrap Table Heading and complex bootstrap dashboard you've ever seen on the internet.
										</p>
										<p class="text-warning">
											Text Warning - Light Bootstrap Table Heading and complex bootstrap dashboard you've ever seen on the internet.
										</p>
										<p class="text-danger">
											Text Danger - Light Bootstrap Table Heading and complex bootstrap dashboard you've ever seen on the internet.
										</p>
									</div>

									<div class="typo-line">
										<h2><p class="category">Small Tag</p>Header with small subtitle <br><small>".small" is a tag for the headers</small> </h2>
									</div>


								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">

					<p class="copyright pull-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script> <a href="index.html">TimKY</a>, 100% ECO
					</p>
				</div>
			</footer>


		</div>
	</div>


</body>

<!--   Core JS Files   -->
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
