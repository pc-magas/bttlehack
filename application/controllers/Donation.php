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
		$oid=$this->input->post('oid');
		$mid=$this->input->post('mid');
		if(!empty($nonce))
		{
			//Here we get somehow the id
			$this->donation_model->donate_to($oid,$mid,$nonce);
			$this->load->view('json_view.php',array('status'=>1));
		}
		elseif(!empty($oid)&&!empty($mid))
		{
			$token=$this->donation_model->donate_to($oid,$mid);
			//$this->load->view('development_form.php',array('client_token'=>$token));
			$this->load->view('json_view.php',array('status'=>1,'data'=>$token));
		}
	}
}