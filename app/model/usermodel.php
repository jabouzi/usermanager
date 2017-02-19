<?php

class Usermodel extends Model
{
	private $userdata;
	private $userdatadao;
	private $cache;
	private $log;

	public function __construct()
	{
		parent::__construct();
		$this->userdata = new userdata();
		$this->userdatadao = new userdatadao();
		$this->cache = new cachefactory();
		$this->log = Phplog::getInstance();
	}

	public function add_user($userdata)
	{
		if (!isset($userdata['admin'])) $userdata['admin'] = 0;
		if (!isset($userdata['active'])) $userdata['active'] = 0;
		$builder = new userdatabuilder($userdata);
		$builder->build();
		$user = $builder->getUser();
		$this->userdatadao->insert_user($user);
		$this->cache->delete('select_data_'.$userdata['username']);
		$this->cache->delete('select_data_all');
		$this->log->save('ADD USER', $userdata);
	}

	public function update_user($userdata)
	{
		if (!isset($userdata['admin'])) $userdata['admin'] = 0;
		if (!isset($userdata['active'])) $userdata['active'] = 0;
		$builder = new userdatabuilder($userdata);
		$builder->build();
		$user = $builder->getUser();
		$this->userdatadao->update_user($user);
		$this->cache->delete('select_data_'.$userdata['username']);
		$this->cache->delete('select_data_all');
		$this->log->save('UPDATE USER', $userdata);
	}
	
	public function delete_user($user_name)
	{
		$this->userdatadao->delete_user($user_name);
		$this->cache->delete('select_data_'.$user_name);
		$this->cache->delete('select_data_all');
		$this->log->save('DELETE USER', $user_name);
	}

	public function get_user($user_name)
	{
		if ($this->cache->get('select_data_'.$user_name)) return $this->cache->get('select_data_'.$user_name);
		$result = $this->userdatadao->select_user($user_name);
		$builder = new userdatabuilder($result);
		$builder->build();
		$user = $builder->getUser();
		$this->cache->save('select_data_'.$user_name, $user);
		return $user;
	}

	public function get_users()
	{
		if ($this->cache->get('select_data_all')) return $this->cache->get('select_data_all');
		$users = array();
		$results = $this->userdatadao->select_all();
		foreach($results as $result)
		{
			$builder = new userdatabuilder($result);
			$builder->build();
			$users[] = $builder->getUser();
		}
		$this->cache->save('select_data_all', $users);
		return $users;
	}

	public function email_exists($email, $id = 0)
	{
		$and = '';
		$args = array(
			':email' => $email
		);
		
		$sql_id = '';
		if ($id)
		{
			$sql_id = ' AND id != :id ';
			$args[':id'] = $id;
		}
		$query = "SELECT count(*) as count FROM user_data WHERE email = :email {$sql_id}";
		$count = $this->db->query($query, $args);
		return intval($count[0]['count']);
	}

	public function username_exists($user_name)
	{
		$args = array(
			':username' => $user_name
		);
		$query = "SELECT count(*) as count FROM user_data WHERE username = :username";
		$count = $this->db->query($query, $args);
		return intval($count[0]['count']);
	}
	
	public function geolocation($latitude, $longitude)
	{
		$args = array(':latitude' => $latitude, ':longitude' => $longitude);
		$query = "INSERT INTO geolocation (id, latitude, longitude) VALUES('', :latitude, :longitude)";
		$insert = $this->db->query($query, $args);
	}
}
