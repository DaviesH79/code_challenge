<?php

class Request {

	public function checkRequest(){
		// check if request came from formpost or server API call
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
			return true;	
		}
		return false;
	}

	public function parseRequest(){
		$set = [];
		$set['title'] = $_POST['title'];	
		$set['location'] = $_POST['location'];	
		$set['analyst'] = $_POST['analyst'];	
		$set['dt'] = $_POST['dt'];	
		$set['step'] = $_POST['step'];	
		$set['step_desc'] = $_POST['step_desc'];	
		$set['hazard_type'] = $_POST['hazard_type'];	
		$set['hazard_description'] = $_POST['hazard_description'];	
		$set['controls'] = $_POST['controls'];	
		$set['comments'] = $_POST['comments'];
		return $set;	
	}
	
	public function parseQueryString(){
			$qs = $_SERVER['QUERY_STRING']; 
			parse_str($qs, $result);
			//var_dump($result);
			return $result;
	}
}
$request = new Request();
