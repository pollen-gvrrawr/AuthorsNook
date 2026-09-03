<?php
session_start();
require_once "dbaseconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | book nook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css?v=1">
    <link rel="icon" type="image/png" href="../images/icons/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="signin">
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="row rounded-4 p-4 box" style="width: 40vw; box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2); background-color: rgba(255, 255, 255, 0.8);">
            <div class="col">
                <h2 class="text-center display-5 font-bold mt-2" style="color: #E1AFD1;">Sign In</h2>
                <form action="signin.php" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label poppins-regular" for="user">Username</label>
                            <input class="form-control rounded-5 poppins-regular" type="text" name="user" id="user">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label poppins-regular" for="pass">Password</label>
                            <input class="form-control rounded-5" type="password" name="pass" id="pass">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <input class="btn w-50 rounded-5 text-white signinbtn poppins-regular" type="submit" value="Sign In" name="signin">
                        </div>
                    </div>
                    <hr style="margin-top: 5vh">
                    <div class="row mt-4">
                        <div class="col text-center poppins-regular">
                            <p class="text-muted" style="padding: 0 0 0 0;">No account yet? <a href="signup.php" class="fw-bold linksign">Sign up here</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_POST['signin'])){
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);

        $_SESSION['user'] = $user;

        $loginsql = "Select * from tbl_users where username = '".$user."' AND password = '".$pass."'";
        $loginresult = $conn->query($loginsql);

        if($loginresult->num_rows == 1){
            $field = $loginresult->fetch_assoc();

            $user = $field['username'];
            $pfp = $field['pfp'];
            $id = $field['user_id'];
            
            $_SESSION['id'] = $id;
            $_SESSION['profile'] = $pfp;
            $_SESSION['user'] = $user;
            
            ?><script>window.location.href="index.php";</script><?php

        } else {
            ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Log in failed",
                    text: "Username or password does not match our records",
                    confirmButtonColor: "#AD88C6"
                });
            </script>
            <?php
        }
    }
    ?>
</body>
</html>