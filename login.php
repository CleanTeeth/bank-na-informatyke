<?php 
session_start();
require_once('database_connect.php');

if($_SESSION['islogin'] == true)
{
	header('Location: main.php');
}
else
{
	header('Location: index.php');
}

	$_SESSION['islogin'] = false;

	$numer_klienta = $_POST['clientnumbers'];
	$pass = $_POST['pass'];

	$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
	$numer_klienta = mysql_real_escape_string($numer_klienta);

	@$conn_database = new mysqli($host, $db_user, $db_pass, $db_name);

	if($conn_database->connect_error)
	{
		die("Nie udało się połączyć z bazą danych: " . $conn_database->connect_error);
	}
	else
	{
		$query = "SELECT money FROM uzytkownicy WHERE client_number = '$numer_klienta'";

		if($result = $conn_database->query($query) && password_verify($pass, $pass_hash))
		{
			//echo "znow sie udalo<br>";
			if($result->num_rows == 0)
			{
				$_SESSION['islogin'] = false;
				$_SESSION['wrongsth'] = true;
			}
			else
			{
				$_SESSION['islogin'] = true;
				// echo "znaleziono uzytkownika o podanych parametrach<br>";
				$tab = $result->fetch_assoc();
				$_SESSION['money'] = $tab['money'];
				header('Location: main.php'); 
			}
			$result->close();
		}
		else
		{
			$_SESSION['islogin'] = false;
		}
	}
?>