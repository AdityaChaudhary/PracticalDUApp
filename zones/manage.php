<?php
/**
 * Created by PhpStorm.
 * User: aditya
 * Date: 2019-01-02
 * Time: 14:23
 */

require_once('../Database.php');
ob_start();
session_start();

$message = "";

if (!(isset($_SESSION["login"]) && !empty($_SESSION["login"]))) {
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['product']) && !empty($_POST['product'])) {
        if (isset($_POST['price']) && !empty($_POST['price']) && (int)$_POST['price'] == $_POST['price'] && (int)$_POST['price'] > 0) {

            $db = new Database();
            $conn = $db->connect();

            if ($conn[0]) {

                $query = "INSERT INTO products (name, price) VALUES ('" . $_POST['product'] . "', '" . $_POST['price'] . "')";

                $res = $db->query($conn[1], $query);

                if ($res[0]) {
                    $message = "New product added!";
                    unset($_POST);
                } else {
                    $message = "Database Insert Error";
                }

            } else {
                $message = "Database Error";
            }

        } else {
            $message = "Please enter correct price";
        }
    } else {
        $message = "Please enter product name";
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
        <h4>Manage Products</h4>
        <form class="login-form" action="/zones/manage.php" method="post">
            <input type="text" placeholder="Product Name" name="product" value="<?php echo $_POST['product']; ?>"/>
            <input type="text" placeholder="Price" name="price" value="<?php echo $_POST['price']; ?>"/>
            <button type="submit">Add Product</button>
            <p><?php echo $message; ?></p>
            <p class="message">Go Back? <a href="/zones/dashboard.php">Dashboard</a></p>
        </form>
    </div>
</div>
</body>
</html>