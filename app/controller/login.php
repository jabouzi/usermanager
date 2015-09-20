<?php

class Login extends Controller
{
	private $user;
	private $adminmodel;

	function __construct()
	{
		$this->user = new useradmin();
		$this->adminmodel = new adminmodel();
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
		$this->email_empty();
		$this->check_user();
		$this->sendemail();
	}

	public function logout()
	{
		foreach($_SESSION as $key => $value) unset($_SESSION[$key]);
		redirect('login');
	}

	private function check_login()
	{
		$this->user = $this->adminmodel->get_user($_POST['email']);
		$this->user_inexistant();
		$this->user_inactive();
		$this->user_worg_password();
		$this->set_user_session();
	}
	
	private function check_user()
	{
		$this->user = $this->adminmodel->get_user($_POST['email']);
		$this->user_inexistant();
		$this->user_inactive();
	}
	
	private function user_inexistant()
	{
		if (!$this->user)
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
	
	private function set_user_session($user)
	{
		$_SESSION['user']['first_name'] = $this->user->get_first_name();
		$_SESSION['user']['last_name'] = $this->user->get_last_name();
		$_SESSION['user']['email'] = $this->user->get_email();
		$_SESSION['user']['admin'] = $this->user->get_admin();
		$_SESSION['user']['active'] = $this->user->get_active();
		$_SESSION['user']['id'] = $this->user->get_id();
		redirect('application');
	}
	
	private function sendemail($edit = 0)
	{
		$lang = get_site_lang();
		$text = APPPATH."public/docs/{$lang}/useremail3.txt";
		$this->mailerdecorator->decorateuser($this->user, file_get_contents($text));
		$this->mailerdecorator->sendusermail($this->user);
	}
}
