<?php
/**
 * Created by PhpStorm.
 * User: aditya
 * Date: 2019-01-02
 * Time: 14:23
 */
ob_start();
session_start();


$username = "admin";
$password = "!!ihatelife";

$username2 = "root";
$password2 = "!!iloveme!!2";
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!(isset($_POST['uname']) && !empty($_POST['uname']))) {
        $message = "Please enter Username";
    } else if (!(isset($_POST['pass']) && !empty($_POST['pass']))) {
        {
            $message = "Please enter Password";
        }
    }

    if (isset($_POST['uname']) && isset($_POST['pass']) && !empty($_POST['uname']) && !empty($_POST['pass'])) {
        if($_POST['uname'] == $username && $_POST['pass'] == $password){
            $_SESSION["login"] = $username;
            header('Location: dashboard.php');
            exit(0);
        }else{
            $message = "Invalid Username or Password";
        }
    }

    if (isset($_POST['uname']) && isset($_POST['pass']) && !empty($_POST['uname']) && !empty($_POST['pass'])) {
        if($_POST['uname'] == $username2 && $_POST['pass'] == $password2){
            $_SESSION["login"] = $username2;
            header('Location: dashboard.php');
            exit(0);
        }else{
            $message = "Invalid Username or Password";
        }
    }

    $_POST['pass'] = '';
}

?>

<html lang="en" class="cookie_used_false js mac chrome71 js"><!--<![endif]-->
<head>
    <link href="/zones/login.css" rel="stylesheet">
</head>

<body>
<div class="login-page">
    <div class="form">
        <h4>Admin Login</h4>
        <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" action="/zones/index.php" method="post">
            <input type="text" placeholder="username" name="uname" value="<?php echo $_POST['uname']; ?>"/>
            <input type="password" placeholder="password" name="pass" value="<?php echo $_POST['pass']; ?>"/>
            <button type="submit">login</button>
            <p><?php echo $message; ?></p>
            <p class="message">Forgot password? <a href="/zones/reset.php">Reset Password</a></p>
        </form>
    </div>
</div>
</body>
</html>