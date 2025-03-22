<?php
    if(isset($_POST['login-submit'])){
        require('connect.php');
        $username = $_POST['Player'];
        $password = $_POST['Password'];
        if(empty($username) || empty($password)){
            header("Location: ../login.php?error_emptyfields".$username);
        }else {
            $sql = "SELECT * FROM mytable WHERE username=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../login.php?error_sqlerror");
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $passwordchk = password_verify($password, $row['password']);
                    if($passwordchk == false) {
                        header("Location: ../login.php?error_wrongpw");
                        exit();
                    } else if($passwordchk == true) {
                        session_start();
                        $_SESSION['playerID'] = $row['ID'];
                        $_SESSION['playername'] = $row['username'];
                        $_SESSION['username']=$username;
                        header("Location: ../response.php?login=success".$_SESSION);
                        exit();
                    } else {
                        header("Location: ../login.php?error_wrongpw");
                        exit();
                    }
                } else {
                    header("Location: ../login.php?error_doesnotexist");
                }
            }
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
?>