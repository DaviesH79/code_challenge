<?php
/**
Code taken from
https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/
Edited as needed by Holly Davies
**/ 
include 'request.php';

class Api extends Request {

public function api(){
$method = $_SERVER['REQUEST_METHOD'];
$table = 'job1';

// Check if this is a POST from the APP or API
//if($this->checkRequest()){
//	$input = $this->parseQueryString();
//	//$input = $this->createJob($queryArray);
//	$table = 'job1';
//	$method = 'POST';
//	//print_r("got here");
if (isset($_POST['submit'])){
	$input = $this->parseRequest();
} else {

// todo create logic for a GET from the web app AND from the API
// get the HTTP method, path and body of the request
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
// this gets the body of the request
$input = json_decode(file_get_contents('php://input'),true);
		if (empty($input) && ($method == 'PUT' || $method == 'POST' )){
			print_r("Your request body is not valid json");
  		http_response_code(400);
		}
// retrieve the table from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request)+0;
}
 
// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'admin123', 'recordkeeper');
mysqli_set_charset($link,'utf8');
 
// escape the columns and values from the input object
$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
$values = array_map(function ($value) use ($link) {
  if ($value===null) return null;
  return mysqli_real_escape_string($link,(string)$value);
},array_values($input));
 
// build the SET part of the SQL command
$set = '';
for ($i=0;$i<count($columns);$i++) {
  $set.=($i>0?',':'').'`'.$columns[$i].'`=';
  $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
}
var_dump($set);

// create SQL based on HTTP method
switch ($method) {
  case 'GET':
    $sql = "select * from `$table`".($key?" WHERE id=$key":';'); break;
  case 'PUT':
    $sql = "update `$table` set $set where id=$key"; break;
  case 'POST':
    $sql = "insert into `$table` set $set;"; break;
  case 'DELETE':
    $sql = "delete from `$table` where id=$key"; break;
}
var_dump($sql);

// excecute SQL statement
$result = mysqli_query($link,$sql);
var_dump($result);
 
// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error());
}
 
// print results, insert id or affected row count
if ($method == 'GET') {
  if (!$key) echo '[';
  for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
  }
  if (!$key) echo ']';
} elseif ($method == 'POST') {
  echo mysqli_insert_id($link);
} else {
  echo mysqli_affected_rows($link);
}
 
// close mysql connection
mysqli_close($link);
}
}
$api = new Api();
$api->api();

?>
