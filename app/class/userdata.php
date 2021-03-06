<?php

class Userdata extends User {

	private $id;
	private $admin;
	private $active;

	function __construct()
	{

	}

	public function set_id($id)
	{
		$this->id = $id;
	}

	public function set_username($username)
	{
		parent::set_username($username);
	}
	
	public function set_email($email)
	{
		parent::set_email($email);
	}

	public function set_first_name($first_name)
	{
		parent::set_first_name($first_name);
	}

	public function set_last_name($last_name)
	{
		parent::set_last_name($last_name);
	}

	public function set_password($password)
	{
		parent::set_password($password);
	}

	public function set_admin($admin = 0)
	{
		$this->admin = $admin;
	}

	public function set_active($active = 1)
	{
		$this->active = $active;
	}

	public function get_id()
	{
		return $this->id;
	}

	public function get_username()
	{
		return parent::get_username();
	}
	
	public function get_email()
	{
		return parent::get_email();
	}

	public function get_first_name()
	{
		return parent::get_first_name();
	}

	public function get_last_name()
	{
		return parent::get_last_name();
	}

	public function get_password()
	{
		return parent::get_password();
	}

	public function get_admin()
	{
		return $this->admin;
	}

	public function get_active()
	{
		return $this->active;
	}

	public function __toString()
	{
		$str = ' id : ' . $this->get_id();
		$str .= ' username : ' . $this->get_username();
		$str .= ' email : ' . $this->get_email();
		$str .= ' password : ' . $this->get_password();
		$str .= ' first_name : ' . $this->get_first_name();
		$str .= ' last_name : ' . $this->get_last_name();
		$str .= ' admin : ' . $this->get_admin();
		$str .= ' active : ' . $this->get_active();
		return $str;
	}

	public function __toArray()
	{
		return array(
			'id' => $this->get_id(),
			'username' => $this->get_username(),
			'email' => $this->get_email(),
			'password' => $this->get_password(),
			'first_name' => $this->get_first_name(),
			'last_name' => $this->get_last_name(),
			'admin' => $this->get_admin(),
			'active' => $this->get_active(),
		);
	}
}
