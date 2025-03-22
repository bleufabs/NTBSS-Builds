<!Doctype html>
<head>
    <title>My Build's</title>
    <meta name="viewport" content="width=devise-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('header.php'); ?>

    <main class="signUpB">
        <div>
            <h1>Sign Up</h1>
            <?php 
                if(isset($_GET['error'])){
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class="usererror">Fill in all fields!</p>';
                    }else if ($_GET['error'] == "sqlerror"){
                        echo '<p class="usererror">sql error please sign up again!</p>';
                    }else if ($_GET['error'] == "invalidPlayer"){
                        echo '<p class="usererror">Use valid charcters for username!</p>';
                    }else if ($_GET['error'] == "PasswordcheckPlayer"){
                        echo '<p class="usererror">Passwords must match!</p>';
                    }else if ($_GET['error'] == "usernamealreadytaken"){
                        echo '<p class="usererror">Username alredy taken!</p>';
                    }
                }
            ?>
            <form action="includes/signup.inc.php" method="post" class="signUpForm">
                <p>
                    <input type="text" placeholder="Username" name="Player" >
                </p>
                <p>
                    <input type="text" placeholder="Password" name="Password" >
                </p>
                <p>
                    <input type="text" placeholder="Repeat Password" name="Password-re" >
                </p>
                <button type="submit" name="signup-submit">Sign up</button>
            </form>
        </div>
    </main>
    
    <?php include('footer.php'); ?>
</body>