
        <?php 
            if (isset($_POST['signup-submit'])){
                require('connect.php');
                $username = $_POST['Player'];
                $password = $_POST['Password'];
                $password_confirm = $_POST['Password-re'];

                if(empty($username) || empty($password) || empty($password_confirm)){
                    header("Location: ../signup.php?error=emptyfields&Player=".$username);
                    exit();
                }
                elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    header("Location: ../signup.php?error=invalidPlayer");
                    exit();
                }
                elseif($password !== $password_confirm){
                    header("Location: ../signup.php?error=PasswordcheckPlayer=".$username);
                    exit();
                }
                else{
                    $sql="SELECT username FROM mytable WHERE username=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt,"s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck= mysqli_stmt_num_rows($stmt);
                        if($resultCheck > 0){
                            header("Location: ../login.php?error=usernamealreadytaken&Player=".$username);
                            exit();
                        }
                        else{
                            $sql= "INSERT INTO mytable (username, password) VALUES (?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: ../signup.php?error=sqlerror");
                                exit();
                            }
                            else{
                                $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                                
                                mysqli_stmt_bind_param($stmt,"ss", $username, $hashedpwd);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?signup=success");
                                exit();

                            }
                        }
                    }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
            else{
                header("Location: ../signup.php");
                exit();
            }
        ?>