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

class Organization_model  extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function fetch_all()
	{
		$q=$this->db->select('*')->from('organization')->order_by('title');
		$data=$q->get()->result_array();
		return $data; 
	}
	
	function fetch_organization_by_id($id)
	{
		$q=$this->db->select('*')->from('organization')->where('`id`',$id)->order_by('title');
		$data=$q->get()->result_array();
		return $data;
	}
}
