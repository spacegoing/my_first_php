<?php 
echo "<pre>";
header('Content-Type: text/html; charset=utf-8');

$conf = require_once "./conf.php";
require_once "./connect.php";

// var_dump($_GET);
var_dump($_GET);
if (!isset($_GET['aid'])) {
    echo "非法请求！";
}
$aid = $_GET['aid'];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>确认要删除吗？</h3>
    <a href="./delete.php?aid=<?php echo $aid ?>">确认</a>
    <a href="./index.php">取消</a>
</body>
</html>
