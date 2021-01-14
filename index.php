<html>
<title>JHA Record Keeper</title>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</head>
<body>
<h1>Welcome to the JHA Record Keeper</h1>
<br></br>
<form id="addanalysis" action="/api.php">
	<h2>Enter Your Job Hazard Analysis Form Here</h2>
	<table id="table1" cellpadding="5px" cellspacing="5px">
		<tr>
			<td>
				<label for="title">Job Title</label><br>
				<input type="text" id="title" name="title"><br>
			</td>			
			<td>
				<label for="location">Location</label><br>
				<input type="text" id="location" name="location"><br>
			</td>			
			<td>
				<label for="analyst">Analyst</label><br>
				<input type="text" id="anaylst" name="anaylst"><br>
			</td>			
			<td>
				<label for="date">Date</label><br>
				<input type="text" id="date" name="date"><br>
			</td>			
		</tr>
	</table>
	<table id="table2" cellpadding="5px" cellspacing="5px">
		<tr>
			<td>
				<label for="step">Step</label><br>
				<input type="text" id="step" name="step"><br>
			</td>			
			<td>
				<label for="desc">Description of Step</label><br>
				<textarea rows="1" cols="50" name="desc"></textarea>
			</td>	
		</tr>
	</table>
	<table id="table3" cellpadding="5px" cellspacing="5px">
		<tr>
			<td>
				<label for="hazards">Potential Hazards</label><br>
				<input type="text" id="hazards" name="hazards"><br>
			</td>			
			<td>
				<label for="controls">Controls</label><br>
				<input type="text" id="controls" name="controls"><br>
			</td>			
		</tr>
	</table>
	<table id="table4" cellpadding="5px" cellspacing="5px">
		<tr>
			<td>
				<label for="comments">Comments</label><br>
				<textarea rows="1" cols="100" name="comments"></textarea>
			</td>	
		</tr>
	</table>
</form>
<br>
<form>
	<h2>Retrieve Job Hazard Analysis Here</h2>
	<table id="table5" cellpadding="5px" cellspacing="5px">
		<tr>
			<td>
				<label for="jobhazard">Enter Job Title for Hazards</label><br>
				<input type="text" id="jobhazard" name="jobhazard"><br>
			</td>			
		</tr>
	</table>
</form>
</body>
</html>
