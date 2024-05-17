<?php
include 'msql_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);

	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = $conn->query($query);

	if ($result) {
    	if ($result->num_rows == 1) {
        	session_start();
        	$_SESSION['username'] = $username;
        	header("Location: dashboard.html");
        	exit();
    	} else {
        	header("Location: login.html?error=Invalid credentials");
        	exit();
    	}
	} else {
    	header("Location: login.html?error=Error executing query");
    	exit();
	}
} else {
	header("Location: login.html");
	exit();
}
?>
