<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "m461h459", "botu4We3", "m461h459");

if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$name = $_POST['new'];

$query ="INSERT INTO Users (user_id) VALUES ('{$name}')";

if (!($name == '') and $mysqli->query($query) === TRUE) {
	echo "Name Successfully Saved!";
} else {
	echo "Name already taken or field was left blank.";
}

$mysqli->close();

?>
