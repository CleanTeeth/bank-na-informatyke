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
		$GLOBALS['wrongpasswordglobal'] = "Hasła się różnią.";
	}


?>