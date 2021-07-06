<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Done</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .rhome {
        margin-top: 160px;
        font-size: 25px;
        font-weight: bolder;
        text-decoration: none;
        text-align: center;
        padding: 12px;
        color: black;
        background-color: rgba(143, 143, 229, 0.877);
        border-radius: 12px;
        display: inline-block;
    }

    .gfeed {
        margin-top: 14px;
        font-size: 25px;
        font-weight: bolder;
        text-decoration: none;
        text-align: center;
        padding: 12px;
        color: black;
        background-color: rgba(143, 143, 229, 0.877);
        border-radius: 12px;
        display: inline-block;
    }
</style>

<body>
    <?php

    session_start();
    include_once('1_connection_to_db.php');
    require_once "config.php";

    $voting = $_POST['gvotes'];
    $total_votes = $voting + 1;
    $gid = $_POST['gid'];
    $cname=$_POST['cname'];

    $vote_giver = $_SESSION['userdata']['Serial Number'];

    $update_votes = mysqli_query($connect, "UPDATE `candidates` SET votes = '$total_votes' WHERE id = '$gid'");
    $update_in_admin = "UPDATE `election`.`candidate_info` SET vnum = '$total_votes' WHERE cname = '$cname'";
    if($link->query($update_in_admin)==true){
        echo "";
    }
    $update_user_status = mysqli_query($connect, "UPDATE `registration` SET Status = 1 WHERE `Serial Number` ='$vote_giver'");

    if ($update_votes) {
        echo '<div class="alert alert-success" role="alert">
        <center><h1>Voting done Thank YOU...</h1></center>
      </div>';

        $_SESSION['userdata']['Serial Number'] = 1;

        echo '<center><a href="1_main.html" class="rhome">Return Home</a></center>';
        echo '<center><a href="feedback.php" class="gfeed">Give Your Feedback</a></center>';
    } else {
        echo "Error";
    }

    ?>
</body>

</html>