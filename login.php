<?php 
session_start();
require_once('database_connect.php');

if($_SESSION['islogin'] == true)
{
	unset($_SESSION['wrongsth']);
	header('Location: main.php');
}
else
{
	unset($_SESSION['wrongsth']);
	header('Location: index.php');
}
	
	$_SESSION['islogin'] = false;
	unset($_SESSION['wrongsth']);

	$numer_klienta = $_POST['clientnumbers'];
	$pass = $_POST['pass'];

	htmlentities($numer_klienta, ENT_QUOTES, 'UTF-8');

	@$conn_database = new mysqli($host, $db_user, $db_pass, $db_name);

	if($conn_database->connect_error)
	{
		die("Nie udało się połączyć z bazą danych: " . $conn_database->connect_error);
	}
	else
	{
		$query = sprintf("SELECT * FROM uzytkownicy WHERE client_number = '$numer_klienta'",
			mysql_real_escape_string($numer_klienta));

		if($result = $conn_database->query($query))
		{
			if($result->num_rows == 0)
			{
				$_SESSION['islogin'] = false;
				$_SESSION['wrongsth'] = true;
			}
			else
			{
				$tab = $result->fetch_assoc();
				if(password_verify($pass, $tab['password']))
				{
					$_SESSION['islogin'] = true;
					unset($_SESSION['wrongsth']);
					$_SESSION['money'] = $tab['money'];
					header('Location: main.php'); 
				}
				else
				{
					$_SESSION['islogin'] = false;
					$_SESSION['wrongsth'] = true;
				}
			}
			$result->close();
		}
		else
		{
			$_SESSION['islogin'] = false;
			$_SESSION['wrongsth'] = true;
		}
	}
?>