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

      $sql = "insert into utilisateur (nom,prenom,email,date_inscri,points_actuels,points_totaux,mdp,login) values('".$user_nom."','".$user_prenom."','".$user_email."',NOW(),'0','0','".$user_password."','".$user_login."')";

      // $conn->exec($sql);
      $res = mysqli_query($conn,$sql);

      if($res){
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