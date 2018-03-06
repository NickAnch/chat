<?php 
	include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
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
		if(isset($_POST['doRegistr'])){
			$name = protect($_POST['name']);
			$pass = protect($_POST['pass']);
			$country = protect($_POST['country']);
			
			$sql = "select name from users where name = '$name'";
			$query = mysqli_query($base, $sql);
			$row = mysqli_fetch_array( $query, MYSQLI_ASSOC);
			
			if(!empty($row['name'])){
				echo '<br><p style = "color: red;text-align: center">*This name is already in use</p>';
			} else {
				$sql = "insert into users(name, password, country) values('$name', '$pass', '$country')";
				mysqli_query($base, $sql);
				echo "<script>alert(\"You have registered.\");</script>";
			};
		};
	?>
	<div class="container">
        <div class="registration">
            <form action="registration.php" class="reg-form" name="reg-form" onsubmit="return validation();" method="post">
            <br>
                <h2>Registration</h2>
                <br>
                    <input type="text" id="login" name="name" placeholder="Write your login"><br>
                    <input type="password" id="pass" name="pass" placeholder="Write your password"><br>
                    <input type="password" id="pass_rep" name="pass2" placeholder="Confirm password"><br>
                    <input type="text" id="country" name="country" placeholder="Write your country"><br>
                    <a href="authorize.php">Sign up</a>
                    <button type="submit" class="btn" name="doRegistr">Register</button>
                    
            </form>
        </div>
	</div>
</body>
<script>
function validation(){		
    var validName = false;
    var validPass = false;
    var validPassRep = false;
    var validCountry = false;
    var validTwoPass = false;			  
    var inpLog = document.getElementById('login');
    var inpPas = document.getElementById('pass');
    var inpPasRep = document.getElementById('pass_rep');
    var inpCountry = document.getElementById('country');
    if(!inpLog.value){
    alert('You must enter a name!');
        validName = false;
    } else{
        validName = true;
    }
    if(!inpPas.value){
        alert('You must enter a password!');
        validPass = false;
    } else {
        validPass = true;
    }
    if(!inpPasRep.value){
        alert('You must enter a repeated password!');
        validPassRep= false;
    } else{
        validPassRep = true;
    }
    if(!inpCountry.value){
        alert('You must enter a country!');
        validCountry = false;
    } else {
        validCountry = true;
    }
    if(inpPas.value != inpPasRep.value ){
        alert('The passwords must match!');
        validTwoPass = false;
    } else {
        validTwoPass = true;
    }
    if(validCountry == true && validName == true && 
       validPass == true && validPassRep == true && 
       validTwoPass == true){
        return true;
    } else {
        return false;
    }
}
	</script>
</html>