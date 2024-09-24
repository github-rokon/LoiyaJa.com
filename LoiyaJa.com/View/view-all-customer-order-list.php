<?php
session_start();
if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');
    require_once('../Model/order-info-model.php');
  
    $result = getAllOrder();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Customer Order List</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/allbg.css">
</head>
<body>
<?php require_once('header.php');?>
    <br><br>
    <center><h1>Customer Order List</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    Customer Name
                </td>
                <td>
                    Delivery Man Name
                </td>
                <td>
                    Delivery Address
                </td>
                <td>
                    Bill
                </td>
                <td>
                    Delivery Date
                </td>
                <td>
                    Order Date
                </td>
                <td>
                    Order Status
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $customerName=$w['CustomerName'];
                    $deliverymanName=$w['DeliveryManName'];
                    $address=$w['Address'];
                    $bill=$w['Bill'];
                    $ddate=$w['DeliveryDate'];
                    $odate=$w['OrderDate'];
                    $status=$w['OrderStatus'];
                    echo "    
                    <tr><td>$customerName</td>
                    <td>$deliverymanName</td>
                    <td>$address</td> 
                    <td>$bill</td>
                    <td>$ddate</td> 
                    <td>$odate</td>
                    <td>$status</td>        
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Orders Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <?php require_once('footer.php');?>
</body>
</html>