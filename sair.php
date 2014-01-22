<?php 

	include ("global.php");

	if(isset($_SESSION['usuario']))
	{
		unset($_SESSION['usuario']);
	}	
	
	header('Location: index.php');
?>
