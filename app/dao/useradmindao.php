<?php

class Useradmindao {

	private $db;
	private $encrypt;

	function __construct()
	{
		$this->db = Database::getInstance();
		$this->encrypt = new encryption();
	}

	public function insert($user)
	{
		$args = array(
				':email' => $user->get_email(),
				':first_name' => $user->get_first_name(),
				':last_name' => $user->get_last_name(),
				':password' => $this->encrypt->encrypt($user->get_password()),
				':admin' => $user->get_admin(),
				':active' => $user->get_active()
			);

		$query = "INSERT INTO user_admin (email, first_name, last_name, password, admin, active) 
				VALUES ('', :email, :first_name, :last_name, :password, :admin, :active)";
		$this->db->query($query, $args);
		return $this->db->lastInsertId();
	}

	public function update($user)
	{
		$password = '';
		$args = array(
				':email' => $user->get_email(),
				':first_name' => $user->get_first_name(),
				':last_name' => $user->get_last_name(),
				':admin' => $user->get_admin(),
				':active' => $user->get_active(),
				':id' => $user->get_id()
			);
		if (!isempty($user->get_password()))
		{
			$args[':password'] = $this->encrypt->encrypt($user->get_password());
			$password = ', password = :password';
		}
		$query = "UPDATE user_admin SET
				email = :email, first_name = :first_name, last_name = :last_name, admin = :admin, active = :active {$password}
				WHERE id = :id";
		$update = $this->db->query($query, $args);
		return $update;
	}

	public function delete($email)
	{
		$args = array(
			':email' => $email
		);
		$query = "DELETE FROM user_admin WHERE email = :email ";
		$delete = $this->db->query($query, $args);
		return $delete;
	}

	public function select_all()
	{
		$args = array();
		$users = array();
		$query = "SELECT * FROM user_admin ";
		$results = $this->db->query($query, $args);
		if (!count($results)) return false;
		return $results;
	}

	public function select_user($email)
	{
		$args = array(
			':email' => $email
		);
		$query = "SELECT * FROM user_admin WHERE email = :email";
		$result = $this->db->query($query, $args);
		if (!count($result)) return false;
		$result[0]['password'] = $this->encrypt->decrypt($result[0]['password']);
		return $result[0];
	}

}
