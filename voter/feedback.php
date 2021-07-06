<?php
// INSERT INTO `voter_feedback` (`no`, `firstname`, `mailid`, `state`, `feedback`) VALUES (NULL, 'Tilak', 'pateltilak9723@gmail.com', 'gujarat', 'dfjh');
if (!empty($_POST['firstname'])) {
  require_once "config.php";
  $name = $_POST['firstname'];
  $email = $_POST['mailid'];
  $state = $_POST['state'];
  $feedback = $_POST['feedback'];
  $sql = "INSERT INTO `election`.`voter_feedback`(`firstname`, `mailid` , `state` , `feedback`) VALUES ('$name','$email','$state','$feedback');";
  if ($link->query($sql) == true)
    echo "";
  else
    echo "ERROR:  $link->error";
  mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/feedback.css">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&family=Pangolin&family=Reggae+One&display=swap" rel="stylesheet">
  <title>FEEDBACK FORM</title>
</head>

<body>
  <center>
    <h1>FEEDBACK</h1>
  </center>
  <?php
  if (!empty($_POST['firstname'])) {
    echo "<img src='images/feed.png' alt='Thanks For Feedback' id='feedimg'>";
  } else
    echo "<img src='images/givefeed.png' alt='Give Your Feedback' id='givefeed'>";
  ?>
  <div class="container">
    <form action="feedback.php" method="POST">
      <div class="row">
        <div class="col-25">
          <input type="text" id="fname" name="firstname" placeholder="Enter your name" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <input type="email" id="email" name="mailid" placeholder="Enter mail id" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <select id="country" name="state" required>
            <option disabled>Select State</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="West Bengal">West Bengal</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Punjab">Punjab</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Goa">Goa</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Bihar">Bihar</option>
            <option value="Assam">Assam</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Kerala</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttarakhand">Uttarakhand</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <textarea id="subject" name="feedback" placeholder="Write Your Feed Back Here" style="height:200px" cols="20" required></textarea>
        </div>
      </div>
      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</body>

</html>