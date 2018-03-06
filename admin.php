<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include ("header.php"); 
    if(isset($_POST['doDelUser'])){
        $idus = (int)$_POST['idus'];
        
        $sql = "DELETE FROM users where id_user='$idus'";
        mysqli_query($base, $sql);
        $sql = "DELETE FROM messages where id_user='$idus'";
        mysqli_query($base, $sql);
        echo "<script>alert(\"Удаление прошло успешно.\");</script>";
    }
?>
   <div class="wrapTable">
   <form action="admin.php" method="POST">
   <span>Write the user id, you want to delete: </span><input type="text" name="idus" class="inputDelUser">
   <button type="submit" name="doDelUser" class = "delUser">Delete</button>
   </form>
    <table class="UsersTable" cellspacing="0">
<?php
        
        if(isset($_SESSION['logged_user']) &&  $_SESSION['logged_user'] == 'admin'){
    
            $sel ="select * FROM users";
            $query = mysqli_query($base, $sel);
            if (!$query) {
                printf("Error: %s\n", mysqli_error($base));
                exit();
            }
            while($row = mysqli_fetch_array( $query, MYSQLI_ASSOC)){
                $iduser = $row['id_user'];
                $name = $row['name'];
                $pass = $row['password'];
                $country = $row['country'];
                echo"
                <tr>
                    <td>$iduser</td><td> $name</td><td>$pass</td><td>$country</td>
                </tr>
                ";
            };
            
        } else {
            echo '<script>location.replace("http://chat2/index.php");</script>';
        }
        ?>
    </table>
    </div>


</body>
</html>