<?php

	try // connexion to database
	{
		$bdd = new PDO('mysql:host=localhost; dbname=bd_rencontre; port=3308', 'admin', 'admin'); // you can remove the port

		$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		die('Error: ' . $e -> getMessage());
	}
?>
