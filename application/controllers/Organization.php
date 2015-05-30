<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization  extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('organization_model');
	}
	
	function fetch_all()
	{
		$data=$this->organization_model->fetch_all();
		$this->load->view('json_view.php',array('status'=>1,'data'=>$data));	
	}
	
}
