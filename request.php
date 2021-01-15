<?php

class Request {
	
	public function checkRequest(){

		$method = $_SERVER['REQUEST_METHOD'];
		$qs = $_SERVER['QUERY_STRING']; 
		
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
