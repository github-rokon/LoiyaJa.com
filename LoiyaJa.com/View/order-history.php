<?php

session_start();
if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=signInFirst');

    require_once('../model/order-info-model.php');
    require_once('../model/user-info-model.php');
  
    $id = $_COOKIE['id'];
    $row = userInfo($id);
    $fullname = $row['Fullname'];
    $result = getOrderHistory($fullname);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/return.css">
    <style>
     tr{background-color: Lavender;}
    </style>
</head>
<body>
<?php require 'header.php'; ?>
    <br><br>
    <center><h1>Order History</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    <b>Customer Name</b>
                </td>
                <td>
                    <b>Bill</b>
                </td>
                <td>
                    <b>Take away Date</b>
                </td>
                <td>
                    <b>Order Date</b>
                </td>
                <hr width=auto color = purple><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $customerName=$w['CustomerName'];
                    $bill=$w['Bill'];
                    $ddate=$w['takeAwayDate'];
                    $odate=$w['OrderDate'];
                    echo "    
                    <tr><td>$customerName</td>
                    <td>$bill</td>
                    <td>$tdate</td> 
                    <td>$odate</td>      
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Order History Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <br><br>
        <center><a class="c" href="customer-home.php"><button name="c">Go Back</button></a></center>
        
        <?php require 'footer.php'; ?>
</body>
</html>