<?php

class Login extends Controller
{
	private $user;
	private $usermodel;

	function __construct()
	{
		$this->user = new userdata();
		$this->usermodel = new usermodel();
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
		$password = substr(str_shuffle(strtolower(sha1(rand() . time() . $this->user->get_email()))),0, 8);
		$this->user->set_password($password);
		$this->user->update_user($this->user->__toArray());
		$this->sendemail();
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
	
	private function set_user_session($user)
	{
		$_SESSION['user'] = $this->user->__toArray();
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
