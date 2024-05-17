<?php

include 'msql_config.php';


$query = "SELECT * FROM recipes";
$result = $conn->query($query);

if ($result->num_rows > 0) {

	while ($row = $result->fetch_assoc()) {
		echo "<div>";
    	echo "<h4>" . $row["title"] . "</h4>";
    	echo "<p>" . $row["description"] . "</p>";
		echo "<p>" . $row["ingredients"] . "</p>";
		echo "<p>" . $row["instructions"] . "</p>";
    	echo "</div>";
	}
} else {
	echo "No recipes found";
}
?>
