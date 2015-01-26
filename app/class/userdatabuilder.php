<?php

class Userdatabuilder
{
	protected $user = NULL;
	protected $user_data = array();

	public function __construct($user_data)
	{
		$this->user_data = $user_data;
	}

	public function build()
	{
		$this->user = new Userdata();
		$this->user->set_user_name($this->user_data['user_name']);
		$this->user->set_user_password($this->user_data['user_password']);
		$this->user->set_user_email($this->user_data['user_email']);
		$this->user->set_user_first_name($this->user_data['user_first_name']);
		$this->user->set_user_last_name($this->user_data['user_last_name']);
		$this->user->set_user_active($this->user_data['user_active']);
	}

	public function getUser()
	{
		return $this->user;
	}
}
