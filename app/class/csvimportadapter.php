<?php

class Csvimportadapter
{
	private $userimport;

	function __construct()
	{

	}

	public function import($file)
	{
		$row = 0;
		$users = array();
		$params = array('username', 'password', 'first_name', 'last_name', 'email', 'admin', 'active');
		if (($handle = fopen($file, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
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
