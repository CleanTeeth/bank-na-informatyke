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

	htmlentities($imie, ENT_QUOTES, "UTF-8");
	htmlentities($nazwisko, ENT_QUOTES, "UTF-8");
	htmlentities($email, ENT_QUOTES, "UTF-8");
	htmlentities($pass1, ENT_QUOTES, "UTF-8");
	htmlentities($pass2, ENT_QUOTES, "UTF-8");

	$hash_pass = password_hash($pass1, PASSWORD_DEFAULT);
	$znajdzmnie1 = "@";
	$znajdzmnie2 = ".";


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
	else
	{
		if (strpos($email, $znajdzmnie1) === false && strpos($email, $znajdzmnie2) === false) 
		{
			$_SESSION['wrongemailstyle'] = true;
			$_SESSION['allok'] = false;
		}
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

	for ($i=1; $i <= 8; $i++) 
	{ 
		$numer += rand(0,9);
	}
	$_SESSION['numerk'] = $numer;

	if ($_SESSION['allok'] == true)
	{
		require_once('database_connect.php');
		$conn_database = @new mysqli($host, $db_user, $db_pass, $db_name);
		if ($conn_database->connect_error)
		{
			header('Location: signuperr.php');
		}
		else
		{
			$query = "INSERT INTO uzytkownicy (client_number, password, email, name, last_name) VALUES ($numer, $hash_pass, $email, $imie, $nazwisko)";
			$rezultat = $mysqli_conn->query($query);
			if($rezultat)
			{
				header('Location: cos.php');
			}
			header('Location: index.php');
		}
	}


?>