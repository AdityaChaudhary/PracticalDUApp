<!DOCTYPE html>
<html>
<head>
	<title>Reset DB</title>
</head>
<body>
<h3>Reset DB</h3>

<form method="post"><input type="submit" name="reset" value="Reset"></form>

<?php

if(isset($_POST['reset'])){
	$db_host = 'localhost';
	$db_user = 'user';
	$db_pass = 'pass';


	$queries = array(
	"DROP DATABASE IF EXISTS du_exam;",
	"CREATE DATABASE du_exam;");

	$conn = mysqli_connect($db_host,$db_user,$db_pass);

	if (mysqli_connect_errno()){
		echo 'Connection failed';
	}

	foreach ($queries as $q) {
		mysqli_query($conn,$q);
	}

	$queries = array(
	"CREATE TABLE accounts (username text, password text);",
	"CREATE TABLE products (pid int NOT NULL AUTO_INCREMENT, name text, price int, PRIMARY KEY (pid));",
	"INSERT INTO accounts VALUES ('admin','cracker');",
	"INSERT INTO accounts VALUES ('root','phantom');",
	"INSERT INTO products VALUES (1,'Shampoo',100);",
	"INSERT INTO products VALUES (2,'Hair Oil',40);",
	"INSERT INTO products VALUES (3,'Jeans',2000);",
	"INSERT INTO products VALUES (4,'Toothpaste',70);",
	"INSERT INTO products VALUES (5,'Honey',200);",
	"INSERT INTO products VALUES (6,'Soap',150);",
	"INSERT INTO products VALUES (7,'Notebook',140);",
	"INSERT INTO products VALUES (8,'Pen',5);");

	$conn = mysqli_connect($db_host,$db_user,$db_pass,'du_exam');

	if (mysqli_connect_errno()){
		echo 'Connection failed';
	}

	foreach ($queries as $q) {
		mysqli_query($conn,$q);
	}

	echo 'Done!';
}

?>

</body>
</html>
