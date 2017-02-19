<?php

class Application extends Controller
{
	private $usermodel;
	private $mailerdecorator;
	const EDIT = 1;
	const ADD = 0;

	function __construct()
	{
		$this->usermodel = new usermodel();
		$this->mailerdecorator = new mailerdecorator();
	}

	public function password($email)
	{
		$this->user = $this->usermodel->get_user($email);
		$this->email_empty();
		$this->check_user();
		$password = substr(str_shuffle(strtolower(sha1(rand() . time() . $this->user->get_email()))),0, 8);
		$this->user->set_password($password);
		echo json_encode($user->__toArray());
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

	public function add($username, $password, $email, $first_name, $last_name, $admin, $active)
	{
		if ($this->usermodel->email_exists($email))
		{
			echo json_encode(array('error' => lang('account.email.exists')));
			redirect('application/add');
		}
		else if ($this->usermodel->username_exists($_POST['username']))
		{
			echo json_encode(array('error' => lang('account.user.name.exists')));
		}
		else
		{
			$user = array(
				'username' => $username,
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

	public function edit($id, $username, $password, $email, $first_name, $last_name, $admin, $active)
	{
		if ($this->usermodel->email_exists($email))
		{
			echo json_encode(array('error' => lang('account.email.exists')));
		}
		else
		{
			$user = array(
				'username' => $username,
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
