<?php
include("connection.php");

//Защита от вредоносных символов
function protect($var){
	$var = trim($var);
	$var = strip_tags($var);
	$var = mysql_escape_string($var);
	return $var;
}

//Добавление сообщения
if(isset($_POST['name']) && !empty($_POST['name'])){
	$name = protect($_POST['name']);
	$msg = protect($_POST['msg']);

	//Кто добавил?
	$sql = "select * from users where name = '$name'";
	$query = mysqli_query($base, $sql);
	$row = mysqli_fetch_array( $query, MYSQLI_ASSOC);
	
	$id = $row['id_user'];
	$date = date("Y-m-d H:i:s");
	$sql = "insert into messages(id_user, message, d_time) values('$id', '$msg','$date')";
	mysqli_query($base, $sql);
	
}
/*
    маршрут,
    протяженность,
    сложность,
    максимальный набор высоты
?>