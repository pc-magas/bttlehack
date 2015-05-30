<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monument_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	/**
	 * Fetch monuments whithin a  specified region
	 * @param $lon The Longitude froom GPS
	 * @param $lan The gps latitude
	 */
	function fetch_by_location($lon,$lat)
	{
		$lon=floatval($lon);
		$lat=floatval($lat);
		
		$lon1=$lon-LONGITUDE_THRESHOLD;
		$lat1=$lat-LATITUDE_THRESHOLD;
		$lon2=$lon+LONGITUDE_THRESHOLD;
		$lat2=$lat+LATITUDE_THRESHOLD;
		
		$q=$this->db->select("`id`,`latitude`,`longitude`,`title`,`meta`,`avatar`")
				->from('`monument`')
				->where("(`latitude` BETWEEN ".$lat1." AND ".$lat2.")")
				->where("(`longitude` BETWEEN ".$lon1." AND ".$lon2.")");
				
		return	$q->get()->result_array();
	}
}
