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
		echo "Noonce";
		var_dump($nonce);
		if(!empty($nonce) && !empty($id))
		{
			$data['token']=$this->donation_model->donate_to($id,$nonce);
			echo $data['token'];
		}
		elseif(!emppty($id))
		{
			echo "Here";
			$data['token']=$this->donation_model->donate_to($id);
			$this->load->view('development_form.php',array('client_token'=>$data['token']));
		}
	}
}