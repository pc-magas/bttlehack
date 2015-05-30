<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization  extends CI_Controller
{
	function __construct()
	{
		parent::construct();
		$this->load->database();
	}
	
	function fetch_all()
	{
		
	}
	
}
