<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert | Vote India</title>
</head>
<style>
    .fail{
        display: flex;
        background-color: rgba(250, 37, 37, 0.575);
        font-weight: 500px;
        font-size: 25px;
        padding: 15px;
        border-radius: 15px;
    }
    .pass{
        display: flex;
        background-color: rgba(86, 248, 173, 0.842);
        font-weight: 500px;
        font-size: 25px;
        padding: 15px;
        border-radius: 15px;
    }
    .Back_btn{
        box-shadow: 8px 8px 12px rgba(135, 135, 255, 0.61), -8px -8px 12px rgba(135, 135, 255, 0.61);
        background-color: rgba(214, 214, 255, 0.849);
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 25px;
        padding: 16px;
        margin: auto;
        margin-top: 50px;
        width: 80px;
    }
    .Back_btn a{
        display: block;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-weight: bolder;
        text-decoration: none;
        color: black;
        font-size: 2rem;
    }
    .Back_btn:hover{
        background-color: rgba(184, 240, 209, 0.788);
        box-shadow: 8px 8px 12px rgba(96, 192, 120, 0.877), -8px -8px 12px rgba(96, 192, 120, 0.877);
    }
</style>
<body>
<?php
// Variable declaration...

    $username1 = $_POST['voter_name'];
    $password1 = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $age = $_POST['voter_age'];
    $uid = $_POST['uid_num'];
    $email = $_POST['email_id'];
    $phone_number = $_POST['Phone_number'];
    $gender = $_POST['Gender'];

// Condition check for an age...

if ($age < 18) 
{
    echo '<div class="fail">';
    echo '<pre>     <strong>Sorry you cannot vote</strong> your age is below 18...</pre>';
    echo '</div>';
    echo '<div class="Back_btn"><a href="1_reg.html">Back</a></div>';
    exit();
}

// Condition for password...

if (!($password1 == $confirm_password)) 
{
    echo '<div class="fail">';
    echo '<pre>     <strong>Please check your PASSWORD</strong> Password and Confirm Password not matched</pre>';
    echo '</div>';
    echo '<div class="Back_btn"><a href="1_reg.html">Back</a></div>';
    exit();
}

// Checking the length of phone number...

if ((strlen($phone_number) < 10) and (strlen($phone_number) > 10)) 
{
    echo '<div class="fail">';
    echo '<pre>     <strong>Please Enter a valid phone number</strong> Phone number must be of <strong>10</strong> digits only</pre>';
    echo '</div>';
    echo '<div class="Back_btn"><a href="1_reg.html">Back</a></div>';
    exit();
}

// Checking the length of phone number...
if ((strlen($uid) < 8) and (strlen($uid) > 8)) 
{
    echo '<div class="fail">';
    echo '<pre>     <strong>Please Enter a valid UID number</strong> UID number must be of <strong>12</strong> digits only</pre>';
    echo '</div>';
    echo '<div class="Back_btn"><a href="1_reg.html">Back</a></div>';
    exit();
}

//Insert to database and Success result... 
include_once('1_connection_to_db.php');
$sql = "INSERT INTO `registration` (`Name`, `Age`, `Password`, `email`, `uid`, `mobile_num`, `Gender`, `time`) VALUES ('$username1', '$age', '$password1', '$email', '$uid', '$phone_number', '$gender', current_timestamp())";
$registered = mysqli_query($connect, $sql);

// Query success status 

if($registered)
{
    echo '<div class="pass">';
    echo '<pre>     <strong>Your registration is successful</strong> Login and do voting...</pre>';
    echo '</div>';
    echo '<div class="Back_btn"><a href="1_main.html">Back</a></div>';
}
else
{
    echo "Fail To Register";
}

?>
</body>
</html>
