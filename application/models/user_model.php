<?php
class User_model extends MY_Model{

	function __construct(){
		parent::__construct();
		$this->_table_name     = "user_tbl";
		$this->_primary_key    = "user_id"; 
        $this->_primary_filter = "intval";
		$this->_order_by       = "user_id"; 
	}

	public function get_new()
    {
		$user = new stdClass();
        $user->user_id      = '';
        $user->first_name   = '';
        $user->last_name    = '';
        $user->address      = '';
        $user->email        = '';
        $user->phone_number = '';
		return $user;

    }
}
?>