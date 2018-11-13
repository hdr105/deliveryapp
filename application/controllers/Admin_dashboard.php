<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

	/**
	 * Dashboard Controller	
	 * Controll All Dashboard Things
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("basic");
		$this->load->model('Delivery_model','deliveries');
		
	}

	public function index()
	{
		$this->layout = 'admin/dashboard';
		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}
		$data['complete_deliveries'] = $this->deliveries->get_deliveries(1);
		$data['incomplete_deliveries'] = $this->deliveries->get_deliveries(0);
		$this->load->view("admin/dashboard",$data);
	}
}
?>