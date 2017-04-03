<?php 
session_start();


	$imie = $_POST['name'];	
	$nazwisko = $_POST['last_name'];	
	$email = $_POST['email'];	
	$pass1 = $_POST['pass'];	
	$pass2 = $_POST['pass2'];


	//Obsługa postych pól
	if ($imie == NULL)
	{
		$_SESSION['nullname'] = true;
	}
	if ($nazwisko == NULL)
	{
		$_SESSION['nulllastname'] = true;
	}	
	if ($email == NULL)
	{
		$_SESSION['nullemail'] = true;
	}
	if ($pass1 == NULL)
	{
		$_SESSION['nullpass1'] = true;
	}


	// Obsługa dlugości i zgodności hasła
	if ($pass1 != $pass2 && $pass1 != NULL && $pass2 != NULL)
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