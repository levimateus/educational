<?php 
namespace Core;

use \PDO;

class DBConnection
{
	private $dbDriver;
	private $dbName;
	private $dbPassword;
	private $dbUserName;
	private $hostName;

	private $connection;

	function __construct(
		$dbDriver = PROJECT_DBDRIVER,
		$dbName = PROJECT_DBNAME,
		$dbPassword = PROJECT_DBPASSWORD,
		$dbUserName = PROJECT_DBUSER,
		$hostName = PROJECT_DBHOST
	){
		$this->setDbDriver($dbDriver);
		$this->setDbName($dbName);
		$this->setDbPassword($dbPassword);
		$this->setDbUserName($dbUserName);
		$this->setHostName($hostName);
	}

	public function getDbDriver(){
		return $this->dbDriver;
	} 

	public function setDbDriver($driver){
		$this->dbDriver = $driver;
	}

	public function getDbName(){
		return $this->dbName;
	}

	public function setDbName($dbName){
		$this->dbName = $dbName;
	}

	public function getDbPassword(){
		return $this->dbPassword;
	}

	public function setDbPassword($dbPassword){
		$this->dbPassword = $dbPassword;
	}

	public function getDbUserName(){
		return $this->dbUserName;
	}

	public function setDbUserName($dbUserName){
		$this->dbUserName = $dbUserName;
	}

	public function getHostName(){
		return $this->hostName;
	}

	public function setHostName($hostName){
		$this->hostName = $hostName;
	}

	public function getConnection(){
		return $this->connection;
	}

	public function connect(){
		$dsn = $this->getDbDriver().':host='.$this->getHostName().';dbname='.$this->getDbName();
		
		try {
			$connection = new PDO($dsn, $this->getDbUserName(), $this->getDbPassword());
			$this->connection =  $connection;
		} catch (Exception $e) {
			return $e;
		}
	}
}