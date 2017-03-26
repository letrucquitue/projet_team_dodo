<?php

/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/


session_start();

if(isset($_SESSION['user_id'])!="")
{
	header("Location: index.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connexion</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="../assets/js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/validation.min.js"></script>
<link href="../assets/css/style_connexion.css" rel="stylesheet" type="text/css" media="screen">

</head>

<body style="background-position:center center; background-image:url(../assets/img/fond_connexion.jpg);">
    
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" action="login_process.php" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Login</h2><hr />
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Login ou Email" name="user_email" id="user_email" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Se connecter
			</button> 
        </div>

        <a href="inscription.php">S'inscrire</a>
      
      </form>

    </div>
    
</div>
    
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>