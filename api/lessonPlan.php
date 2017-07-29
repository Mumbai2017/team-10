<?php
include("config.php");

$unit_id = mysqli_real_escape_string($db,$_POST['unit_id']);
$purpose = mysqli_real_escape_string($db,$_POST['']);
$material = mysqli_real_escape_string($db,$_POST['']);
$objective = mysqli_real_escape_string($db,$_POST['']);









$sql = "INSERT INTO user_learnDet_count (unit_id,user_id,purpose,material,objective)
VALUES ($lp_id,$unit_id,$user_id,$purpose,$material,$objective )";


?>