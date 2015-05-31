<?php
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
