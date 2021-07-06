<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=KoHo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/add_election.css">
    <title>ADD ELECTION</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>

<body>
    <h1 class="heading">
        <center>ONLINE ELECTION</center>
    </h1>
    <div class="container">
        <?php
        require_once "config.php";
        if (!empty($_POST['username']) & !empty($_POST['password'])) 
        {
            $name = $_POST['username'];
            $pass = $_POST['password'];
            $sql = "SELECT * FROM `admin_detail`";
            $result = mysqli_query($link, $sql);
            $num = mysqli_num_rows($result);
            $temp=1;
            while ($row = mysqli_fetch_row($result)) 
            {
                $dname = $row[0];
                $dpass = $row[1];
                if (($name == $dname) & ($pass == $dpass)) 
                {
        ?>
                    <form action="add_candidate.php" method="POST" class="form-table">
                        <table border="2">
                            <tr>
                                <td><strong>Election Name:</strong></td>
                                <td><input type="text" name="ename" placeholder="Enter Election name" required></td>
                            </tr>
                            <tr>
                                <td><strong>Number Of Candidates:</strong></td>
                                <td><input type="number" name="enum" placeholder="Total Candidates" required></td>
                            </tr>
                            <tr>
                                <td><strong>Number Of Parties:</strong></td>
                                <td><input type="number" name="epnum" placeholder="Total Parties" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <center><button class="btn" type="submit" name="submit" value="submit"><strong>Submit</strong></button></center>
                                </td>
                                <td>
                                    <center><button class="btn" type="reset" name="reset" value="reset"><strong>Reset</strong></button></center>
                                </td>
                            </tr>
                        </table>
                    </form>
        <?php
                    mysqli_close($link);
                    break;
                } 
                else if($temp==$num)
                {
                    echo "<h1 class='h1'>Username/Password didn't match.</h1>";
                    echo "<br>";
                    echo "<h2 class='h2'>Click <a href='login.php'>Here</a> to return to the login page.</h2>";
                    mysqli_close($link);
                    break;
                }
                $temp++;
            }
        } 
        else 
        {
            echo "<h1 class='h1'>It seems some fields are empty.&nbsp;</h1>";
            echo "<br>";
            echo "<h2 class='h2'>Click <a href='login.php'>Here</a> to return to the login page.</h2>";
        }
        ?>
    </div>
</body>
</html>