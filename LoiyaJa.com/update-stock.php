<?php
session_start();
if (!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
require_once('../Model/Menu-model.php');

$result = getAllItem();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<script>
    function searchitem(search) {
        if (search == "") {
            document.getElementById('message').innerHTML = "Please Type Title";
            return;
        }
        let xhttp = new XMLHttpRequest();
        xhttp.open('get', '../Controller/search-item-controller.php?name=' + search, true);
        xhttp.send();
        xhttp.onload = function() {
            document.getElementById('message').innerHTML = this.responseText;
        }
    }
</script>

<body>
    <br><br>
    <center>
        <h1>Menu</h1>
        <input type="text" id="item" onkeyup="searchitem(this.value)"><br><br>
        <tr><td><font id="message">Please Enter a Product Name</font></td></tr>
        </table>
    </center>
    <br><br><br>
    <?php require_once('footer.php') ?>
</body>

</html>