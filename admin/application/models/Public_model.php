<?php

class Public_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    
	public function getCity($CityId = NULL){
		
		$this->db->where('root',0);
		
		if ($CityId != NULL && intval($CityId) > 0) 
			$this->db->where('id',$CityId);
		
		$query = $this->db->get('zip');
		$result = $query->result_array();
		
		if (isset($result) && ! empty($result)) {
			if ($CityId != NULL && intval($CityId) > 0) {
				$objCity = $result[0];
				return $objCity;
			}
			return $result;
		}
		return false;
	}
	public function getArea($CityId = 1){
	
		$this->db->where('root !=',0);
		$this->db->where('root',$CityId);
		$query = $this->db->get('zip');
		$result = $query->result_array();
		if (isset($result) && ! empty($result)) {
			return $result;
		}
		return false;
	}
    
}