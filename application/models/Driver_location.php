<?php
/*
** Admin model
** Model to save/update/delete driviers
*/
include_once('Abstract_model.php');

class Driver_location extends Abstract_model {

	protected $table_name = "";
	function __construct() 
	{
		parent::__construct();
		$this->table_name = "driver_location";
	}


}

?>