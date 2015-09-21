<?php

class Userdatadao {

	private $db;
	private $encrypt;

	function __construct()
	{
		$this->db = Database::getInstance();
		$this->encrypt = new encryption();
	}

	public function insert_user($user)
	{
		$args = array(
			':username' => $user->get_username(),
			':password' => $this->encrypt->encrypt($user->get_password()),
			':email' => $user->get_email(),
			':first_name' => $user->get_first_name(),
			':last_name' => $user->get_last_name(),
			':admin' => $user->get_admin(),
			':active' => $user->get_active()
		);
		$query = "INSERT INTO user_data (username, password, email, first_name, last_name, admin, active)
				VALUES (:username, :password, :email, :first_name, :last_name, :admin, :active)";
		$insert = $this->db->query($query, $args);
		return $insert;
	}

	public function update_user($user)
	{
		$password = '';
		$args = array(
			':username' => $user->get_username(),
			':email' => $user->get_email(),
			':first_name' => $user->get_first_name(),
			':last_name' => $user->get_last_name(),
			':admin' => $user->get_admin(),
			':active' => $user->get_active()
		);
		if (!isempty($user->get_password()))
		{
			$args[':password'] = $this->encrypt->encrypt($user->get_password());
			$password = ', password = :password';
		}
		$query = "UPDATE user_data SET
				email = :email, first_name = :first_name, last_name = :last_name, admin = :admin, active = :active {$password}
				WHERE username = :username";
		$update = $this->db->query($query, $args);
		return $update;
	}

	public function delete_user($username)
	{
		$args = array(':username' => $username);
		$query = "DELETE FROM user_data WHERE username = :username";
		$delete += $this->db->query($query, $args);
		return $delete;
	}

	public function select_all()
	{
		$args = array();
		$query = "SELECT * FROM user_data WHERE 1 ORDER BY id ASC";
		$results = $this->db->query($query, $args);
		if (!count($results)) return false;
		return $results;
	}

	public function select_user($username)
	{
		$args = array(':username' => $username);
		$query = "SELECT * FROM user_data WHERE username = :username OR email = :username";
		$result = $this->db->query($query, $args);
		if (!count($result)) return false;
		$result[0]['password'] = $this->encrypt->decrypt($result[0]['password']);
		return $result[0];
	}
}
