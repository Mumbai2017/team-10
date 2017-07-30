<?php
	session_start();
	if(!isset($_SESSION['role']))
	{
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="css/teacher.css">
	</head>
	<body>
		<div class="header">
			<div class="side_bar_btn">
				<span>&#9776</span>
			</div>
		</div>
		<div class="jumbotron">
			<div class="container">
				<div class="section_header">
					<h2>Submit Your Unit Plan...</h2>
				</div>
				<hr>
				<div class="form_container">
					<form>
						<div class="form-group">
					    	<label for="unit_name">Unit Name</label>
					    	<input type="text" class="form-control" id="unit_name" name="unit_name">
					  	</div>
					  	<div class="form-group">
					    	<label for="theme_unit">Theme Unit</label>
					    	<input type="text" class="form-control" id="theme_unit" name="theme_unit">
					  	</div>
					  	<div class="form-group">
					    	<label for="lesson_1">Lesson no</label>
					    	<input type="text" class="form-control" id="lesson-no-1" name="lesson_1">
					  	</div>
					  	<div class="form-group">
					    	<label for="lesson_2">Lesson no</label>
					    	<input type="text" class="form-control" id="lesson-no-2" name="lesson_2">
					  	</div>
					  	<div class="form-group">
					    	<label for="lesson_3">Lesson no</label>
					    	<input type="text" class="form-control" id="lesson-no-3" name="lesson_3">
					  	</div>
					  	<div style="text-align: center; margin-top: 30px">
					  		<button type="submit" class="btn btn-default btn-success" style="width: 120px">Submit</button>
					  	</div>
					</form>
				</div>
			</div>
		</div>
		<div class="side_bar">
			<div style="width: 100%; height: 20px; line-height: 20px; padding: 20px; text-align: right" class="hide_side_bar">
				<span style="color: black">X</span>
			</div>
			<div class="side_bar_opt">
				<a href="/unit_plan.php">Submit User Plan</a>
			</div>
			<div class="side_bar_opt">
				<a href="/lesson_plan.php">Submit Lesson Plan</a>
			</div>
			<div class="side_bar_opt">
				<a href="/update_learning.php">Update Learning Plan</a>
			</div>
			<div class="side_bar_opt">
				<a href="/logout.php">Logout</a>
			</div>
		</div>
		<!-- scripts -->
		<script
	    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	    integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
	    crossorigin="anonymous"></script>
	    <script src="js/teacher.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>