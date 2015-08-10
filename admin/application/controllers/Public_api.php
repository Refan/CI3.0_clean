<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_api extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function AJAX_AREA() {      //地址ajax
		
		$get = $this->input->get();
		if ($get["city"]) {			
			$this->load->model("public_model");
			if ($arrAreaData = $this->public_model->getArea($get["city"])) {
				
				$arr = array(
					"code" => 0,
					"data" => json_encode($arrAreaData), 
					"reason" => "success"
				);
				
				echo json_encode($arr);
			}
		}else{
			return;
		}
    }
}
