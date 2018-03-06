<?php
include("connection.php");

$sel ="select name, message, d_time, country FROM messages AS u left outer join users AS m ON u.id_user = m.id_user order by d_time desc LIMIT 0, 10";
$query = mysqli_query($base, $sel);
if (!$query) {
    printf("Error: %s\n", mysqli_error($base));
    exit();
}
while($row = mysqli_fetch_array( $query, MYSQLI_ASSOC)){
	$name = $row['name'];
	$msg = $row['message'];
	$date = $row['d_time'];
    $country = $row['country'];
	echo "
    <div class = 'wrapperMsg clearfix'>
    <div class = 'dialog_icon left'>
    <img src='img/dialog1.png' width='40' height='40'>
    </div>
    
	<span id = 'message' class = 'left'>
        <span class = 'names'>$name</span><span class = 'countries'> ($country) </span>: $msg<span class = 'msgDate right'>$date</span>
	</span>
    </div>
	";
};
mysqli_free_result($query);

mysqli_close($base);
?>