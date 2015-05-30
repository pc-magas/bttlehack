<?php
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
