<?php
/**
* Database access class.
* Used in applications where one point of database access is required
*
* Typical Usage:
* $db = Database::getInstance();
* $results = $db->query("SELECT * FROM test WHERE name = :name",array(":name" => "matthew"));
* print_r($results);
*
* @author Matthew Elliston <matt@e-titans.com>
* @modified Skander Jabouzi <skander@skanderjabouzi.com>
* @version 2.0
*/
class Database {

	/**
	* Instance of the database class
	* @static Database $instance
	*/
	private static $instance;

	/**
	* Database connection
	* @access private
	* @var PDO $connection
	*/
	private $connection;

	private $hostname;
	private $username;
	private $password;
	private $database;
	private $driver;

	/**
	* Constructor
	* @param $dsn The Data Source Name. eg, "mysql:dbname=testdb;host=127.0.0.1"
	* @param $username
	* @param $password
	*/
	private function __construct(){
		require(APPPATH.'/app/config/config.php');
		$this->setHost($config['host']);
		$this->setUsername($config['username']);
		$this->setPassword($config['password']);
		$this->setDatabase($config['database']);
		$this->setDriver($config['driver']);
		$this->connect();
	}

	public function connect()
	{
		$this->connection = new PDO("{$this->driver}:dbname={$this->database};host={$this->hostname}",$this->username,$this->password);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function close()
	{
		$this->connection = null;
	}

	/**
	* Gets an instance of the Database class
	*
	* @static
	* @return Database An instance of the database singleton class.
	*/
	public static function getInstance(){
		if(empty(self::$instance)){
			try{
				self::$instance = new Database();
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		}
		return self::$instance;
	}

	public function setHost($hostname){
		$this->hostname = $hostname;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function setDatabase($database){
		$this->database = $database;
	}

	public function setDriver($driver){
		$this->driver = $driver;
	}

	/**
	* Runs a query using the current connection to the database.
	*
	* @param string query
	* @param array $args An array of arguments for the sanitization such as array(":name" => "foo")
	* @return array Containing all the remaining rows in the result set.
	*/
	public function query($query, $args){
		try{
			$sth = $this->connection->prepare($query);
			if(empty($args)){
				$sth->execute();
			}
			else{
				$sth->execute($args);
			}
			if(strpos(strtoupper(trim($query)), "SELECT") === 0){
				$sth->setFetchMode(PDO::FETCH_ASSOC);
				$results = $sth->fetchAll();
				return $results;
			}
		} catch (PDOException $e) {
			echo 'Query failed: ' . $e->getMessage();
			echo '<br />Query : ' . $query;
		}
		return 1;
	}

	/**
	* Returns the last inserted ID
	*
	* @return int ID of the last inserted row
	*/
	public function lastInsertId(){
		return $this->connection->lastInsertId();
	}
}
?>
