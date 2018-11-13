<?php
/*
** Admin model
** Model to save/update/delete driviers
*/
include_once('Abstract_model.php');

class Delivery_model extends Abstract_model {

	protected $table_name = "";
	function __construct() 
	{
		parent::__construct();
		$this->table_name = "deliveries";
	}

	public function get_deliveries($status='')
	{
		$this->db->select("*");
		$this->db->from("deliveries");
		$this->db->join("drivers","drivers.d_id = deliveries.dvl_driver_id");
		$this->db->join("users","users.u_id = deliveries.dvl_user_id");
		$this->db->order_by("dvl_created_at","DESC");
		if(!empty($status))
		{
			$this->db->where("dvl_status",$status);
		}
		$query = $this->db->get();
        return $query->result_array();
	}

	public function get_delivery($id)
	{
		$this->db->select("*");
		$this->db->from("deliveries");
		$this->db->join("drivers","drivers.d_id = deliveries.dvl_driver_id");
		$this->db->join("users","users.u_id = deliveries.dvl_user_id");
		$this->db->where("deliveries.dvl_id",$id);
		$this->db->order_by("dvl_created_at","DESC");
		$query = $this->db->get();
        return $query->row();
	}



}

?>