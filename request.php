<?php

class Request {

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
	
	public function checkRequest(){

		$method = $_SERVER['REQUEST_METHOD'];
		$qs = $_SERVER['QUERY_STRING']; 
		var_dump($qs);
		
		if ($method == 'GET' && !empty($qs)){
			return true;		
		}	
		return false;
	}

	public function parseQueryString(){
			$qs = $_SERVER['QUERY_STRING']; 
			parse_str($qs, $result);
			//var_dump($result);
			return $result;
	}

	public function createJob($result){
		$job = array_slice($result, 0, 4);
		$comments = array_slice($result, 8);
		$job = array_merge($job, $comments);
		var_dump($job);
		return $job;
	}
	
	public function createTask($result){
		$task = array_slice($result, 0, 4);
		$comments = array_slice($result, 8);
		$job = array_merge($job, $comments);
		var_dump($job);
		return $job;
	}

	public function createHazard($result){
		$job = array_slice($result, 0, 4);
		$comments = array_slice($result, 8);
		$job = array_merge($job, $comments);
		var_dump($job);
		return $job;
	}
	
	public function createControl($result){
		$job = array_slice($result, 0, 4);
		$comments = array_slice($result, 8);
		$job = array_merge($job, $comments);
		var_dump($job);
		return $job;
	}
}
$request = new Request();
