<?php
/**
 * Created by PhpStorm.
 * User: aditya
 * Date: 2019-01-02
 * Time: 14:43
 */

ob_start();
session_start();

$message = "";

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit(0);
}

if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
    if ($_SESSION['login'] == 'admin')
        $key = base64_encode(base64_encode("Congratulations " . $_SESSION['login'] . ". You have cracked this question."));
    else if($_SESSION['login'] == 'root')
        $key = base64_encode(base64_encode(base64_encode("Congratulations " . $_SESSION['login'] . ". You have cracked this question.")));
    else
        $key = base64_encode("Congratulations " . $_SESSION['login'] . ". You have cracked this question.");

    $message = "<b>Welcome " . $_SESSION['login'] . "</b><br>Extract message from below mentioned string to solve this question: <br><i>" . $key . "</i><br><br> <form class='login-form' action='dashboard.php' method='post'><button type='submit' name='logout'>logout</button></form>";
} else {
    $message = "User not logged In <br><br> <a href='index.php'>Login</a>";

}
?>

<html lang="en" class="cookie_used_false js mac chrome71 js"><!--<![endif]-->
<head>
    <link href="login.css" rel="stylesheet">
</head>

<body>
<div class="login-page" style="word-wrap: break-word;">
    <div class="form">
        <?php echo $message; ?>
    </div>
</div>
</body>
</html>