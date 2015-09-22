<?php

class Login extends Controller
{
	private $user;
	private $usermodel;
	private $maildecorator;

	function __construct()
	{
		$this->user = new userdata();
		$this->usermodel = new usermodel();
		$this->mailerdecorator = new mailerdecorator();
	}

	public function index()
	{
		$encrypt = new encryption();
		$data['email'] = get_item($_POST, 'email');
		$data['password'] = get_item($_POST, 'password');
		$data['title'] = lang('title.login');
		view::load_view('default/standard/header', $data);
		view::load_view('default/standard/menu');
		view::load_view('default/login/login', $data);
		view::load_view('default/standard/footer');
	}
	
	public function password()
	{
		$encrypt = new encryption();
		$data['email'] = get_item($_POST, 'email');
		$data['title'] = lang('title.password');
		view::load_view('default/standard/header', $data);
		view::load_view('default/standard/menu');
		view::load_view('default/login/password', $data);
		view::load_view('default/standard/footer');
	}

	public function process()
	{
		$this->username_empty();
		$this->password_empty();
		$this->check_login();
	}
	
	public function processpwd()
	{
		$this->user = $this->usermodel->get_user($_POST['email']);
		$this->email_empty();
		$this->check_user();
		$password = substr(str_shuffle(strtolower(sha1(rand() . time() . $this->user->get_email()))),0, 8);
		$this->user->set_password($password);
		$_SESSION['user'] = $this->user->__toArray();
		$this->usermodel->update_user($_SESSION['user']);
		$this->sendemail($_SESSION['user']);
		unset($_SESSION['user']);
		$_SESSION['message'] = lang('login.password.send');
		redirect('login');
	}

	public function logout()
	{
		foreach($_SESSION as $key => $value) unset($_SESSION[$key]);
		redirect('login');
	}

	private function check_login()
	{
		$this->user = $this->usermodel->get_user($_POST['email']);
		$this->user_inexistant();
		$this->user_inactive();
		$this->user_worg_password();
		$this->set_user_session();
	}
	
	private function check_user()
	{
		$this->user = $this->usermodel->get_user($_POST['email']);
		$this->user_inexistant();
		$this->user_inactive();
	}
	
	private function user_inexistant()
	{
		if (!$this->user->get_id())
		{
			$_SESSION['message'] = lang('login.account.not.exists');
			redirect('login');
		}
	}
	
	private function user_inactive()
	{
		if (!$this->user->get_active())
		{
			$_SESSION['message'] = lang('login.account.nonactive');
			redirect('login');
		}
	}
	
	private function user_worg_password()
	{
		if ($this->user->get_password() != $_POST['password'])
		{
			$_SESSION['message'] = lang('login.failed');
			redirect('login');
		}
	}
	
	private function username_empty()
	{
		if (isempty($_POST['email'])) 
		{
			$_SESSION['message'] = lang('login.email.empty');
			redirect('login');
		}
	}
	
	private function email_empty()
	{
		if (isempty($_POST['email'])) 
		{
			$_SESSION['message'] = lang('login.email.empty');
			redirect('login/password');
		}
	}
	
	private function password_empty()
	{
		if (isempty($_POST['password']))
		{
			$_SESSION['message'] = lang('login.password.empty');
			redirect('login');
		}
	}
	
	private function set_user_session()
	{
		$_SESSION['user'] = $this->user->__toArray();
		redirect('application');
	}
	
	private function sendemail($user, $edit = 0)
	{
		$maildata = array();
		$messagedata = array($user['first_name'], $user['last_name'], $user['email'], $user['password']);
		$maildata['from'] = 'admin@tonikgroupimage.com';
		$maildata['name'] = 'TGI';
		$maildata['to'] = $user->get_email();
		$maildata['subject'] = lang('account.email.subject');
		$maildata['first_name'] = $user['first_name'];
		$maildata['last_name'] = $user['last_name'];
		$lang = get_site_lang();
		$text = APPPATH."public/docs/{$lang}/useremail3.txt";
		$this->mailerdecorator->decorate($messagedata, file_get_contents($text));
		$this->mailerdecorator->sendmail($maildata);
	}
}
