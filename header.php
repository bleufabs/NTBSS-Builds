<?php 
    session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>navigation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="headerBorder">
        <header>
            <nav>
                <ul class="nav">
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <?php 
                            if (isset($_SESSION['username'])){
                                echo '<form action="includes/logout.inc.php" class="logoutbutton" method="POST">
                                    <button type="submit" name="logout-submit">Logout</button>
                                </form>';
                            } else {
                                echo '<form action="includes/login.inc.php" class="loginbutton" method="POST">
                                    <button type="submit" name="login-submit">Login</button>
                                </form>';
                            }
                        ?>
                    </li>
                    <li><a href="signup.php">Sign up</a></li>
                </ul>
            </nav>
        </header>
    </body>
</html>