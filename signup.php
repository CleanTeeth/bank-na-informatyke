<?php 
session_start();


	$imie = $_POST['name'];	
	$nazwisko = $_POST['last_name'];	
	$email = $_POST['email'];	
	$pass1 = $_POST['pass'];	
	$pass2 = $_POST['pass2'];


	if ($pass1 != $pass2)
	{
		$_SESSION['wrongpassword'] = true;
		header('Location: signupindex.php');
	}
	else
	{
		$_SESSION['wrongpassword'] = false;
		if(strlen($pass1) >= 10)
		{
			header('Location: paneluzytkownika.php');		
		}
		else
		{
			$_SESSION['smallpasslen'] = true;
			header('Location: signupindex.php');		
		}
	}


?>