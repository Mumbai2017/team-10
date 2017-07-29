<?php
include("config.php");
$userid= mysqli_real_escape_string($db,$_POST['userid']);
$lessonno = mysqli_real_escape_string($db,$_POST['lessonno']);

$sql = "INSERT INTO user_learnDet_count (user_id, lessonNo)
VALUES ($userid,$lessonno)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
