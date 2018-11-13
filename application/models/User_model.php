<?php
/*
** Admin model
** Model to save/update/delete/authenciate Admin Users
*/
include_once('Abstract_model.php');

class User_model extends Abstract_model {

	protected $table_name = "";
	function __construct() 
	{
		parent::__construct();
		$this->table_name = "users";
	}


	public function authenciate($email,$password )
	{

		$this->db->select();
		$this->db->from($this->table_name);
		$this->db->where('u_email',$email);
		$this->db->where('u_password',$password);
		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}

}

?>