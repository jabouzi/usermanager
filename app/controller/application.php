<?php

class Application extends Controller
{
	private $usermodel;
	private $mailerdecorator;
	const EDIT = 1;
	const ADD = 0;

	function __construct()
	{
		if (!islogged()) redirect('login');
		$this->usermodel = new usermodel();
		$this->mailerdecorator = new mailerdecorator();
	}

	public function index($message = null)
	{
		$users = new useriterator($this->usermodel->get_users());
		$data['title'] = lang('title.accounts');
		view::load_view('default/standard/header', $data);
		view::load_view('default/standard/menu');
		if (!isadmin())
		{
			$this->profile();
		}
		else if ($users)
		{
			$data['users'] = $users;
			$data['bool'] = array('/public/img/icn_alert_error.png','/public/img/icn_alert_success.png');
			view::load_view('default/accounts/userslist', $data);
		}
		else
		{
			view::load_view('default/index/welcome');
		}
		view::load_view('default/standard/footer');
	}
	
	public function profile()
	{
		$user = $this->usermodel->get_user($_SESSION['user']['email']);
		$data['user'] = $user;
		$data['title'] = lang('title.profile');
		view::load_view('default/standard/header', $data);
		view::load_view('default/standard/menu');
		view::load_view('default/accounts/profile', $data);
		view::load_view('default/standard/footer');
		unset($_SESSION['request']);
	}

	public function add()
	{
		$data['title'] = lang('title.add.account');
		view::load_view('default/standard/header', $data);
		view::load_view('default/standard/menu');
		view::load_view('default/accounts/add');
		view::load_view('default/standard/footer');
		unset($_SESSION['request']);
	}

	public function edit($user_name)
	{
		if ($_SESSION['user']['username'] == $user_name) 
		{
			redirect('application/profile');
		}
		$user = $this->usermodel->get_user($user_name);
		if (!$user->get_id())
		{
			redirect('application/add');
		}
		$data['user'] = $user;
		$_SESSION['user_edit'] = $user->__toArray();
		$data['title'] = lang('title.edit.account');
		view::load_view('default/standard/header', $data);
		view::load_view('default/standard/menu');
		view::load_view('default/accounts/edit', $data);
		view::load_view('default/standard/footer');
		unset($_SESSION['request']);
	}

	public function delete()
	{
		if ($_SESSION['user_edit']['username'] != $_POST['username'])
		{
			$_SESSION['message'] = lang('account.security.detected');
			redirect('application/edit/'.$_SESSION['user_edit']['username']);
		}
		$this->usermodel->delete_user($_POST['username']);
		$_SESSION['message'] = lang('account.user.delete');
		redirect('/');
	}

	public function processadd()
	{
		if ($this->usermodel->email_exists($_POST['email']))
		{
			$_SESSION['request'] = $_POST;
			$_SESSION['message'] = lang('account.email.exists');
			redirect('application/add');
		}
		else if ($this->usermodel->username_exists($_POST['username']))
		{
			$_SESSION['request'] = $_POST;
			$_SESSION['message'] = lang('account.user.name.exists');
			redirect('application/add');
		}
		else
		{
			$this->usermodel->add_user($_POST);
			$this->sendemail($_POST, self::ADD);
			$_SESSION['message'] = lang('account.user.added');
			redirect('/');
		}
	}

	public function processedit()
	{
		if ($_SESSION['user_edit']['id'] != $_POST['id'])
		{
			$_SESSION['message'] = lang('account.security.detected');
			redirect('application/edit/'.$_SESSION['user_edit']['username']);
		}
		else if ($_SESSION['user_edit']['username'] != $_POST['username'])
		{
			$_SESSION['message'] = lang('account.security.detected');
			redirect('application/edit/'.$_SESSION['user_edit']['username']);
		}
		else if ($this->usermodel->email_exists($_POST['email'], $_POST['id']))
		{
			$_SESSION['request'] = $_POST;
			$_SESSION['message'] = lang('account.email.exists');
			redirect('application/edit/'.$_POST['username']);
		}
		else
		{
			if (count(compare_user_data($_POST, $_SESSION['user_edit'])))
			{
				$this->usermodel->update_user($_POST);
				$user = $this->usermodel->get_user($_POST['username'])->__toArray();
				$this->sendemail($user, self::EDIT);
				$_SESSION['message'] = lang('account.user.updated');
			}
			redirect('application/edit/'.$_POST['username']);
		}
	}
	
	public function processprofile()
	{
		if ($_SESSION['user']['id'] != $_POST['id'])
		{
			$_SESSION['message'] = lang('account.security.detected');
			redirect('application/profile');
		}
		else if ($_SESSION['user']['username'] != $_POST['username'])
		{
			$_SESSION['message'] = lang('account.security.detected');
			redirect('application/profile');
		}
		else if ($this->usermodel->email_exists($_POST['email'], $_POST['id']))
		{
			$_SESSION['request'] = $_POST;
			$_SESSION['message'] = lang('account.email.exists');
			redirect('application/profile');
		}
		else
		{
			$_POST['admin'] = $_SESSION['user']['admin'];
			$_POST['active'] = $_SESSION['user']['active'];
			$this->usermodel->update_user($_POST);
			$_SESSION['user'] = $this->usermodel->get_user($_POST['email'])->__toArray();
			$_SESSION['message'] = lang('account.user.updated');
			redirect('application/profile');
		}
	}

	public function import()
	{
		$data['title'] = lang('title.import.accounts');
		view::load_view('default/standard/header', $data);
		view::load_view('default/standard/menu');
		view::load_view('default/accounts/import');
		view::load_view('default/standard/footer');
	}

	public function processimport()
	{
		$path = $_FILES['accountsfile']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		if ($_FILES["accountsfile"]["error"] != UPLOAD_ERR_OK)
		{
			$_SESSION['message'] = lang('account.error.fileupload');
			redirect('application/import');
		}
		else if (!in_array($ext, array('csv', 'xml', 'json', 'xls', 'xlsx')))
		{
			$_SESSION['message'] = lang('account.wrong.filetype');
			redirect('application/import');
		}
		else
		{
			$tmp_name = $_FILES["accountsfile"]["tmp_name"];
			$name = time().$_FILES["accountsfile"]["name"];
			move_uploaded_file($tmp_name, "/tmp/$name");
			$import = Userimportfactory::create($ext);
			$users = $import->import("/tmp/$name");
			if (count($users))
			{
				foreach($users as $user)
				{
					$this->sendemail($user, self::ADD);
				}
			}
			redirect('application');
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
