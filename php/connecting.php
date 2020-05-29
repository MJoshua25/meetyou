<?php

	include '../config/Database.php';
	include '../models/Individu.php';

	$bdd = Database::connect();

	// to avoid XSS hacking; protect data of html and js scripts
	$_POST['mail_log'] = strip_tags($_POST['mail_log']);
	$_POST['pwd_log'] = strip_tags($_POST['pwd_log']);

	if(isset($_POST['mail_log']) AND isset($_POST['pwd_log']))
	{
		$req = $bdd -> prepare('SELECT * FROM individu WHERE email = :mail AND password = :password'); // checking user data in database

		$req -> execute(array('mail' => $_POST['mail_log'] , 'password' => $_POST['pwd_log']));

		if($data = $req -> fetch()) // if user exists
		{
			session_start();

			$_SESSION['user'] = new Individu($data);
			$_SESSION['user']->destroyPassword();

			header('location: ../user/dashboard/'); // redirection to the user dashboard
		}
		else
		{
			header('Location: ../?connexionfailed'); // Shows error in connexion
		}

		$req -> closeCursor(); // end of processing

	}else {
		header('Location: ../');
	}

	$bdd = Database::disconnect();
?>
