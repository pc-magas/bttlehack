<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$response=array();

if(isset($status)) $response['status']=$status;
if(isset($message))$response['message']=$message;
if(isset($data))$response['data']=$data;


$this->output
    ->set_content_type('application/json')
	->set_output(json_encode($response));