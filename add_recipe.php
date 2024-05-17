<?php

include 'msql_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$title = $conn->real_escape_string($_POST['title']);
	$description = $conn->real_escape_string($_POST['description']);
	$ingredients = $conn->real_escape_string($_POST['ingredients']);
	$instructions = $conn->real_escape_string($_POST['instructions']);

	$query = "INSERT INTO recipes (title, description, ingredients, instructions) VALUES ('$title', '$description', '$ingredients', '$instructions')";
	$result = $conn->query($query);

	if ($result) {
    	header("Location: dashboard.html?success=Recipe added successfully");
    	exit();
	} else {
    	header("Location: dashboard.html?error=Error adding recipe");
    	exit();
	}
} else {
	header("Location: dashboard.html");
	exit();
}
?>

