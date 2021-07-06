<?php
session_start();

$user = $_SESSION["userdata"];
$candidate = $_SESSION["candidates"];

if (isset($_SESSION['$user']['Status'])) {
    $voting_status = '<b style = "color: green">Voted</b>';
} else {
    $voting_status = '<b style = "color :red">Not Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Page</title>
    <style>
        /*<link rel="preconnect"href="https://fonts.googleapis.com"><link rel="preconnect"href="https://fonts.gstatic.com"crossorigin><link href="https://fonts.googleapis.com/css2?family=Tourney:wght@900&display=swap"rel="stylesheet">*/
        body {
            background-image: linear-gradient(50deg, orange, white, green);
        }

        .header {
            width: 100%;
            font-size: 1.7rem;
            font-family: 'Tourney', cursive;
            padding: 8px;
            border-bottom: 3px dotted black;
        }

        .voter_profile {
            /* background-color: white; */
            margin: auto;
            margin-top: 35px;
            border: 2px solid black;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            width: 33%;
        }

        .voter_profile pre {
            margin: 6px;
            padding: 5px;
            font-size: 25px;
            font-weight: bolder;
        }

        .cand {
            margin: 25px;
            border: 5px solid black;
            border-radius: 15px;
            padding: 25px;
        }

        #votebutn {
            background-color: red;
            font-size: 20px;
            text-align: center;
            padding: 20px;
            font-weight: bolder;
            border: none;
            border-radius: 120px;
            margin-top: 29px;
            margin-left: 500px;
            cursor: pointer;
            width: 200px;
        }

        #votebutn:hover {
            background-color: rgb(63, 241, 63);
        }

        /* .cand img {
            width: 200px;
            height: 200px;
        } */
    </style>
</head>

<body>
    <div class="header">
        <h1>
            <p>
                <marquee>...Welcome Voter...</marquee>
            </p>
        </h1>
    </div>
    <div class="voter_profile">
        <pre>Name    :     <?php echo $user['Name']; ?>    </pre>
        <pre>UID     :     <?php echo $user['uid']; ?>     </pre>
        <pre>Status  :     <?php echo $voting_status; ?>  </pre>
    </div>

    <br><br><br>

    <hr>

    <br><br><br>

    <div id="group_data">
        <?php
        if ($_SESSION["candidates"]) {
            for ($i = 0; $i < count($candidate); $i++) {
        ?>
                <div class="cand">
                    <h1>
                        <pre><strong>Name         :   <?php echo $candidate[$i]['Name'] ?>  </strong></pre>
                    </h1>
                    <h1>
                        <pre><strong>Party Name   :   <?php echo $candidate[$i]['Party'] ?> </strong></pre>
                    </h1>
                    <form action="5_voted.php" method="post">
                        <input type="hidden" name="gvotes" value="<?php echo $candidate[$i]['Votes'] ?>">
                        <input type="hidden" name="gid" value="<?php echo $candidate[$i]['ID'] ?>">
                        <input type="hidden" name="cname" value="<?php echo $candidate[$i]['Name'] ?>">
                        <center><input type="submit" name="votebutn" value="Vote" id="votebutn"></center>
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>

</body>

</html>