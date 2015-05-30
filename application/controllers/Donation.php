<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donation extends CI_Controller
{
	function __construct()
	{	
    	parent::__construct();
		$this->load->model('donation_model');
	}
	
	function donate_to()
	{
		$data=null;
		$nonce=$this->input->post('payment_method_nonce');
		$id=12;//$this->input->post('id');
		if($nonce!==false && $id!==false)
		{
			$data['token']=$this->donation_model->donate_to($id,$nonce);
			echo $data['token'];
		}
	}
}