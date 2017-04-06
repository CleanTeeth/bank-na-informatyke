<?php 
session_start();
if($_SESSION['islogin'] == true)
{
	header('Location: index.php');
}
	echo "Twój numer klienta: <b>" . $_SESSION['numerk'] . "</b> zapamiętaj go!";
	echo "<a href='logout.php'>Wróć</a>";
 ?>