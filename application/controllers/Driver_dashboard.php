<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_dashboard extends CI_Controller {

	/**
	 * Dashboard Controller	
	 * Controll All Dashboard Things
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("basic");
		$this->load->model('Delivery_model','deliveries');
		$this->load->model('Driver_location','location');
		$this->layout = 'driver/dashboard';
		$this->load->library("PhpMailerLib");
		// $this->load->model('Admin_model','admins');
		
	}


	public function index()
	{
		$this->layout = 'driver/dashboard';
		$this->load->view("driver/dashboard");
	}

	public function view_deliveries()
	{
		
		$data['deliveries'] = $this->deliveries->get_deliveries(0);
		$this->load->view('driver/delivery/view',$data);
		
	}

	public function view_detail($id)
	{
		
		$data['delivery'] = $this->deliveries->get_delivery($id);
		// print_r($data);
		// exit();
		$this->load->view('driver/delivery/view_info',$data);
	}


	public function start_ride($id)
	{
		$data['delivery'] = $this->deliveries->get_delivery($id);
		$delivery = $data['delivery'];
		$this->layout = "";

		 $this->send_mail($delivery);
		$this->load->view('driver/delivery/start_ride',$data);

	}


	public function update_location()
	{
		$data = array("lat"=>$_POST['lat'],'lng'=>$_POST['lng']);
		$where['delivery_id'] = $_POST['dvl_id'];

		$check = $this->location->get_where("*",$where);
		if(!empty($check))
		{
			$this->location->update_by_where($data, $where);
		}
		else
		{
			$data['delivery_id'] =$_POST['dvl_id'];
			$this->location->save($data);
		}

		$msg = "location Updated";
		$response['message'] = $msg;
		echo json_encode($response);
		exit;
		

	}

	public function send_mail($data)
	{
		$lat = $data->dvl_drop_lat;
		$lng = $data->dvl_drop_long;
		$id = $data->dvl_id;
		$path = base_url("driver_dashboard/enquire_location/").$id."/".$lat."/".$lng;
		
		echo $path;
		// exit();
		
		$mail = $this->phpmailerlib->start_ride($data);
		if (!$mail) {

			echo $mail->ErrorInfo;
		}
		else
		{
			echo "done";
		}
		// exit();
	}


	public function enquire_location($id,$lat,$lng)
	{
		$data['lat'] = $lat;
		$data['lng'] = $lng;
		$data['id'] = $id;
		$this->layout = "";
		$this->load->view('driver/delivery/enquire',$data);
	}


	public function get_driver_location()
	{
		$id = $_POST['id'];
		$where['delivery_id'] = $id;
		$check = $this->location->get_where("*",$where,false);
		echo json_encode($check);
		exit;
	}




}
?>