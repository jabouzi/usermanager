<?php

class Api extends Controller
{
	private $usermodel;
	private $mailerdecorator;
	private $encrypt;
	private $user;
	const EDIT = 1;
	const ADD = 0;

	function __construct()
	{
		$this->user = new userdata();
		$this->usermodel = new usermodel();
		$this->mailerdecorator = new mailerdecorator();
		$this->encrypt = new encryption();
	}
	
	public function index()
	{
		echo 'Usermanager api';
	}

	public function password($email)
	{
		$this->user = $this->usermodel->get_user($email);
		$this->email_empty($email);
		$this->check_user($email);
		$password = substr(str_shuffle(strtolower(sha1(rand() . time() . $this->user->get_email()))),0, 8);
		$this->user->set_password($password);
		echo json_encode($this->user->__toArray());
	}
	
	public function profile($email)
	{
		$user = $this->usermodel->get_user($email);
		echo json_encode($user->__toArray());
	}

	public function delete($username)
	{
		$this->usermodel->delete_user($username);
		echo json_encode(array('success' => lang('account.user.delete')));
	}

	public function add($email, $password, $first_name, $last_name)
	{
		if ($this->usermodel->email_exists($email))
		{
			echo json_encode(array('error' => lang('account.email.exists')));
		}
		else if ($this->usermodel->username_exists($email))
		{
			echo json_encode(array('error' => lang('account.user.name.exists')));
		}
		else
		{
			$user = array(
				'username' => $email,
				'password' => $this->encrypt->encrypt($password),
				'email' => $email,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'admin' => 0,
				'active' => 1
			);
			$this->usermodel->add_user($user);
			echo json_encode(array('success' => lang('account.user.added')));
		}
	}

	public function edit($email, $password, $first_name, $last_name)
	{
		if (!$this->usermodel->email_exists($email))
		{
			echo json_encode(array('error' => lang('login.account.not.exists')));
		}
		else
		{
			$user = array(
				'username' => $email,
				'password' => $this->encrypt->encrypt($password),
				'email' => $email,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'admin' => 0,
				'active' => 1
			);

			if (count(compare_user_data($user, $this->usermodel->get_user($email)->__toArray())))
			{
				$this->usermodel->update_user($user);
				$user = $this->usermodel->get_user($user['username'])->__toArray();
				echo json_encode(array('success' => lang('account.user.updated')));
			}
		}
	}
	
	public function login($email, $password)
	{
		if (!$this->username_empty($email)) return;
		else if (!$this->password_empty($password)) return;
		else if (!$this->check_login($email, $password)) return;
		else { 
			echo json_encode(array('success' => lang('login.login'))); 
		}
	}
	
	public function logout()
	{
		echo json_encode(array('success' => lang('login.logout')));
	}

	private function check_login($email, $password)
	{
		$this->user = $this->usermodel->get_user($email);
		else if (!$this->user_inexistant()) return;
		else if (!$this->user_inactive()) return;
		else if (!$this->user_worg_password($password)) return;
		else return 1;
	}
	
	private function check_user($email)
	{
		$this->user = $this->usermodel->get_user($email);
		$this->user_inexistant();
		$this->user_inactive();
	}
	
	private function user_inexistant()
	{
		if (!$this->user->get_id())
		{
			echo json_encode(array('error' => lang('login.account.not.exists')));
			return 0;
		}
		return 1;
	}
	
	private function user_inactive()
	{
		if (!$this->user->get_active())
		{
			echo json_encode(array('error' => lang('login.account.nonactive')));
			return 0;
		}
		return 1;
	}
	
	private function user_worg_password($password)
	{
		if ($this->user->get_password() != $password)
		{
			echo json_encode(array('error' => lang('login.failed')));
			return 0;
		}
		return 1;
	}
	
	private function username_empty($email)
	{
		if (isempty($email)) 
		{
			echo json_encode(array('error' => lang('login.email.empty')));
			return 0;
		}
		return 1;
	}
	
	private function email_empty($email)
	{
		if (isempty($email)) 
		{
			echo json_encode(array('error' => lang('login.email.empty')));
			return 0;
		}
		return 1;
	}
	
	private function password_empty($password)
	{
		if (isempty($password))
		{
			echo json_encode(array('error' => lang('login.password.empt')));
			return 0;
		}
		return 1;
	}
	
	private function sendemail($user, $edit = 0)
	{
		$maildata = array();
		if ($edit) $messagedata = array($user['first_name'], $user['last_name'], $user['email'], $user['password']);
		else $messagedata = array($user['first_name'], $user['last_name'], 'http://'.$_SERVER['HTTP_HOST'],  $user['email'], $user['password']);
		$maildata['from'] = 'admin@tonikgroupimage.com';
		$maildata['name'] = 'TGI';
		$maildata['to'] = $user['email'];
		$maildata['subject'] = lang('account.email.subject');
		$maildata['first_name'] = $user['first_name'];
		$maildata['last_name'] = $user['last_name'];
		$lang = get_site_lang();
		$text = array(APPPATH."public/docs/{$lang}/useremail.txt", APPPATH."public/docs/{$lang}/useremail2.txt");
		$this->mailerdecorator->decorate($messagedata, file_get_contents($text[$edit]));
		$this->mailerdecorator->sendmail($maildata);
	}
}
