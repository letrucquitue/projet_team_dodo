<?php                              
  session_start();
  if(!isset($_SESSION['user_id'])){
  	require_once '../config/connectdb.php';
  	if(isset($_POST['btn-login']))
  	{
  		$user_email = trim($_POST['user_email']);
  		$user_password = trim($_POST['password']);
  		$password = $user_password;
  		$stmt = mysqli_prepare($conn,"SELECT id, mdp FROM admin WHERE login=?");                 
      mysqli_stmt_bind_param($stmt, "s", $user_email);
  		mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);    
      mysqli_stmt_bind_result($stmt,$row['id'],$row['mdp']);
      if(mysqli_stmt_num_rows($stmt)>0){
        mysqli_stmt_fetch($stmt);
        if($row['mdp']==$password){	
    		  $_SESSION['user_id'] = $row['id'];
    	    header("location: admin.php");
    		  exit;
        }
      }
      unset($stmt);
  		$stmt = mysqli_prepare($conn,"SELECT id, mdp FROM utilisateur WHERE email=? or login=?");
      mysqli_stmt_bind_param($stmt, "ss", $user_email, $user_email);
  		mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      mysqli_stmt_bind_result($stmt,$row['id'],$row['mdp']);
      if(mysqli_stmt_num_rows($stmt)>0){
        mysqli_stmt_fetch($stmt);
    		if($row['mdp']==$password){	
    		  $_SESSION['user_id'] = $row['id'];
    	    header("location: index.php");
    		}
    		else{	
          echo "email or password does not exist."; // wrong details 
          header("location: connexion.php"); 
    		} 
      }
  		else{	
        echo "email or password does not exist."; // wrong details 
        header("location: connexion.php"); 
  		}
  	}
    else{
  	 header("location: connexion.php");
    }
  }
  else{
    header("location: index.php");
  }
?>