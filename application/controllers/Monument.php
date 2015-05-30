<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monument extends CI_Controller
{
	function __construct()
	{
		$this->load->model('Monument_model');

	}
	
	function fetch_by_location()
	{
		$this->monument_model->fetch_by_location();
	}
}
