<?php

class Xmlimportadapter
{
	private $userimport;

	function __construct()
	{

	}

	public function import($file)
	{
		$racine = simplexml_load_file($file);
		$index = 0;
		foreach ($racine->info as $usr_info) 
		{
			if (count((array)$usr_info) == 7)
			{
				$users[$index] = (array)$usr_info;
				$index++;
			}
		}
		$this->userimport = new userimport();
		$users = $this->userimport->import($users);
		$_SESSION['message'] = $this->userimport->get_message();
		return $users;
	}
}
