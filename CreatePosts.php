<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "m461h459", "botu4We3", "m461h459");

if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
}

$username = $_POST['name'];
$message = $_POST['new'];

$query ="INSERT INTO Posts (author_id, content) VALUES ('{$username}', '{$message}')";
$userVerification = "SELECT * FROM Users WHERE user_id='{$username}'";
$removePost = "DELETE FROM Posts WHERE author_id='{$username}'";
if($result = $mysqli->query($userVerification)){
	if($result->fetch_assoc()["user_id"] == $username) {
		if (!($message == '') and $mysqli->query($query) === TRUE) {
        		echo "Message Posted";
		} else {
	        	echo "Field was left blank";
		}
	} else {
		echo "Invalid Username";
		$mysqli->query($removePost);
	}
}
$mysqli->close();

?>
