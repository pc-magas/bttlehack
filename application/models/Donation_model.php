<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH.'third_party/vendor/braintree/braintree_php/lib/Braintree.php');
class Donation_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		

	}
	
	function donate_to($id,$payment_nonce)
	{
		
		Braintree_Configuration::environment('sandbox');
		Braintree_Configuration::merchantId('zx48kk39ysdqgr22');
		Braintree_Configuration::publicKey('bxjcny7pt2cq2jtb');
		Braintree_Configuration::privateKey('8dcaa4201c8115f4c6714d9c699e8e55');
		
		$clientToken = Braintree_ClientToken::generate(array("customerId" => $payment_nonce));
		var_dump($id,$payment_nonce);
		return $clientToken;
		
	}
}