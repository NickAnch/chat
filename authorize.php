<?php 
	include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Authorization</title>
	<script src= "js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
		include ("header.php");
		function protect($var){
			$var = trim($var);
			$var = strip_tags($var);
			$var = mysql_escape_string($var);
			return $var;
		}
	
		if(isset($_POST['doAutho'])){
			$name = protect($_POST['name']);
			$pass = protect($_POST['pass']);

			$sql = "select name from users where name = '$name' and password = '$pass' ";
			$query = mysqli_query($base, $sql);
			$row = mysqli_fetch_array( $query, MYSQLI_ASSOC);
            
			if(empty($row['name'])){
				echo '<br><p style = "color: red;text-align: center">*Incorrect login or password</p>';
			}else{
				//echo "<br><p>Вы вошли , переходите в <a href = 'index.php'>чат</a></p>";
                $_SESSION['logged_user'] = $row['name'];
                echo '<script>location.replace("http://chat/index.php");</script>';
			};
		};

	?>
	<div class="authorization">
		<form action="/authorize.php" class="login-form" name="login-form" onsubmit="return valid();" method="post">
		<br>
			<h2>Login to chat</h2>
			<br>
				<input type="text" id="login" name="name" placeholder="Write your login"><br>
				<input type="password" id="pass" name="pass" placeholder="Write your password"><br>
				<a href="registration.php">Registration</a>
				<button type="submit"  class="btn" name="doAutho">Sign in</button>
		</form>
	</div>
</body>
<script>
		
function valid(){
    var validName = false;
    var validPass = false;
    var inpLog = document.getElementById('login');
    var inpPas = document.getElementById('pass');

    if(!inpLog.value){
        alert('You must enter a name!');
        validName = false;
    } else {
        validName = true;
    }
    if(!inpPas.value){
        alert('You must enter a password!');
        validPass = false;
    } else {
        validPass = true;
    }
    if(validName == true && validPass == true){
        return true;
    } else {
        return false;
    }
}
	</script>
</html>
