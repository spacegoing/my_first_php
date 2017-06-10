<?php
// Connecting to and selecting a MySQL database named sakila
// Hostname: 127.0.0.1, username: your_user, password: your_pass, db: sakila
echo "<pre>";
header("content-type:text/html;charset=utf8");

/**
 * my_connect 自定义 MySQL 数据库连接
 *
 * @param array $conf
 * @return mysqli $mysqli
 */
function my_connect($conf=[]){
    $mysqli = new mysqli($conf['host'], $conf['user_name'], $conf['pass'], $conf['db_name']);
    // $mysqli = new mysqli($conf['host'], $conf['user_name'], $conf['$pass'], $conf['$db_name']);
    // Oh no! A connect_errno exists so the connection attempt failed!
    if ($mysqli->connect_errno) {
        // The connection failed. What do you want to do?
        // You could contact yourself (email?), log the error, show a nice page, etc.
        // You do not want to reveal sensitive information

        // Let's try this:
        echo "Sorry, this website is experiencing problems.";

        // Something you should not do on a public site, but this example will show you
        // anyways, is print out MySQL error related information -- you might log this
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        
        // You might want to show them something nice, but we will simply exit
        exit;
    }
    $mysqli->query('set names '.$conf['charset'].';');
    return $mysqli;
}


function query_article_db(){
    $aid=100;

    // Perform an SQL query
    $sql = "SELECT * FROM article WHERE aid = $aid;";
    if (!$result = $mysqli->query($sql)) {
        // Oh no! The query failed.
        echo "Sorry, the website is experiencing problems.";

        // Again, do not do this on a public site, but we'll show you how
        // to get the error information
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    // Phew, we made it. We know our MySQL connection and query 
    // succeeded, but do we have a result?
    if ($result->num_rows === 0) {
        // Oh, no rows! Sometimes that's expected and okay, sometimes
        // it is not. You decide. In this case, maybe actor_id was too
        // large?
        echo "We could not find a match for ID $aid, sorry about that. Please try again.";
        exit;
    }

    $res = $result->fetch_assoc();
    var_dump($res);

    $result->free();
    $mysqli->close();
}