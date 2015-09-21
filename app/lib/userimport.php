<?php

class Userimport
{
	private $usemodel;
	private $message;

	function __construct()
	{
		$this->usermodel = new usermodel();
	}

	public function import($usersdata)
	{
		$users = array();
		$this->set_message('');
		foreach($usersdata as $key => $userdata)
		{
			$error = $this->insert($userdata, $key);
			if (!$error) $users[] = $userdata;
		}
		return $users;
	}

	public function insert($userdata, $key)
	{
		$params = array('username', 'password', 'first_name', 'last_name', 'email');
		$errors_count = 0;
		foreach ($params as $param)
		{
			$errors_count += $this->checkitem($userdata, $param, $key);
		}

		if ($this->usermodel->username_exists($userdata['username']))
		{
			$errors_count++;
			$this->set_message('user :'.$userdata['name'].' '.lang('account.user.name.exists').'<br />');
		}
		if ($this->usermodel->email_exists($userdata['email']))
		{
			$errors_count++;
			$this->set_message('user :'.$userdata['email'].' '.lang('account.email.exists').'<br />');
		}

		if (!$errors_count)
		{
			$this->set_message('user :'.$userdata['username'].' '.lang('account.user.added').'<br />');
			$this->usermodel->add_user($userdata);
		}
		
		return $errors_count;
	}
	
	public function set_message($message)
	{
		$this->message .= $message;
	}
	
	public function get_message()
	{
		return $this->message;
	}

	private function checkitem($userdata, $param, $key)
	{
		if (get_item($userdata, $param) && !isempty($userdata[$param]))	return 0;
		$this->set_message(sprintf(lang('account.param.empty'), $param).'<br />');
		return 1;
	}
}
