<?php
	session_start();
	if(!isset($_SESSION['role']))
	{
		header("location: login.php");
	}

	if(isset($_POST['save'])) {
	//echo "In post";
	include("config.php");
	$feedback = $_POST['feedback'];
	$lp= $_POST['lp'];
	//$subj=$_POST["Subject"];
	/*
	$sql = "select subj_id from subjects where subject=$subj ;

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        $subj_id=row['subj_id'];
	    }

	*/
	$date=date('Y-m-d H:i:s');
	$user_id=$_SESSION['user_id'];

	$sql = "INSERT INTO feedback(dt_time,user_id,lp_id,feedback) values ('$date','$user_id','$lp','$feedback')";

	if(mysqli_query($db, $sql)){
	    //echo "Records inserted successfully.";
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	}
 
	// Close connection
	mysqli_close($db);
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
					<h2>Review a Lesson Plan...</h2>
				</div>
				<hr>
				<div class="form_container" method="POST">
					<form method="POST">
						<!--<div class="form-group">
					    	<label>Lesson Name</label>
					    	<input type="text" class="form-control" id="lesson_name" name="l_name">
					  	</div>-->
					  	<div class="form-group">
					    	<label>Lesson Plan </label>
					    	<input type="text" class="form-control" id="lp" name="lp">
					  	</div>
					  	<div class="form-group">
					    	<label>Feedback</label>
					    	<textarea class="form-control" id="feedback" name="feedback"> </textarea>
					  	</div>

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
				<a href="/profile.php">Comment On Video</a>
			</div>
			<div class="side_bar_opt">
				<a href="/comment_post.php">Comment on post</a>
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