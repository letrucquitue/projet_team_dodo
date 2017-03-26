<?php

if(isset($_POST['submit'])) {
$adr_depart=$_POST['adr_depart'];
$ville_depart=$_POST['ville_depart'];
$pays_depart=$_POST['pays_depart'];
$adr_arrivee=$_POST['adr_arrivee'];
$ville_arrivee=$_POST['ville_arrivee'];
$pays_arrivee=$_POST['pays_arrivee'];
include '../config/connectdb.php';
include 'DistDurationCalcul.php';
$coordinates1 = get_coordinates($ville_depart, $adr_depart, $pays_depart);
$coordinates2 = get_coordinates($ville_arrivee,$adr_arrivee, $pays_arrivee);
if ( !$coordinates1 || !$coordinates2 )
{
    echo 'Bad address.';
}
else
{
$distDrivingArray=GetDrivingDistanceAndDuration($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long'],"driving");

$distWalkingArray=GetDrivingDistanceAndDuration($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long'],"walking");
$distBicyclingArray=GetDrivingDistanceAndDuration($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long'],"bicycling");

}
// Retrieve all records and display them
   $result = $conn->query("SELECT * FROM vehicule ORDER BY point_km");

   // Used for row color toggle
   $oddrow = true;

   // process every record


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

						</ul>
						<ul class="nav navbar-nav navbar-right">


							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<p>
										Profil
										<b class="caret"></b>
									</p>

								</a>
								<ul class="dropdown-menu">
									<li><a href="#"> <i class="pe-7s-user"></i> Editer Profil</a></li>

									<li><a href="#"> <i class="pe-7s-power"></i> Se déconnecter</a></li>
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
									<h4 class="title">Recherche trajet</h4>
								</div>
                <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
            <th>Intitule</th>
            <th>Description</th>
            <th>Consommation/km</th>
            <th>Point/km</th>
            <th>Distance</th>
            <th>Duree</th>


          </thead>
          <tbody>
            <?php  while( $row = $result->fetch_assoc())
              {?>
                <tr>
                  <td><?php echo $row['intitule'];?></td>
                  <td><?php echo $row['description'];?></td>
                  <td><?php echo $row['consommation_km'];?></td>
                  <td><?php echo $row['point_km'];?></td>
                  <td><?php if ($row['mode']=="bicycling") {echo $distWalkingArray['distance'];}
                  if ($row['mode']=="walking") {echo $distBicyclingArray['distance'];}
                  if ($row['mode']=="driving") {echo $distDrivingArray['distance'];}?></td>
                  <td><?php if ($row['mode']=="walking") {echo $distWalkingArray['time'];}
                  if ($row['mode']=="bicycling") {echo $distBicyclingArray['time'];}
                  if ($row['mode']=="bicycling") {echo $distDrivingArray['time'];}?></td>



                </tr>


              <?php }}
              ?>

          </tbody>
      </table>

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
