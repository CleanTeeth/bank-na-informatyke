<?php 
session_start();
if($_SESSION['islogin'] == false)
{
	header('Location: index.php');
}
else
{	
	unset($_SESSION['islogin']);
	unset($_SESSION['wrongsth']);
	unset($_SESSION['numerk']);
	$_SESSION['allok'] = true;

	header('Location: index.php');
}
?>