<?php
	$base = mysqli_connect('localhost','','','Chat_database');
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
		exit();
	}

    session_start();
?>
