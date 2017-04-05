<?php 
session_start();
if($_SESSION['islogin'] == false)
{
	header('Location: index.php');
	$_SESSION['wrongsth'] = true;
}
else
{	
	unset($_SESSION['islogin']);
	unset($_SESSION['wrongsth']);

	header('Location: index.php');
}
?>