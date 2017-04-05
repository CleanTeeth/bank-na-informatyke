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

	$sekretny_klucz = "6LerbhsUAAAAAJSx_PfFEEuL8flI4YY-39FsOjN2";
	$sprawdzcaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$sekretny_klucz."&response=".$_POST['g-recaptcha-response']);
	$odpowiedz = json_decode($sprawdzcaptcha);

	$_SESSION['allok'] = true;

	//Obsługa pustych pól
	if ($odpowiedz->success == false)
	{
		$_SESSION['botornot'] = true;
		$_SESSION['allok'] = false;
	}
	if ($imie == NULL)
	{
		$_SESSION['nullname'] = true;
		$_SESSION['allok'] = false;
	}
	if ($nazwisko == NULL)
	{
		$_SESSION['nulllastname'] = true;
		$_SESSION['allok'] = false;
	}	
	if ($email == NULL)
	{
		$_SESSION['nullemail'] = true;
		$_SESSION['allok'] = false;
	}
	if ($pass1 == NULL)
	{
		$_SESSION['nullpass1'] = true;
		$_SESSION['allok'] = false;
	}
	if (!isset($_POST['akceptacjaregulaminu']))
	{
		$_SESSION['akceptacjaregulaminusess'] = true;
		$_SESSION['allok'] = false;
	}


	// Obsługa dlugości i zgodności hasła
	if ($pass1 != $pass2)
	{
		$_SESSION['diffpass'] = true;
		$_SESSION['allok'] = false;
		header('Location: signupindex.php');
	}
	else
	{
		unset($_SESSION['diffpass']);
		if(strlen($pass1) >= 4)
		{
			unset($_SESSION['smallpasslen']);
			header('Location: signupindex.php');		
		}
		else
		{
			$_SESSION['smallpasslen'] = true;
			$_SESSION['allok'] = false;
			header('Location: signupindex.php');		
		}
	}

	// if ($_SESSION['allok'] == true)
	// {

	// }


?>