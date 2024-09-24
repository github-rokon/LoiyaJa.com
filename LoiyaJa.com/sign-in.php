<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'mismatch': {
        $error_msg = "Wrong username or password.";
        break;
      }
    case 'accessDenied': {
        $error_msg = "You need to sign in first.";
        break;
      }
    case 'bannedUser': {
        $error_msg = "Your account is currently banned.";
        break;
      }
    case 'empty': {
        $error_msg = "Field(s) can not be empty.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
        $success_msg = "Account creation successful. Please sign in.";
        break;
      }
    case 'changed': {
        $success_msg = "Password change successful. Please sign in.";
        break;
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="CSS/mystylesign.css">
    <link rel="stylesheet" href="CSS/notunstyle.css">
    <script src="JS/sign-in.js"></script>
</head>
<body>
<?php require_once('header.php');?>
<br><br><div>
    <table cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../Controller/sign-in-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1>Sign In</h1>
                    Email
                    <input type="email" name="email" size="43px">
                    <br><font color="red" align="center" id="emailError"></font><br>
                    Password
                    <input type="password" name="password" size="43px">
                    <br><font color="red" align="center" id="passwordError"></font><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgot-password.php">Forgot Password?</a>
                    <br>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br>
                        <center><font color="red" align="center"><?= $error_msg ?></font></center>
                        <br>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br>
                        <center><font color="green" align="center"><?= $success_msg ?></font></center>
                        <br>
                    <?php } ?>
                    <input type="checkbox" name="rememberMe"> &nbsp; Save LogIn Info <br><br>
                    <center><button class="btn search" size="250px" name="submit" id="submit">Sign In</button></center>
                    <br><br>
                    </form>
                    <hr width="auto" color="blue">
                    <br>
                    <center>
                    Dont have an account?
                    <br><br>
                    <a href="sign-up.php"><button class="btn search">Sign Up</button></a>
                    </center>
            </td>
        </tr>
    </table>
    <div>
    <?php require_once('footer.php');?>
</body>
</html>