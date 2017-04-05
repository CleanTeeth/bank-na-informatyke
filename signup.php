<?php 
session_start();
if ($_SESSION['islogin'] == true)
{
	header('Location: main.php');
}
else if ($_SESSION['islogin'] == false) 
{
	header('Location: index.php');
}

	$imie = $_POST['name'];	
	$nazwisko = $_POST['last_name'];	
	$email = $_POST['email'];	
	$pass1 = $_POST['pass'];	
	$pass2 = $_POST['pass2'];

	// $sekretny_klucz = "6LerbhsUAAAAAJSx_PfFEEuL8flI4YY-39FsOjN2";
	// $poscik = $_POST['g-recaptcha-response'];
	// $sprawdzcaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$sekretny_klucz$response=$poscik");
	// $odpowiedz = json_decode($sprawdzcaptcha);

	// //Obsługa postych pól
	// if ($odpowiedz->success == false)
	// {
	// 	$_SESSION['botornot'] == true;
	// }
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
	if ($pass1 != $pass2)
	{
		$_SESSION['diffpass'] = true;
		header('Location: signupindex.php');
	}
	else
	{
		unset($_SESSION['diffpass']);
		if(strlen($pass1) >= 4)
		{
			$_SESSION['signupdone'] = true;
			header('Location: index.php');		
		}
		else
		{
			$_SESSION['smallpasslen'] = true;
			header('Location: signupindex.php');		
		}
	}


?>