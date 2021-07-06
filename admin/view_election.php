<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view_election.css">
    <link href="https://fonts.googleapis.com/css2?family=KoHo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@500&family=Reggae+One&display=swap" rel="stylesheet">
    <title>VIEW ELECTION</title>
</head>

<body>
    <h1 class="heading">
        <center>ONLINE ELECTION</center>
    </h1>
    <div class="container">
    <?php
        if (empty($_POST['eid'])) {
        ?>
            <form action="view_election.php" method="POST" class="form-table">
                <table border="2">
                    <tr>
                        <td colspan="2" class="electionhead">
                            <h1>
                                <center>Select Election Name & ID</center>
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>ELECTION NAME</strong></td>
                        <td><input type="text" name="ename" placeholder="Enter Election Name" required></td>
                    </tr>
                    <tr>
                        <td><strong>ELECTION ID</strong></td>
                        <td><input type="number" name="eid" placeholder="Enter Election ID" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><button class="btn" type="submit" name="submit" value="submit"><strong>Submit</strong></button></center>
                        </td>
                    </tr>
                </table>
            </form>
        <?php
        } 
        else 
        {
            $eid = $_POST['eid'];
            $elname = $_POST['ename'];
            require_once "config.php";
            $sql = "SELECT * FROM `election_info` WHERE `ename`='$elname'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_row($result);
            if($row != 0 && $row[0]==$eid)
            {
                $enum = $row[2];
                $epnum = $row[3]; 
        ?>
                <form method="GET" class="form-table">
                    <table border="2">
                        <tr>
                            <td colspan="4" class="electionhead"><?php echo "<h1><center>$elname</center></h1>"; ?></td>
                    </tr>
                    <tr>
                        <th><strong class="table-head">Candidate Name</strong></th>
                        <th><strong class="table-head">Candidate Age</strong></th>
                        <th><strong class="table-head">Party of Candidate</strong></th>
                        <th><strong class="table-head">Votes till Now</strong></th>
                    </tr>
                    <?php
                    $sql1 = "SELECT * FROM `candidate_info` WHERE `ename`='$elname'";
                    $result1 = mysqli_query($link, $sql1);
                    for ($i = 0; $i < $enum; $i++) 
                    {
                        $row1 = mysqli_fetch_row($result1);
                    ?>
                        <tr>
                            <td class="view"><center><strong><?php echo "$row1[1]"; ?></strong></center></td>
                            <td class="view"><center><strong><?php echo "$row1[2]"; ?></strong></center></td>
                            <td class="view"><center><strong><?php echo "$row1[3]"; ?></strong></center></td>
                            <td class="view"><center><strong><?php echo "$row1[4]"; ?></strong></center></td>
                        </tr>
                        <?php
                    } ?>
                </table>
            </form>
            <?php
            }
            else
            {
                echo "<h1 class='h1'>Please Enter Valid Election Id/Name</h1>";
                echo "<br>";
                echo "<h2 class='h2'>Click <a href='view_election.php'>Here</a> to return to the view_election page.</h2>";
            }
            mysqli_close($link);
        }
    ?>
    </div>
</body>

</html>