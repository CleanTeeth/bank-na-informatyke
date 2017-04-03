<?php 
session_start();
if($_SESSION['islogin'] == false)
{
	header('Location: index.php');
	$_SESSION['wrongsth'] = true;
}
else
{	
	$_SESSION['islogin'] = false;
	$_SESSION['wrongsth'] = false;

	header('Location: index.php');
}
?>