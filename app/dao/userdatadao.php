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
			':user_name' => $user->get_user_name(),
			':password' => $user->get_user_password(),
			':email' => $user->get_user_email(),
			':first_name' => $user->get_user_first_name(),
			':last_name' => $user->get_user_last_name(),
			':pwd' => $this->encrypt->encrypt($user->get_user_password()),
		);
		$query = "INSERT INTO user_info VALUES (:user_name, encrypt(:password), :first_name, :last_name, :email, :pwd)";
		$insert = $this->db->query($query, $args);
		return $insert;
	}

	public function update_user($user)
	{
		$password = '';
		$args = array(
			':user_name' => $user->get_user_name(),
			':email' => $user->get_user_email(),
			':first_name' => $user->get_user_first_name(),
			':last_name' => $user->get_user_last_name(),
		);
		if (!isempty($user->get_user_password()))
		{
			$args[':password'] = $user->get_user_password();
			$args[':pwd'] = $this->encrypt->encrypt($user->get_user_password());
			$password = ', user_password = encrypt(:password), user_pwd = :pwd';
		}
		$query = "UPDATE user_info SET
				user_email = :email, user_first_name = :first_name, user_last_name = :last_name {$password}
				WHERE user_name = :user_name";
		$update = $this->db->query($query, $args);
		return $update;
	}

	public function delete_user($user_name)
	{
		$args = array(':user_name' => $user_name);
		$query = "DELETE FROM user_info WHERE user_name = :user_name";
		$delete += $this->db->query($query, $args);
		return $delete;
	}

	public function select_all()
	{
		$args = array();
		$query = "SELECT * FROM user_info WHERE 1 ORDER BY user_name ASC";
		$results = $this->db->query($query, $args);
		if (!count($results)) return false;
		return $results;
	}

	public function select_user($user_name)
	{
		$args = array(':user_name' => $user_name);
		$query = "SELECT * FROM user_info WHERE user_name = :user_name";
		$result = $this->db->query($query, $args);
		if (!count($result)) return false;
		$result[0]['user_password'] = $this->encrypt->decrypt($result[0]['user_pwd']);
		return $result[0];
	}
}
