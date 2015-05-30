<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model  extends CI_Model
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
