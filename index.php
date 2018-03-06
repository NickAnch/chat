<?php 
	include("connection.php");
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
</head>
<body>	
	<?php
		include ("header.php");
    ?>
    <div class="container ">
		<?php
                if(isset($_SESSION['logged_user'])){ 
                $variable = $_SESSION['logged_user'];
                echo '<br><span class="EnterMsg"><b>'.$variable.'</b>, write a message:</span><br><button type="submit" id="btnSend">Send</button><textarea name="" id="txtMessage" cols="0" rows="0"></textarea>
                ';
			} else{
				echo "<div class='notify'><p>In order to leave messages, you must <a href='authorize.php'>login</a> or <a href='registration.php'>register</a>.</p> </div>";
			}
		 
	   ?>
        <script>
            var name='<?=$variable?>';
        </script>
        <div class="chat">
                <div id='messages'></div>
        </div>
	</div>
	<script src="js/javascript.js" type="text/javascript"></script>
	
</body>
</html>
