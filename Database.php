<?php
/**
 * Created by PhpStorm.
 * User: aditya
 * Date: 2019-01-02
 * Time: 12:19
 */

class Database
{

    public static $mysql_host = '127.0.0.1';
    public static $mysql_user = 'root';
    public static $mysql_pass = 'root';
    public static $mysql_db = 'du_exam';
    public static $connection;


    public function connect()
    {
        $connection = mysqli_connect(Database::$mysql_host, Database::$mysql_user, Database::$mysql_pass, Database::$mysql_db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            //exit();
            return [false, null];
        }
        return [true, $connection];
    }

    public function query($connection, $query)
    {
        try {
            if ($result = mysqli_query($connection, $query)) {
                //mysqli_free_result($result);
                return [true, $result];
            } else {
                return [false, null];
            }

        } catch (Exception $e) {
            return [false, $e];
        }
    }


    public function dropDatabase()
    {
        try {
            $connection = mysqli_connect(Database::$mysql_host, Database::$mysql_user, Database::$mysql_pass);

            if (!$connection) {
                //echo 'Connected failure<br>';
                return [false, null];
            }
            //echo 'Connected successfully<br>';
            $sql = "DROP DATABASE " . Database::$mysql_db;

            if (mysqli_query($connection, $sql)) {
                //echo "Record deleted successfully";
                mysqli_close($connection);
                return [true, null];
            } else {
                //echo "Error deleting record: " . mysqli_error($conn);
                mysqli_close($connection);
                return [false, null];
            }
        } catch (Exception $e) {
            return [false, $e];
        }

    }

    public function createDatabase()
    {
        try {
            $connection = mysqli_connect(Database::$mysql_host, Database::$mysql_user, Database::$mysql_pass);

            if (!$connection) {
                //echo 'Connected failure<br>';
                return [false, null];
            }
            //echo 'Connected successfully<br>';
            $sql = "CREATE DATABASE " . Database::$mysql_db;

            if (mysqli_query($connection, $sql)) {
                //echo "Record deleted successfully";
                mysqli_close($connection);
                return [true, null];
            } else {
                //echo "Error deleting record: " . mysqli_error($conn);
                mysqli_close($connection);
                return [false, null];
            }
        } catch (Exception $e) {
            return [false, $e];
        }

    }
}