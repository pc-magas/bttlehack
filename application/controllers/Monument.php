<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monument extends CI_Controller
{
	function __construct()
	{	
    	parent::__construct();
		$this->load->model('monument_model');
	}
	
	/**
	 * Getting monument by geolocation information
	 */
	function fetch_by_location()
	{
		$lon=$this->input->post('lon');//Lontitude
		$lat=$this->input->post('lat');///Latitude
		$id=$this->input->post('id');
		
		$status="";
		$data=null;
		$message=null;
		if($lon!==false && $lat!==false)
		{
			$data=$this->monument_model->fetch_by_location($lon,$lat);
			$status=1;
			$message="";
		}
		else 
		{
			$status=0;
			$message="No location given";
		}
		$this->load->view('json_view.php',array('status'=>$status,'message'=>$message,'data'=>$data));
	}
	
	function fetch_by_id()
	{
		$id=$this->input->post('id');
		
		$status="";
		$data=null;
		$message=null;
		
		if($id!==false)
		{
			$data=$this->monument_model->fetch_by_id($id);
			$status=1;
		}
		else 
		{
			$status=0;
			$message="No location given";
		}
		$this->load->view('json_view.php',array('status'=>$status,'message'=>$message,'data'=>$data));
	}
}
