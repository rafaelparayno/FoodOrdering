<?php
session_start();
include('./functions.php');
if (isset($_SESSION['user'])) {

    if ($_SESSION['role'] === 1 || 2) {
        header('Location: ./System/dashboard.php');
    } else {
        header('Location: ./System/POS/dashboard.php');
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['loginSumb'])) {

        $users->login($_POST['username'], $_POST['password']);
    }
    $log = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <div class="bgImg bgImg">

        <form method="post" class="border p-5">
            <div class="login-box">
                <?php
                if (isset($log)) {
                ?>
                    <div class="text-center" style="color:red">Wrong Password or Username</div>
                <?php } ?>
                <h1>LOGIN</h1>
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Username" name="username" value="">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" value="">
                </div>

                <button type="submit" name="loginSumb" class="btn">Login</button>
        </form>
    </div>
    </div>
</body>

</html>