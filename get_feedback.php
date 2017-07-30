<?php

//echo "Here";
include("config.php");
session_start();
if(!isset($_SESSION['role']))
{
	
    header('location:login.php');
}
//echo "skipped";
$u_id = $_SESSION["user_id"];
$sql = "SELECT user_id,lp_id,feedback FROM feedback WHERE user_id='$u_id'";
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
					<h2>See Feedback For You..</h2>
				</div>
				<hr>
				<div class="form_container">
					<?php
						$result = mysqli_query($db,$sql);
						while($row=mysqli_fetch_assoc($result)) {
						    echo '
							<div class="feedback">
								<div>
								Lesson Plan Id : '.$row["lp_id"].	
								'</div>
								<div>
								Feedback : '.$row["feedback"].	
								'</div>
							</div>';
						}		
					?>
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
				<a href="/get_feedback.php">Get feedbacks</a>
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