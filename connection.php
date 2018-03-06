<?php
	$base = mysqli_connect('localhost','root','1234admin','Chat_database');
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
		exit();
	}
    
    session_start();
?>