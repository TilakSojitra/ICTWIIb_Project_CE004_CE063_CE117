<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_candidate.css">
    <link href="https://fonts.googleapis.com/css2?family=KoHo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@500&family=Reggae+One&display=swap" rel="stylesheet">
    <title>ADD CANDIDATES</title>
</head> 
<body>
    <h1 class="heading">
        <center>ONLINE ELECTION</center>
    </h1>
    <div class="container">
        <?php
        if (( isset($_POST['ename']) & isset($_POST['enum']) & isset($_POST['epnum']))|| isset($_COOKIE['enum']))
        {
            require_once "config.php";
            require_once "../voter/1_connection_to_db.php";
            if (empty($_POST['cname-1'])) 
            {
                $time = 120 + time();
                setcookie('enum',$_POST['enum'], $time);
                setcookie('ename',$_POST['ename'], $time);
                $ename = $_POST['ename'];
                $enum = $_POST['enum'];
                $epnum = $_POST['epnum'];
                $sql = "INSERT INTO `election_info`(`ename`, `enum` , `epnum`) VALUES ('$ename','$enum','$epnum');";
                if ($link->query($sql) == true)
                    echo "";
                else
                    echo "<h1 class='h1'>ERROR:  $link->error</h1>";
        ?>
                <form action="add_candidate.php" method="POST" class="form-table">
                    <table border="2">
                        <tr>
                            <td colspan="3" class="electionhead"><?php echo "<h1><center>$ename</center></h1>"; ?></td>
                        </tr>
                        <tr>
                            <th><strong class="table-head">Candidate Name</strong></th>
                            <th><strong class="table-head">Candidate Age</strong></th>
                            <th><strong class="table-head">Party of Candidate</strong></th>
                        </tr>
                        <?php
                        for ($i = 1; $i <= $enum; $i++) 
                        {
                            echo "<tr>
                            <td><input type='text' name='cname-$i' placeholder='Name of Candidate-$i' required></td>
                            <td><input type='number' name='cage-$i' placeholder='Age of Candidate-$i' required></td>
                            <td><input type='text' name='cparty-$i' placeholder='Party of Candidate-$i' required></td>
                            </tr>";
                        }
                        ?>
                        <tr>
                            <td>
                                <center><button class="btn" type="submit" name="submit" value="submit"><strong>Submit</strong></button></center>
                            </td>
                            <td>
                                <center><button class="btn" type="reset" name="reset" value="reset"><strong>Reset</strong></button></center>
                            </td>
                            <td>
                                <center><button class="btn"><strong><a href="login.php">Back to Login Page</a></strong></button></center>
                            </td>
                        </tr>
                    </table>
                </form>
        <?php
                mysqli_close($link);
            } 
            else 
            {
                $enum=$_COOKIE['enum'];
                $ename=$_COOKIE['ename'];
                for ($i = 1; $i <= $enum; $i++) 
                {
                    $cname = $_POST["cname-$i"];
                    $cage = $_POST["cage-$i"];
                    $cparty = $_POST["cparty-$i"];
                    $sql = "INSERT INTO `candidate_info`(`ename`, `cname`,`cage`,`cparty`,`vnum`)  VALUES ('$ename','$cname','$cage','$cparty','0')";
                    $insert = "INSERT INTO `candidates`(`Name`, `Party`, `Votes`) VALUES ('$cname','$cparty','0')";
                    if ($link->query($sql) == true)
                        echo "";
                    if ($connect->query($insert) == true)
                        echo "";
                    else if ($i == 1)
                        echo "<h1 class='h1'>ERROR: $link->error</h1>";
                }
                echo "<h1 class='h1'>Successfully added.</h1>";
                mysqli_close($link);    
                echo "<br>";
                echo "<h2 class='h2'>Click <a href='view_election.php' class='a1'>Here</a> to view the election.</h2>";
            }
        } 
        else 
        {
            echo "<h1 class='h1'>It seems some fields are NULL.&nbsp;</h1>";
            echo "<br>";
            echo "<h2 class='h2'>Click <a href='login.php' class='a1'>Here</a> and Start this process from beginning.</h2>";
        }
        ?>
    </div>
</body>
</html>