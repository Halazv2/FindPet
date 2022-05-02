<?php
class Database
{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $dbname = "findpet";
	public $dbh;
	public function __construct()
	{
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			echo "seccses";
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
		}
	}
}
