<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/**
	 * Authentication Controller	
	 * Admin Login
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','users');
		$this->load->model('Driver_model','driver');
	}


	public function index()
	{
		$this->load->view('admin/login');
	}

	public function driver()
	{
		$this->load->view('driver/login');
	}

	public function auth()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$result = $this->users->authenciate($email,$password);
		if($result)
		{
			$data =  array(
				'fullname' => $result->u_fullname,
				'user_id' => $result->u_id,
				'user_email' =>$result->u_email,
				'role'=>$result->u_role
			);

			$this->session->set_userdata($data);
			redirect(base_url('admin_dashboard'));
		}

		else
		{
			$msg = "Incorrect Email And Password";
			$this->session->set_flashdata('error',$msg);
			redirect('authentication/');
		}
	}

	public function driver_auth()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$result = $this->driver->authenciate($email,$password);
		if($result)
		{
			$data =  array(
				'drivername' => $result->d_name,
				'driverId' => $result->u_id,
				'driverImage'=>$result->d_image
			);

			$this->session->set_userdata($data);
			redirect(base_url('driver_dashboard'));
		}

		else
		{
			$msg = "Incorrect Email And Password";
			$this->session->set_flashdata('error',$msg);
			redirect('authentication/driver');
		}
	}

	public function driver_logout()
	{
		$this->session->unset_userdata(array('drivername' => '', 'driverId' => '', 'driverImage' => ''));
		$this->session->set_flashdata('error', 'You are successfuly logged out.');
		$this->session->sess_destroy();
		redirect(base_url('authentication/driver'));
	}

	public function logout(){
		$this->session->unset_userdata(array('fullname' => '', 'user_id' => '', 'user_email' => ''));
		$this->session->set_flashdata('error', 'You are successfuly logged out.');
		$this->session->sess_destroy();
		redirect(base_url('authentication/'));
	}


	public function error_404()
	{
		$this->load->view('404');
	}
}
