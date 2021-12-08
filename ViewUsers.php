<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "m461h459", "botu4We3", "m461h459");

if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
}

$query ="SELECT * FROM Users";

echo "<h1>Current Users</h1>";

if($result = $mysqli->query($query)) {
	while($row = $result->fetch_assoc()) {
		echo $row["user_id"];
		echo "<br>";
	}
}

$mysqli->close();

?>
