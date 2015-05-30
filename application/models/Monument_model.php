<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monument_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
	/**
	 * Fetch monuments whithin a  specified region
	 * @param $lon The Longitude froom GPS
	 * @param $lan The gps latitude
	 */
	function fetch_by_location($lon,$lat)
	{
		$long1=floatval($long1)-LONGITUDE_THRESHOLD;
		$lat1=floatval($lat1)-LATITUDE_THRESHOLD;
		$long2=floatval($long2)+LONGITUDE_THRESHOLD;
		$lat2=floatval($lat2)+LATITUDE_THRESHOLD;
		
		$q=$this->db->select("`id`,`latitude`,`longitude`,`title`,`meta`,`avatar`")
				->from('`monuments`')
				->where("(`latitude` BETWEEN ".$lat1." AND ".$lat2.")")
				->where("(`longitude` BETWEEN ".$lon1." AND ".$lon2.")");
				
		return	$q->get()->result_array();
	}
}
