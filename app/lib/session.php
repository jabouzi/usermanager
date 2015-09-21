<?php

class Session {
    
    private $db;

    public function _open($save_path, $session_name)
    {
        $this->db = Database::getInstance();
        return true;
    }

    public function _close()
    {
        $this->db->close();
    }

    public function _read($session_id)
    {
        $args = array(':session_id' => $session_id);
        $query = "SELECT user_data FROM sessions WHERE session_id = :session_id";
		$result = $this->db->query($query, $args);
		if (count($result))
		{
			return unserialize($result[0]['user_data']);
		}
		
		return array();
    }

    public function _write($session_id, $user_data)
    {
		$this->_clean(ini_get("session.gc_maxlifetime"));
		if (!$this->session_exists($session_id))
		{
			$args = array(':session_id' => $session_id,
					':ip_address' => ip_address(),
					':user_agent' => user_agent(),
					':last_activity' => time(),
					':user_data' => serialize($user_data));
			$query = "REPLACE INTO sessions (session_id, ip_address, user_agent, last_activity, user_data) VALUES (:session_id, :ip_address, :user_agent, :last_activity, :user_data)";
		}
		else
		{
			$args = array(':session_id' => $session_id,
					':user_data' => serialize($user_data));
			$query = "UPDATE sessions SET user_data = :user_data WHERE session_id = :session_id";
		}

		return $this->db->query($query, $args);
		
    }

    public function _destroy($session_id) {
        $args = array(':session_id' => $session_id);
        $query = "DELETE FROM sessions WHERE session_id = :session_id";
        return $this->db->query($query, $args);
    }

    public function _clean($max)
    {
        $old = time() - $max;
		$args = array(':old' => $old);
        $query = "DELETE FROM sessions  WHERE last_activity < :old";
        $res = $this->db->query($query, $args);
        return $res;
    }
    
    private function session_exists($session_id)
    {
		$args = array(':session_id' => $session_id);
        $query = "SELECT * FROM sessions WHERE session_id = :session_id";
        $res = $this->db->query($query, $args);
        return $res;
	}
}
