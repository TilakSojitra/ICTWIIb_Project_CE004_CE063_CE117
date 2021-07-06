<?php
session_start();
include_once '1_connection_to_db.php';
if (isset($_POST['submit'])) {
  $user_id1 = $_POST['user_id'];
  $result = mysqli_query($connect, "SELECT * FROM `registration` where `Name`='$user_id1'");
  $row = mysqli_fetch_assoc($result);
  $user_id2 = $row['Name'];
  $email_id = $row['email'];

  if ($user_id1 == $user_id2) {
    $to = $email_id;
    $txt = "Hi, $user_id1. Click https://localhost/TS/Online%20Election/voter/reset_password.php to reset the password";
    $headers = "From: pateltilak9723@gmail.com\r\n";
    $subject = "Reset Password";
    $msg = mail($to, $subject, $txt, $headers);
    if ($msg) {
      $_SESSION['msg'] = 'password link sent';
    } else {
      echo "mail was not sent!!";
    }
  } else {
    echo 'invalid userid';
  }
}
//echo phpinfo();
?>
<!DOCTYPE HTML>
<html>

<head>
  <style type="text/css">
    input {
      border: 1px solid olive;
      border-radius: 5px;
    }

    h1 {
      color: darkgreen;
      font-size: 22px;
      text-align: center;
    }
  </style>
</head>

<body>
  <h1>Forgot Password<h1>
      <form action='' method='post'>
        <table cellspacing='5' align='center'>
          <tr>
            <td>user id:</td>
            <td><input type='text' name='user_id' /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type='submit' name='submit' value='Submit' /></td>
          </tr>
        </table>
      </form>
</body>