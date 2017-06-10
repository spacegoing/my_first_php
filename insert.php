<?php 
echo "<pre>";
header('Content-Type: text/html; charset=utf-8');
require_once "./connect.php";
$conf = require_once "./conf.php";
require_once "./functions.php";
require_once "./file_upload.php";

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

$pic_path = save_file($_FILES);

$db_conn = my_connect($conf);
$table_name = "article";
$sql = "insert into $table_name(title, author, type, is_show, descp, content, pic_path) values ('$title', '$author', '$type', '$is_show', '$descp', '$content', '$pic_path');";

$res = $db_conn->query($sql);

// var_dump($res);

redirect2("./index.php","成功保存文章！");

// array(7) {
//   ["title"]=>
//   string(10) "1st_insert"
//   ["author"]=>
//   string(18) "apoifjaoijfaoipwjf"
//   ["type"]=>
//   string(6) "科技"
//   ["is_show"]=>
//   string(3) "yes"
//   ["descp"]=>
//   string(20) "apowfijaopwjfpoawijf"
//   ["content"]=>
//   string(60) "    aowiefjapoijfpoiajfpoaijefpoiajfpoiafjpoaewjff"
//   ["submit"]=>
//   string(6) "添加"
// }
// array(1) {
//   ["myFile"]=>
//   array(5) {
//     ["name"]=>
//     string(20) "inner_outer_join.png"
//     ["type"]=>
//     string(9) "image/png"
//     ["tmp_name"]=>
//     string(14) "/tmp/phpACGJ3X"
//     ["error"]=>
//     int(0)
//     ["size"]=>
//     int(162672)
//   }
// }
?>
