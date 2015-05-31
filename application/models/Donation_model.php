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
include(APPPATH.'third_party/vendor/braintree/braintree_php/lib/Braintree.php');
class Donation_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * Function that does the donnations
	 */
	function donate_to($id,$org_id,$payment_nonce=null)
	{
		$ci=&get_instance();
		$ci->load->model('organization_model');
		$data=$ci->organization_model->fetch_organization_by_id($id);
		$data=$data[0];

		Braintree_Configuration::environment('sandbox');
		Braintree_Configuration::merchantId($data['merchand_id']);
		Braintree_Configuration::publicKey($data['public_key']);
		Braintree_Configuration::privateKey($data['private_key']);
		
		if(empty($payment_nonce))
		{
			$clientToken = Braintree_ClientToken::generate();
			return $clientToken;
		}
		else 
		{
			Braintree_Transaction::sale(array(
				'amount'=>"$1.00",
				'paymentMethodNonce'=>$payment_nonce
			));
			
			$this->db->trans_start();
			$this->db->set('monnument_id',$id);
			$this->db->set('organization_id',$org_id);
			$this->db->insert('`donation`');
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return false;
			}
			else 
			{
				$this->db->trans_commit();
				return true;
			}
		}
	}
	/**
	 * Counts how many donations we have for an organization donated
	 */	
	function count_donations($id)
	{
		$this->db->select('SUM(`id`) as `donations`')->from('`donation`')->where('organization_id',$id);
		$data=$this->db->get()->result_array();
		return $data;
	}
}