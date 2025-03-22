<!Doctype html>
<head>
    <title>My Build's</title>
    <meta name="viewport" content="width=devise-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('header.php'); ?>
        <main class="loginB">
            <div class="loginBG">
                <div class="loginform">
                    <h1>Log in</h1>
                    <?php 
                        if(isset($_GET['error'])) {
                            if($_GET['error'] == "emptyfields") {
                                echo '<p class="usererror">Fill out all Fields!</p>';
                            }else if($_GET['error'] == "wrongpw") {
                                echo '<p class="usererror">Password incorrect!</p>';
                            }else if($_GET['error'] == "doesnotexist") {
                                echo '<p class="usererror">Username does not exist!</p>';
                            }
                        }
                    ?> 
                    <form action="includes/login.inc.php" method="post" class="loginForm">
                        <p>
                            <input type="text" placeholder="Username" name="Player" >
                        </p>
                        <p>
                            <input type="text" placeholder="Password" name="Password" >
                        </p>
                        <button type="submit" name="login-submit">Login</button>
                        <p class="signupLink">
                            Don't have an account? <a href="signup.php">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </main>
    <?php include('footer.php'); ?>
</body>