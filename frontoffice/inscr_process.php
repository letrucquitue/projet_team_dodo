<?php

  session_start();
  if(!isset($_SESSION['user_id'])){
  	require_once '../config/connectdb.php';
  	if(isset($_POST['btn-inscr']))
  	{
      $user_nom = trim($_POST['user_nom']);
      $user_prenom = trim($_POST['user_email']);
      $user_login = trim($_POST['user_login']);
  		$user_email = trim($_POST['user_email']);
  		$user_password = trim($_POST['password']);
      $user_ville = trim($_POST['user_ville']);
      $user_cp = trim($_POST['user_cp']);

      $sql = "insert into utilisateur (nom,prenom,email,date_inscri,points_actuels,points_totaux,mdp,login) values('".$user_nom."','".$user_prenom."','".$user_email."',NOW(),'0','0','".$user_password."','".$user_login."')";

      // $conn->exec($sql);
      $res_user = mysqli_query($conn,$sql);

      //insertion ville

      $sql = "select id from utilisateur where login='".$user_login."';";

      $res_id = mysqli_query($conn,$sql);
      while($donnees=mysqli_fetch_array($res_id)){
        $user_id=$donnees['id'];
      }

      $sql = "insert into ville_utilisateur values ('','".$user_ville."','".$user_id."','".$user_cp."')";

      $res_ville = mysqli_query($conn,$sql);

      if($res_user && $res_ville){
        echo "Inscription réussie!";
        header("location: connexion.php"); 
      }
      else{
        echo "failed."; // failed 
        header("location: inscription.php");
      }
  	}
    else{
  	 header("location: inscription.php");
    }
  }
  else{
    header("location: index.php");
  }
?>