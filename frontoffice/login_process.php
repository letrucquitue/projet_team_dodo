<?php

	session_start();
	require_once '../config/connectdb.php';
/*
	$db_host = "localhost";
	$db_name = "timky";
	$db_user = "root";
	$db_pass = "root";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
*/
	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$user_email = trim($_POST['user_email']);
		$user_password = trim($_POST['password']);
		
		$password = $user_password;
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM utilisateur WHERE email=:email");
			$stmt->execute(array(":email"=>$user_email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			if($row['mdp']==$password){
				
				$_SESSION['user_session'] = $row['id'];
				echo "ok"; // log in
			}
			else{
				
				echo "email or password does not exist."; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>