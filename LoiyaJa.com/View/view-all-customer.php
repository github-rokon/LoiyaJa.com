<?php

session_start();

if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');
    require_once('../Model/user-info-model.php');
    
    $id = $_COOKIE['id'];
    $row = userInfo($id);

    if (isset($_GET['search'])) $result = searchCustomer($_GET['search']);
    else $result = getAllCustomer();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Customer</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/allbg.css">
    <link rel="stylesheet" href="CSS/common.css">
    <script src="JS/view-all-customer.js"></script>
</head>
<body>
<?php require_once('header.php');?>
<p align="right"><?php echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">"; ?> &nbsp;&nbsp;&nbsp;&nbsp;
    <select name="profile" onchange="location = this.value;">
        <option disabled selected hidden> <?php echo $row['Username']; ?></option>
        <option value="profile.php">Profile</option>
        <option value="../Controller/logout-controller.php">Log Out</option>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br>
    <center><h1>Customer List</h1>
    <br><br>
    <table border=0 cellspacing=0 align="center" width="300px">
<tr>
<td>
<input type="text" name="search" id="search" onkeyup="searchCustomer()" placeholder="Search By Fullname"><br><br><br><br>
</td>
</tr>
</table>

    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo"<table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" id=\"customer-table\">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    Username
                </td>
                <td>
                    Email
                </td>
                <td>
                    Action
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $userid=$w['UserID'];
                    $name=$w['Fullname'];
                    $username=$w['Username'];
                    $email=$w['Email'];
                    echo "    
                    <tr><td>$name</td>
                    <td>$username</td>
                    <td>$email</td> 
                    <td><a href=\"view-information.php?id={$userid}\">Show Details</a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Customer Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <?php require_once('footer.php');?>
</body>
</html>