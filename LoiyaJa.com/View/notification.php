<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
    require_once('../Model/notification-model.php');
  
    $result = getDeliverymanNotification();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="external.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
</head>
<body>
    <br><br>
    <center><h1>Notification</h1>
        <?php 
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">";
                while($w=mysqli_fetch_assoc($result)){
                    $notification=$w['Notification'];
                    echo "    
                    <tr><td>$notification</td></tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Notifications Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <br>
     
</body>
</html>