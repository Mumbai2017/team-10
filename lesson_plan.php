<?php

//echo "Here";
session_start();
if(!isset($_SESSION['role']))
{
	
    header('location:login.php');
}
//echo "skipped";
if(isset($_POST['save'])) {
		include("config.php");
		$user_id = $_SESSION['user_id'];
		$l_name = $_POST['l_name'];
		$s_activity = $_POST['s_activity'];
		$obj=$_POST['obj'];
		$resource=$_POST['resource'];

		$sql = "INSERT INTO learning_plan (user_id,name,starter_activity,objective,material) VALUES ('$user_id','$l_name','$s_activity','$obj','$resource')";

		if(mysqli_query($db, $sql)){
		    //echo "Records inserted successfully.";
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
		}
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
					<h2>Submit Your Lesson Plan...</h2>
				</div>
				<hr>
				<div class="form_container">
					<form method="POST">
						<div class="form-group">
					    	<label>Lesson Name</label>
					    	<input type="text" class="form-control" id="lesson_name" name="l_name">
					  	</div>
					  	<div class="form-group">
					    	<label>Starter Activity</label>
					    	<input type="text" class="form-control" id="s_activity" name="s_activity">
					  	</div>
					  	<div class="form-group">
					    	<label>Objective</label>
					    	<input type="text" class="form-control" id="obj" name="obj">
					  	</div>
					  	<div class="form-group">
					    	<label>Resource</label>
					    	<input type="text" class="form-control" id="resource" name="resource">
					  	</div>
					  	<div type="hidden" name="is_submit" value=1></div>
					  	<div style="text-align: center; margin-top: 30px">
					  		<button type="submit" class="btn btn-default btn-success" style="width: 120px" name="save">Submit</button>
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
				<a href="/profile.php">Teacher Profile</a>
			</div>
			<div class="side_bar_opt">
				<a href="/quick_start.php">Upload Video</a>
			</div>
			<div class="side_bar_opt">
				<a href="/unit_plan.php">Submit User Plan</a>
			</div>
			<div class="side_bar_opt">
				<a href="/lesson_plan.php">Submit Lesson Plan</a>
			</div>
			<div class="side_bar_opt">
				<a href="/get_feedback.php">Update Learning Plan</a>
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