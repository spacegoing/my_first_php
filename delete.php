<?php 
echo "<pre>";
header('Content-Type: text/html; charset=utf-8');

$conf = require_once "./conf.php";
require_once "./connect.php";
require_once "./functions.php";

// var_dump($_GET);
var_dump($_GET);
if (!isset($_GET['aid'])) {
    echo "非法请求！";
}
$aid = $_GET['aid'];

$db_conn = my_connect($conf);

$table_name = "article";
$sql = "delete from $table_name where aid=$aid";
echo $sql;
// echo $sql;
$res = $db_conn->query($sql);
var_dump($res);
if (!$res) {
    die("无效数据！");
}

redirect2("./index.php", "删除成功！");
?>