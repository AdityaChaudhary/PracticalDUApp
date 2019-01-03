<?php
/**
 * Created by PhpStorm.
 * User: aditya
 * Date: 2019-01-02
 * Time: 14:23
 */
ob_start();
session_start();


$test = "luci";
$username = "admin";
$password = "!!ihatelife";

$username2 = "root";
$password2 = "!!iloveme!!2";
$message = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!(isset($_POST['username'])) || empty($_POST['username'])) {
        $message = "Please enter Username";
    }

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        if ($_POST['username'] == $username || $_POST['username'] == $username2) {
            $_SESSION["login"] = $test;
            $message = "An email has been sent to your registered email account";
        }else{
            $message = "Invalid Username";
        }
    }

}

?>

<html lang="en" class="cookie_used_false js mac chrome71 js"><!--<![endif]-->
<head>
    <link href="/zones/login.css" rel="stylesheet">
</head>

<body>
<div class="login-page">
    <div class="form">
        <h4>Reset Password</h4>
        <form class="login-form" method="post" action="/zones/reset.php">
            <input type="text" placeholder="username" name="username"/>
            <button type="submit">Reset</button>
            <p><?php echo $message; ?></p>
            <p class="message">Already registered? <a href="/zones/index.php">Sign In</a></p>
        </form>
    </div>
</div>
</body>
</html>