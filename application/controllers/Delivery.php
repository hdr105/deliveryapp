<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {

	/**
	 * Delivery Controller	
	 * Controll All  Deliveries
	 */
	public function __construct()
	{
		parent::__construct();
		$this->layout = 'admin/dashboard';
		$this->load->helper("basic");
		$this->load->model('Delivery_model','deliveries');
		$this->load->model('Driver_model','drivers');
		$this->load->model('User_model','users');
		
	}

	public function index()
	{
		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}
		$data['deliveries'] = $this->deliveries->get_deliveries();
		$this->load->view('admin/delivery/view',$data);
		
	}

	public function add($id='')
	{
		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}
		$data['drivers'] = $this->drivers->get_all('d_status',1, 'd_created_at', 'DESC');
		$where['u_status'] = 1;
		$where['u_role'] = 'user';
		
		$data['users'] = $this->users->get_where('',$where,true,"u_id");

		if(!empty($id))
		{
			$data['deliveri'] = $this->deliveries->get_row('dvl_id',$id);
		}

		$this->load->view('admin/delivery/add',$data);
		
	}


	public function submitDelivery($value='')
	{
		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}

		$data =  array(
			"dvl_user_id"=> $this->input->post("user"),
			"dvl_driver_id"=> $this->input->post("driver"),
			"dvl_width"=> $this->input->post("width"),
			"dvl_weight"=> $this->input->post("weight"),
			"dvl_charges"=> $this->input->post("charges"),
			"dvl_pickup"=> $this->input->post("pickup"),
			"dvl_drop"=> $this->input->post("drop"),
			"dvl_pick_lat"=> $this->input->post("p_lat"),
			"dvl_pick_long"=> $this->input->post("p_long"),
			"dvl_drop_lat"=> $this->input->post("d_lat"),
			"dvl_drop_long"=> $this->input->post("d_long")
		);

		$data['dvl_name'] = "dvl".uniqid();

		$qb_delivery_item = $this->quick_books->add_item($data);

		if ($qb_delivery_item['error'] == false) 
		{
			$data['qb_delivery_id'] = $qb_delivery_item['msg'];
			$this->deliveries->save($data);
			$deliveryId = $this->db->insert_id();
			$delivery = $this->deliveries->get_delivery($deliveryId);

			$data['qb_delivery_id'] = $delivery->qb_delivery_id;
			$data['user_qb_id'] = $delivery->user_qb_id;
			$data['u_email'] = $delivery->u_email;

			$qb_create_invoice = $this->quick_books->create_invoice($data);
			if ($qb_create_invoice['error'] == false) 
			{
				$data['qb_invoice_id'] = $qb_create_invoice['msg'];
				unset($data['qb_delivery_id']);
				unset($data['user_qb_id']);
				unset($data['u_email']);
				$this->deliveries->update_by('dvl_id', $deliveryId, $data);

				$status = TRUE;
			}

		}
		else
		{
			$status = FALSE;
		}

		if($status)
		{
			$msg = " Add Delivery";
			$this->session->set_flashdata('success',$msg);
			redirect(base_url("delivery/"));
		}
		else
		{
			$msg = " Unable To Add Delivery";
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("delivery/add"));
		}

	}


	public function updateDelivery($value='')
	{

		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}

		$d_id = $this->input->post("delivery_id");

		$data =  array(
			"dvl_user_id"=> $this->input->post("user"),
			"dvl_driver_id"=> $this->input->post("driver"),
			"dvl_width"=> $this->input->post("width"),
			"dvl_weight"=> $this->input->post("weight"),
			"dvl_charges"=> $this->input->post("charges"),
			"dvl_pickup"=> $this->input->post("pickup"),
			"dvl_drop"=> $this->input->post("drop"),
			"dvl_pick_lat"=> $this->input->post("p_lat"),
			"dvl_pick_long"=> $this->input->post("p_long"),
			"dvl_drop_lat"=> $this->input->post("d_lat"),
			"dvl_drop_long"=> $this->input->post("d_long")
		);

		$delivery = $this->deliveries->get_delivery($d_id);
		echo "<pre>";


		$data['qb_delivery_id'] = $delivery->qb_delivery_id;
		$data['dvl_name'] = $delivery->dvl_name;
		$qb_delivery_update = $this->quick_books->update_item($data);
		if ($qb_delivery_update['error'] == false) 
		{

			$status = TRUE;
			
			$data['user_qb_id'] = $delivery->user_qb_id;
			$data['u_email'] = $delivery->u_email;
			$data['qb_invoice_id'] = $delivery->qb_invoice_id;
			
			$qb_update_invoice = $this->quick_books->update_invoice($data);
			if ($qb_update_invoice['error'] == false) 
			{
				
				$status = TRUE;
				
				unset($data['qb_delivery_id']);
				unset($data['user_qb_id']);
				unset($data['u_email']);

				$this->deliveries->update_by('dvl_id', $d_id, $data);
			}
		}
		else
		{
			$status = FALSE;
		}

		if($status)
		{
			$msg = " Delivery Update ";
			$this->session->set_flashdata('success',$msg);
			redirect(base_url("delivery/"));
		}
		else
		{
			$msg = " Unable To Update Delivery";
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("delivery/"));
		}


	}

	public function delete($id)
	{
		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}
		$delivery = $this->deliveries->get_delivery($id);

		$qb_inactivate_delivery = $this->quick_books->inactive_item($delivery->qb_delivery_id);
		$qb_delete_invoice = $this->quick_books->delete_invoice($delivery->qb_invoice_id);
		if($qb_inactivate_delivery['error'] == false)
		{
			$status = TRUE;
			if($qb_delete_invoice['error'] == false)
			$status = TRUE;
			$this->deliveries->delete_by('dvl_id', $id);
		}
		else{
			$status = FALSE;
		}
		if($status)
		{
			$msg = " Delivery Deleted";
			$this->session->set_flashdata('success',$msg);
			redirect('delivery/');
		}
		else
		{
			$msg = " Delivery Not Deleted";
			$this->session->set_flashdata('error',$msg);
			redirect('delivery/');
		}
	}


	public function view_detail($id)
	{
		
		$data['delivery'] = $this->deliveries->get_delivery($id);
		// echo "<pre>";
		// print_r($data['delivery']);
		// exit();
		$this->load->view('admin/delivery/view_info',$data);
	}


	public function start_ride($lat,$long)
	{
		$data["lat"] = $lat;
		$data['long'] = $long;
		$this->layout = "";
		$this->load->view('admin/delivery/start_ride',$data);
	}

}
?>