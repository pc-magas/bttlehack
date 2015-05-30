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
		$id=1;//$this->input->post('id');//$this->input->post('id');
		
		if(!empty($nonce))
		{
			//Here we get somehow the id
			$this->donation_model->donate_to($id,$nonce);
			$this->loaf->view('json_view.php',array('status'=>1));
		}
		elseif(!empty($id))
		{
			$token=$this->donation_model->donate_to($id);
			///$this->load->view('development_form.php',array('client_token'=>$data['token']));
			$this->load->view('json_view.php',array('status'=>1,'data'=>$token));
		}
	}
}