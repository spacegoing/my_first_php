<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 10:33:32
 */
echo "<pre>";
header('Content-Type: text/html; charset=utf-8');

// 封装目标
// 连接数据库
// 设置字符集
// 选择数据库

// $conf =require "./conf.php";

/**
 * [my_connect 自定义数据库连接及字符集、数据库设置]
 * @param  array  $conf [服务器的配置参数]
 * @return [resource]       [成功的数据库连接]
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

// 参数

// 调用测试
// $db_conn = my_connect($conf);
// var_dump($db_conn);
// echo "<font color='#DB2525'>".mysql_error()."</font>";
