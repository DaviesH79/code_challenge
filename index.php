<!DOCTYPE HTML>
<html>
<title>JHA Record Keeper</title>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</head>
<body>
<h1>Welcome to the JHA Record Keeper</h1>
<br></br>
<form id="addanalysis" action="/api.php" method="post">
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
				<input type="text" id="analyst" name="analyst"><br>
			</td>			
			<td>
				<label for="dt">Date</label><br>
				<input type="date" id="dt" name="dt" required><br>
			</td>			
		</tr>
	</table>
	<table id="table2" cellpadding="5px" cellspacing="5px">
		<tr>
			<td>
				<label for="step">Step</label><br>
				<input type="text" id="step" name="step" required><br>
			</td>			
			<td>
				<label for="step_desc">Description of Step</label><br>
				<textarea rows="1" cols="50" id="step_desc" name="step_desc"></textarea>
			</td>	
		</tr>
	</table>
	<table id="table3" cellpadding="5px" cellspacing="5px">
		<tr>
			<td>
				<label for="hazard_type">Hazard Type</label><br>
				<input type="text" id="hazard_type" name="hazard_type"><br>
			</td>			
			<td>
				<label for="hazard_description">Hazard Description</label><br>
				<textarea rows="1" cols="50" id="hazard_description" name="hazard_description"></textarea>
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
	<!--the submit is a get but a post doesn't have a QS params-->
	<!--button type="submit" formmethod="post">Submit</button-->
	<input type="submit" name="submit" value="Submit" class="submit"/>
</form>
<script type="text/javascript">
	//function submitForm() {
	//	document.getElementById("addanalysis").submit();
	//}
	$("#addanalysis").submit(function(e) {

  	  e.preventDefault(); // avoid to execute the actual submit of the form.

    	var form = $(this);
    	var url = form.attr('action');
   
			console.log(form.serialize()); 
  	  $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               //alert(data); // show response from the php script.
							alert('Your report has been submitted');
           }
         });
	});
</script>
<br>
<form id="gethazards" action="/api.php/job" method="get">
	<h2>Retrieve Job Hazard Analysis Here</h2>
	<table id="table2" class="center" cellpadding="5px" cellspacing="5px">
				<label for="jobhazard">Enter Job Title for Hazards</label><br>
				<input type="text" id="title" name="title" class="center"><br>
	</table><br>
	<input type="submit" name="submit" class="submit"/>
</form>
<script type="text/javascript">
	$("#gethazards").submit(function(e) {

  	  e.preventDefault(); // avoid to execute the actual submit of the form.

    	var form = $(this);
    	var url = form.attr('action');
   
  	  $.ajax({
           type: "GET",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               //alert(data); // show response from the php script.
							$("#searchResults").html(data);
           }
         });
	});
</script>
<div id="searchResults">
<h2></h2>
</div>
</body>
</html>
