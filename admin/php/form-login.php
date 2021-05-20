<?php
	session_start();
	include 'connectMySQL.php';

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			
			header('Location:../index.html');
		}
		else{
			$sql = "select * from user where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				header('Location:../index.html');
				// echo "<script type='text/javascript'>alert('dang nhap khong thanh cong');</script>";
			}else{
				$_SESSION['username'] = $username;
				header('Location:../dashboard.html');
			}
		}
	}	
	$conn->close();

 ?>