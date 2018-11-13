<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

	/**
	 * Drivers Controller	
	 * Driver Related 
	 */
	public function __construct()
	{
		parent::__construct();
		$this->layout = 'admin/dashboard';
		$this->load->helper("basic");
		$this->load->model('Driver_model','drivers');
		$this->load->library('image_lib');

		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}
		
	}

	public function index()
	{
		$data['drivers'] = $this->drivers->get_all('','','d_created_at','DESC');
		$this->load->view("admin/driver/view",$data);
	}

	public function add($id='')
	{
		if(empty($id))
		{
			$this->load->view("admin/driver/add");
		}
		else
		{
			$data['driver'] = $this->drivers->get_row('d_id',$id);
			$this->load->view("admin/driver/add",$data);
		}
		
	}


	public function submitDrivers($value='')
	{
		$profile = "";
		if($_FILES)
		{

			$photo = $this->upload_image();
			$profile = $photo;
			
			
		}
		$data =  array(
			"d_name"=> $this->input->post("name"),
			"d_email"=> $this->input->post("email"),
			"d_password"=> $this->input->post("password"),
			"d_phone"=> $this->input->post("number"),
			"d_cnic"=> $this->input->post("cnic"),
			"d_city"=> $this->input->post("city"),
			"d_country"=> $this->input->post("country"),
			"d_postalCode"=> $this->input->post("postalCode"),
			"d_address"=> $this->input->post("addr"),
			'd_image'=>$profile
		);
		$qb_add = $this->quick_books->add_employee($data);
		if ($qb_add['error'] == false) 
		{
			$data['qb_driver_id'] = $qb_add['msg'];
			$success = $this->drivers->save($data);
			
			if($success)
			{
				$msg = " Driver Added";
				$this->session->set_flashdata('success',$msg);
				if($this->input->post('redirect_path') !== "")
				{
					$path = $this->input->post('redirect_path');
					redirect($path);
				}
				else
				{
					redirect(base_url('drivers/'));
				}
				
			}
		}
		else
		{
			$msg = $qb_add['msg'];
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("drivers/add"));
		}

	}

	public function upload_image() // for uploading profile photo
	{
		$config['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['width'] = 960;
		$config['height'] = 638;
		$config['upload_path'] = './assets/img/drivers/';
		$config['allowed_types'] =  'gif|jpg|png|jpeg|';
		$this->load->library('upload',$config);
		$this->upload->do_upload('image');
		$data = $this->upload->data();
		if($data)
		{
			$img_file = $data['file_name'];
			return $img_file;
		}
	}


	public function updateDrivers($value='')
	{
		$profile = "";
		if($_FILES)
		{

			$photo = $this->upload_image();
			$profile = $photo;
			
			
		}

		$id = $this->input->post("driver_id");
		$prv_img = $this->input->post("driver_image");

		$new_image = $photo?$profile:$prv_img;
		$data =  array(
			"d_name"=> $this->input->post("name"),
			"d_email"=> $this->input->post("email"),
			"d_password"=> $this->input->post("password"),
			"d_phone"=> $this->input->post("number"),
			"d_cnic"=> $this->input->post("cnic"),
			"d_address"=> $this->input->post("addr"),
			"d_city"=> $this->input->post("city"),
			"d_country"=> $this->input->post("country"),
			"d_postalCode"=> $this->input->post("postalCode"),
			'd_image'=>$new_image
		);
		$data['qb_driver_id'] = $this->input->post("qb_driver_id");
		$qb_update = $this->quick_books->update_employee($data);
		if ($qb_update['error'] == false) 
		{
			unset($data['qb_driver_id']);
			$success = $this->drivers->update_by('d_id', $id, $data);
		
			if($success)
			{
				$msg = " Driver Updated";
				$this->session->set_flashdata('success',$msg);
				redirect('drivers/');
			}
		}
		else
		{
			$msg = $qb_add['msg'];
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("drivers/"));

		}
	}


	public function delete($id)
	{
		$where['d_id'] = $id;
		$driver = $this->drivers->get_where ("*",$where,false);
		$qb_inactive_driver = $this->quick_books->inactive_employee($driver->qb_driver_id);

		if ($qb_inactive_driver['error'] == false) 
		{
			$success = $this->drivers->delete_by('d_id', $id);
			if($success)
			{
				$msg = " Driver Deleted";
				$this->session->set_flashdata('success',$msg);
				redirect('drivers/');
			}
		}
		else
		{
			$msg = $qb_inactive_driver['msg'];
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("drivers/"));
		}
	}



}
?>