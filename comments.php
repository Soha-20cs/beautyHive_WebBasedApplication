	<?php
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'look');

$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$comments = $_POST['comments'];

$query = "insert into comments(username,email,mobile,comments) values ('$username','$email','$mobile','$comments')";

mysqli_query($con, $query);

// Add an alert message and delay the redirect
echo "<script>alert('We will come to you shortly!');window.location.href = 'home.php';</script>";
?>