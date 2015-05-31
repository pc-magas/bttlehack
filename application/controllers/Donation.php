<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *         DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
                    Version 2, December 2004 

 Copyright (C) Desyllas Dimitrios 

 Everyone is permitted to copy and distribute verbatim or modified 
 copies of this license document, and changing it is allowed as long 
 as the name is changed. 

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION 

  0. You just DO WHAT THE FUCK YOU WANT TO.
 */
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
		if(!empty($nonce)&&!empty($oid)&&!empty($mid))
		{
			//Here we get somehow the id
			$this->donation_model->donate_to($oid,$mid,$nonce);
			$this->load->view('redirect.php');
		}
		elseif(!empty($oid)&&!empty($mid))
		{
			$token=$this->donation_model->donate_to($oid,$mid);
			//$this->load->view('development_form.php',array('client_token'=>$token));
			$this->load->view('json_view.php',array('status'=>1,'data'=>$token));
		}
	}
	
	function count_donations()
	{
		$data=null;
		$status=0;
		$message=null;
		$id=$this->input->post('id');
		if(isset($id))
		{
			$status=1;
			$data=$this->donation_model->count_donations($id);
		} 
		else
		{
			$message="No organization given";
		}
		
		$this->load->view('json_view.php',array('status'=>1,'data'=>$data,'message'=>$message));
	}
}