<?php
if (isset($_POST['Name']) & isset($_POST['Password']) & isset($_POST['Confirm_Password'])) {
	if ($_POST['Password'] != $_POST['Confirm_Password']) {
		echo "Pasword and Confirm Password are not matched";
	} else {
		require_once "1_connection_to_db.php";
		$Password = $_POST['Password'];
		$Name = $_POST['Name'];
		$query = "UPDATE registration SET `Password`='$Password' WHERE `Name` = '$Name'";
		if ($connect->query($query) == true)
            echo "fsvfsvs";
		$result = mysqli_query($conn, $query);
		//redirect to log in page 
		header('Location:2_login.html');
	}
} 
else if(!empty($_POST['Name']))
	echo "Something went wrong";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Reset Password</title>
</head>

<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div>
			<center>
				<h2>Reset your Password</h2>
				<input type="text" name="Name" placeholder="Your Name" required><br><br>
				<input type="password" name="Password" placeholder="New Password" required><br><br>
				<input type="password" name="Confirm_Password" placeholder="Confirm New Password" required><br><br>
				<input type="submit" name="submit">
			</center>
		</div>
	</form>
</body>

</html>