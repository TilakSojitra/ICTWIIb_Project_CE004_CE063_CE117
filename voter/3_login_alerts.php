<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful Login</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        a {
            color: white;
            text-decoration: none;
            background-color: rgb(0, 0, 0);
            padding: 25px;
            border-radius: 200px;
        }
        a:hover{
            background-color: skyblue;
            color: black;
        }
    </style>
<body>
    <?php
    session_start();

include_once('1_connection_to_db.php');

$username3 = $_POST['username'];
$password3 = $_POST['password'];

$sql1 = "SELECT * FROM `registration` WHERE name = '$username3' AND Password = '$password3'";
$result_conn = mysqli_query($connect, $sql1);
$ans = mysqli_num_rows($result_conn);

if($ans == 1)
{
    $sql2 = "SELECT * FROM `registration` WHERE PASSWORD = '$password3' AND Status = 0";
    $result_conn1 = mysqli_query($connect, $sql2);
    $ans1 = mysqli_num_rows($result_conn1);
    if($ans1 == 1)
    {
        // Data Fetching... AND SESSION ACTIVATION
        $sql3 = "SELECT * FROM `candidates`";
        $result_conn2 = mysqli_query($connect, $sql3);
        
        $global_userdata = mysqli_fetch_array($result_conn);
        $global_candidates = mysqli_fetch_all($result_conn2, MYSQLI_ASSOC);
        
        $_SESSION["userdata"] = $global_userdata;
        $_SESSION["candidates"] = $global_candidates; 

        echo '<div class="alert alert-success" role="alert">
        <strong>Login Successful</strong>
        </div>';
        echo "<br><br><br><br><br><br><br><br><br>";
        echo '<h2><center><a href="4_voting_page.php">GO AND VOTE</a></center></h2>';
    }
    else
    {
        echo '<div class="alert alert-warning" role="alert">
        <strong>You Already Voted </strong> You can not vote...
        </div>';
        echo "<br><br><br><br><br><br><br><br><br>";
        echo '<h2><center><a href="2_login.html">Back</a></center></h2>';
    }
}
else
{
        echo '<div class="alert alert-danger" role="alert">
        <strong>Not Registered OR Wrong Credentials</strong>
        </div>';
        echo "<br><br><br><br><br><br><br><br><br>";
        echo '<h2><center><a href="2_login.html">Back</a></center></h2>';
}

?>
</body>
</html>