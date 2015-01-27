<?php

class Csvimportadapter
{
	private $userimport;

	function __construct()
	{

	}

	public function import($file)
	{
		var_dump($file);
		$row = 0;
		$users = array();
		$params = array('user_name', 'user_password', 'user_first_name', 'user_last_name', 'user_email', 'user_active');
		if (($handle = fopen($file, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				var_dump($data);
				if ($row)
				{
					foreach($params as $key => $value)
					{
						$users[$row][$value] = $data[$key];
					}
				}
				$row++;
			}
			fclose($handle);
			$this->userimport = new userimport();
			$users = $this->userimport->import($users);
			$_SESSION['message'] = $this->userimport->get_message();
			return $users;
		}
	}
}
