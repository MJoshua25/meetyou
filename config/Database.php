<?php

class Database
{
	private static $dbHost = "localhost";
	private static $dbName = "bd_rencontre";
	private static $dbUsername = "admin";
	private static $dbUserpassword = "admin";

	private static $connection = null;

	public static function connect()
	{
		if(self::$connection == null){
			try
			{
				self::$connection = new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbName, self::$dbUsername, self::$dbUserpassword);
				self::$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e)
			{
				echo "Error : {$e->getMessage()}";
			}
		}
		return self::$connection;
	}

	public static function disconnect()
	{
		self::$connection = null;
	}
}

 ?>
