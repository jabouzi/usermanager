<?php

class Xlsimportadapter
{
	private $userimport;

	function __construct()
	{
		require_once APPPATH.'app/lib/php-excel/excel_reader2.php';
	}

	public function import($file)
	{
		try {
			$users = array();
			$params = array(1 => 'username', 'password', 'first_name', 'last_name', 'email', 'admin', 'active');
			$excel = new Spreadsheet_Excel_Reader($file);
			$rows = $excel->rowcount($sheet_index=0);
			$cols = $excel->colcount($sheet_index=0);
			for($row = 2; $row <= $rows; $row++)
			{
				for($col = 1; $col <= $cols; $col++)
				{
					$users[$row][$params[$col]] = $excel->val($row,$col);
				}
			}
			$this->userimport = new userimport();
			$users = $this->userimport->import($users);
			$_SESSION['message'] = $this->userimport->get_message();
			return $users;
		} catch (Exception $e) {
			display_page_error();
		}
	}
}
