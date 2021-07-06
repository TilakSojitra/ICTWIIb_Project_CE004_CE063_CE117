<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>

<body>
    <h1 class="heading"><center>ONLINE ELECTION</center></h1>
    <div class="container">
        <form action="add_election.php" method="POST" class="form-table">
            <table border="2">
                <tr>
                    <td><strong>USERNAME</strong></td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <td><strong>PASSWORD</strong></td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="btn" type="submit" name="submit" value="submit"><strong>Login</strong></button></center>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>