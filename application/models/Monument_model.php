<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonumentModel extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
	/**
	 * Fetch monuments whithin a  specified region
	 * @param $
	 */
	function get_monuments($lon,$lat)
	{
		$long1=floatval($long1)-LONGITUDE_THRESHOLD;
		$lat1=floatval($lat1)-LATITUDE_THRESHOLD;
		$long2=floatval($long2)+LONGITUDE_THRESHOLD;
		$lat2=floatval($lat2)+LATITUDE_THRESHOLD;
		
		$this->db->select("`id`,`latitude`,`longitude`,`title`,`meta`")
				->from('`monuments`')
				->where("(`latitude` BETWEEN ".min($lat2,$lat1)." AND ".max($lat2,$lat1).")")
				->where("(`longitude` BETWEEN ".min($lon2,$lon1)." AND ".max($lon2,$lon1).")");
		
	}
}
