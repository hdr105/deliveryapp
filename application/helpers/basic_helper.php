<?php


function admin_role(){

	$CI = &get_instance();

	$user = $CI->session->userdata("role");
	if($user == 'admin')
	{
		return true;
	}
	else
	{
		return false;
	}
}


function is_driver(){


	$CI =& get_instance();
    if ($CI->session->has_userdata('drivername')) {
        return true;
    }
    return false;
}

function getDeliveryLocation($id)
{
	 $CI =& get_instance();
	 $CI->load->model('Delivery_model');
	 $location = $CI->Delivery_model->get_row('dvl_id',$id); 
	 return $location;
}

 ?>