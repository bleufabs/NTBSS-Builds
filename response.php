<!Doctype html>
<head>
    <title>Build</title>
    <meta name="viewport" content="width=devise-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('header.php'); ?>
    <?php include_once('includes/connect.php'); ?>
    <main class="responseB">
        <div>
            <?php
                $sql = "SELECT * FROM mytable;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                echo "<div class='response'>
                    <h1 class='welcomeR'>Welcome {$_SESSION['username']}! </h1>
                </div>";
            ?>
            <div class="build">
                <form method="post">
                    <label for="btype">Build Type:</label>
                    <select name="btype" id="btype" onchange="this.form.submit();">
                        <option value="attack"> Attack</option>
                        <option value="range">Range</option>
                        <option value="defense">Defense</option>
                        <option value="heal">Heal</option>
                    </select>
                </form>
                <br>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body>