<?php

$fullnameMsg = $emailMsg = $phoneMsg = $addressMsg =  $dobMsg =  $religionMsg =  $usernameMsg = $passwordMsg =  $cpasswordMsg =  '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'fullnameEmpty': {
        $fullnameMsg = "Fullname can not be empty.";
        break;
      }
    case 'phoneEmpty': {
        $phoneMsg = "Phone number can not be empty.";
        break;
      }
    case 'addressEmpty': {
        $addressMsg = "Address can not be empty.";
        break;
      }
    case 'emailEmpty': {
        $emailMsg = "Email can not be empty.";
        break;
      }
    case 'dobEmpty': {
        $dobMsg = "Date of birth can not be empty.";
        break;
      }
    case 'religionEmpty': {
        $religionMsg = "Religion can not be empty.";
        break;
      }
    case 'usernameEmpty': {
        $usernameMsg = "Username can not be empty.";
        break;
      }
    case 'passwordEmpty': {
        $passwordMsg = "Password can not be empty.";
        break;
      }
    case 'cpasswordEmpty': {
        $cpasswordMsg = "Confirm password can not be empty.";
        break;
      }
    case 'fullnameInvalid': {
        $fullnameMsg = "Fullname is not valid.";
        break;
      }
    case 'phoneInvalid': {
        $phoneMsg = "Phone number is not valid.";
        break;
      }
    case 'emailInvalid': {
        $emailMsg = "Email is not valid.";
        break;
      }
    case 'emailExists': {
        $emailMsg = "Email already exists.";
        break;
      }
    case 'usernameInvalid': {
        $usernameMsg = "Username is not valid.";
        break;
      }
    case 'passwordInvalid': {
        $passwordMsg = "Password is not valid.";
        break;
      }
    case 'passwordMismatch': {
        $cpasswordMsg = "Passwords do not match.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/reg.css">
    <link rel="stylesheet" href="CSS/editinfo.css">
    <script src="JS/sign-up.js"></script>
</head>
<body>

    <table width="23%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../Controller/sign-up-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1>Sign Up</h1>
                    Fullname
                    <input type="text" name="fullname" size="43px">
                    <?php if (strlen($fullnameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $fullnameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="fullnameError"></font><br>
                    Phone
                    <input type="text" name="phone" size="43px">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="phoneError"></font><br>
                    Email
                    <input type="email" name="email" size="43px">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="emailError"></font><br>
                    Address
                    <input type="text" name="address" size="43px">
                    <?php if (strlen($addressMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $addressMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="addressError"></font><br>
                    Date Of Birth &nbsp;&nbsp;&nbsp;
                    <input type="date" name="dob" size="43px">
                    <?php if (strlen($dobMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $dobMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="dobError"></font><br>
                    Religion &nbsp;&nbsp;&nbsp;
                    <select name="religion">
                        <option disabled selected hidden value="Not Selected">Choose Your Religion</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Christian">Christian</option>
                    </select>
                    <?php if (strlen($religionMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $religionMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="religionError"></font><br>
                    Username
                    <input type="text" name="username" size="43px">
                    <?php if (strlen($usernameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $usernameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="usernameError"></font><br>
                    Password
                    <input type="password" name="password" size="43px">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="passwordError"></font><br>
                    Confirm Password
                    <input type="password" name="cpassword" size="43px">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="cpasswordError"></font><br>
                    <a href=button><button class="btn search">Create Account</button></a>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>