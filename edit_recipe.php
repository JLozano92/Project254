<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Recipe - Recipe Manager</title>
</head>
<body>
	<h2>Edit Recipe</h2>
	<?php

	include 'msql_config.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$id = $conn->real_escape_string($_POST['id']);
    	$title = $conn->real_escape_string($_POST['title']);
    	$description = $conn->real_escape_string($_POST['description']);
    	$ingredients = $conn->real_escape_string($_POST['ingredients']);
    	$instructions = $conn->real_escape_string($_POST['instructions']);

    	$query = "UPDATE recipes SET title='$title', description='$description', ingredients='$ingredients', instructions='$instructions' WHERE id='$id'";
    	$result = $conn->query($query);

    	if ($result) {
        	echo "Recipe updated successfully.";
			header("Location: dashboard.html?success=Recipe edited successfully");
    	} else {
        	echo "Error updating recipe.";
    	}
	} else {
    	$recipe_title = $_GET['title'];
    	$query = "SELECT * FROM recipes WHERE title='$recipe_title'";
    	$result = $conn->query($query);

    	if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();
        	$title = $row["title"];
			$id=$row["id"];
        	$description = $row["description"];
        	$ingredients = $row["ingredients"];
        	$instructions = $row["instructions"];
    	?>
    	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        	<input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
			
        	<label for="title">Title:</label><br>
			<input type="text" id="id" name="id" value="<?php echo $id; ?>" required><br><br>
        	<input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br><br>
			

        	<label for="description">Description:</label><br>
        	<textarea id="description" name="description" rows="4" cols="50"><?php echo $description; ?></textarea><br><br>
       	 
        	<label for="ingredients">Ingredients:</label><br>
        	<textarea id="ingredients" name="ingredients" rows="4" cols="50"><?php echo $ingredients; ?></textarea><br><br>
       	 
        	<label for="instructions">Instructions:</label><br>
        	<textarea id="instructions" name="instructions" rows="4" cols="50"><?php echo $instructions; ?></textarea><br><br>
       	 
        	<input type="submit" value="Update Recipe">
    	</form>
    	<?php
    		} else {
        	echo "Recipe not found.";
    			}
		}
	?>
</body>
</html>
