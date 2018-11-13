<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Users Controller	
	 * Controll All Public Users
	 */
	public function __construct()
	{
		parent::__construct();
		$this->layout = 'admin/dashboard';
		$this->load->helper("basic");
		$this->load->model('User_model','users');
		if(!admin_role())
		{
			redirect(base_url("authentication/error_404"));
		}
		
	}

	public function index()
	{
		$where['u_status'] = 1;
		$where['u_role'] = 'user';
		
		$data['users'] = $this->users->get_where('',$where,true,"u_id");
		$this->load->view("admin/user/view",$data);
	}

	public function add($id='')
	{
		if(empty($id))
		{
			$this->load->view("admin/user/add");
		}
		else
		{
			$data['user'] = $this->users->get_row('u_id',$id);
			$this->load->view("admin/user/add",$data);
		}
		
	}

	public function submitUser($value='')
	{
		$data =  array(
			"u_fullname"=> $this->input->post("name"),
			"u_email"=> $this->input->post("email"),
			"u_phone"=> $this->input->post("number"),
			"u_address"=> $this->input->post("addr"),
			"u_city"=> $this->input->post("city"),
			"u_country"=> $this->input->post("country"),
			"u_postal_code"=> $this->input->post("postalCode"),
			"u_role"=> "user"
		);
		$qb_add_customer = $this->quick_books->add_customer($data);
		if ($qb_add_customer['error'] == false) {
			$data['user_qb_id'] = $qb_add_customer['msg'];
			$success = $this->users->save($data);
		
			if($success)
			{
				$msg = " User Added";
				$this->session->set_flashdata('success',$msg);
				if($this->input->post('redirect_path') !== "")
				{
					$path = $this->input->post('redirect_path');
					redirect($path);
				}
				else
				{
					redirect('users/');
				}
				
			}
		}
		else
		{
			$msg = " User Not Added ";
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("users/add"));
		}
	}

	public function updateUser($value='')
	{

		$data =  array(
			"u_fullname"=> $this->input->post("name"),
			"u_email"=> $this->input->post("email"),
			"u_phone"=> $this->input->post("number"),
			"u_address"=> $this->input->post("addr"),
			"u_city"=> $this->input->post("city"),
			"u_country"=> $this->input->post("country"),
			"u_postal_code"=> $this->input->post("postalCode"),
		);
		$data['user_qb_id'] = $this->input->post("user_qb_id");
		$qb_update_customer = $this->quick_books->update_customer($data);
		if ($qb_update_customer['error'] == false) 
		{
			$id = $this->input->post("user_id");
			unset($data['user_qb_id']);
			$success = $this->users->update_by('u_id', $id, $data);
		
			if($success)
			{
				$msg = " User Updated";
				$this->session->set_flashdata('success',$msg);
				redirect('users/');
			}
		}
		else
		{
			$msg = $qb_update_customer['msg'];
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("users/"));
		}
	}

	public function delete($id)
	{
		$where['u_id'] = $id;
		$customer = $this->users->get_where ("*",$where,false);

		$qb_inactive_customer = $this->quick_books->inactive_customer($customer->user_qb_id);

		if ($qb_inactive_customer['error'] == false) 
		{
			$success = $this->users->delete_by('u_id', $id);
			if($success)
			{
				$msg = " User Deleted";
				$this->session->set_flashdata('success',$msg);
				redirect('users/');
			}
		}
		else
		{
			$msg = $qb_update_customer['msg'];
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("users/"));
		}
	}

}
?>