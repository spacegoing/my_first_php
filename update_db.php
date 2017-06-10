<?php
// update article set title='try', author='author' where aid=103;
echo "<pre>";
header('Content-Type: text/html; charset=utf-8');

$conf = require_once "./conf.php";
require_once "./connect.php";
require_once "./functions.php";

// var_dump($_GET);
if (!isset($_GET['aid'])) {
    echo "非法请求！";
}
$aid = $_GET['aid'];

$db_conn = my_connect($conf);

$table_name = "article";
if (!isset($_POST['submit']) || $_POST['submit']!='添加') {
    die("非法请求");
}
$title = isset($_POST['title'])?$_POST['title']:'';
$author = isset($_POST['author'])?$_POST['author']:'';
$type = isset($_POST['type'])?$_POST['type']:'';
$is_show = isset($_POST['is_show'])?$_POST['is_show']:'';
$descp = isset($_POST['descp'])?$_POST['descp']:'';
$content = isset($_POST['content'])?$_POST['content']:'';

if(empty($title) || empty($content)){
    redirect_history('题目 和 内容 不能为空');
}

$sql="update $table_name set title='$title', author='$author', type='$type', is_show='$is_show', descp='$descp', content='$content' where aid=$aid";
echo $sql;
$res = $db_conn->query($sql);

if($res){
    redirect2("./index.php", "修改成功！");
}

    ?>