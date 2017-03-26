<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=1;
}
?>


<?php
	include '../config/connectdb.php';
	/*Récupération des infos utilisateur*/
	if(isset($_SESSION['user_id'])){
		//Prénom
		$resPrenom = mysqli_query($conn,'select prenom from utilisateur where id='.$_SESSION['user_id'].';');
		while($donnees=mysqli_fetch_array($resPrenom)){
			$prenom=$donnees['prenom'];
		}

		//Nom
		$resnom = mysqli_query($conn,'select nom from utilisateur where id='.$_SESSION['user_id'].';');
		while($donnees=mysqli_fetch_array($resnom)){
			$nom=$donnees['nom'];
		}

		//Username
		$reslogin = mysqli_query($conn,'select login from utilisateur where id='.$_SESSION['user_id'].';');
		while($donnees=mysqli_fetch_array($reslogin)){
			$login=$donnees['login'];
		}

		//Ville
	}

	/*Traitement du formulaire*/
	if(isset($POST['prenom'])){
		$sql = 'update utilisateur set prenom = ? where id_user = '.$_SESSION['user_id'].';';

	}
	if(isset($POST['nom'])){
		$sql = 'update utilisateur set nom = '.$_POST['nom'].' where id_user = '.$_SESSION['user_id'].';';
	}
	//Traitement ville
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Profil - TimKY</title>

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

						<!--Affichage du profil-->
						<div class="col-md-6">
							<div class="card card-user">
								<!--Photo de couverture-->
								<div class="image">
									<img src="../assets/img/cover-default.jpg" alt="Photo de couverture"/>
								</div>
								<div class="content">
									<div class="author">
										<a href="#">
											<!--Avatar-->
											<img class="avatar" src="../assets/img/default-avatar.png" alt="Photo de profil"/>
												
											<!--tmp version-->
											<h4 class="title">
												<!--Nom complet--> 
												<?php
													echo $prenom.' '.$nom;
												?> <br/>
												<!--Username-->
												<small><?php echo $login; ?></small>
											</h4>
										</a>
										<h5>
											<!--Titre-->
											Poussin
										</h5>
										<h6>
											<!--Ville-->
											Lannion
										</h6>
										<p>
											Vélo<br>
											Trotinette
										</p>	
									</div>
								</div>
							</div>
						</div>

						<!--Edition du profil-->
						<div class="col-md-6">
							<div class="card">
								<div class="header">
                  <h4 class="title">
                    Modifier le profil
                  </h4>
                </div>
                <div class="content">
                  <form name ="edit" action="profil.php" method="POST">
                  	<!--Rangée Prénom Nom-->
                   	<div class="row">

                       	<!--Modif prénom-->
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" class="form-control" placeholder="Prénom" name="prenom">
                          </div>
                        </div>
                        
                        <!--Modif nom-->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nom">
                          </div>
                        </div>

                      </div>

                      <!--Rangée Ville-->
                      <div class="row">

                       	<!--Modif ville-->
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Ville</label>
                            <input type="text" class="form-control" placeholder="Ville" name="ville">
                          </div>
                        </div>

                      </div>

                      <!--Bouton de validation-->
											<button type="submit" class="btn btn-info btn-fill pull-right">Valider</button>

                      <div class="clearfix"></div>
                  </form>
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
