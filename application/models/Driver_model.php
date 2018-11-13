<?php
/*
** Admin model
** Model to save/update/delete driviers
*/
include_once('Abstract_model.php');

class Driver_model extends Abstract_model {

	protected $table_name = "";
	function __construct() 
	{
		parent::__construct();
		$this->table_name = "drivers";
	}

	public function authenciate($email,$password )
	{

		$this->db->select();
		$this->db->from($this->table_name);
		$this->db->where('d_email',$email);
		$this->db->where('d_password',$password);
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