<?php 
echo "<pre>";
header('Content-Type: text/html; charset=utf-8');
require_once "./connect.php";
$conf = require_once "./conf.php";
$db_conn = my_connect($conf);

$table_name = "article";
$sql = "select * from $table_name";

$res = $db_conn->query($sql);

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
    <div style="text-align:center;margin-top: 10px">
		<h3>首页</h3><br>
		<a href="./add.html">添加文章</a><br><br>
	</div>
    <table width="80%" border=1 rules="all" align="center">
        <tr>
			<th>编号</th>
			<th>标题</th>
			<th>作者</th>
			<th>类型</th>
			<th>摘要</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
<?php 
while ($row = $res->fetch_array()):
?>
        <tr>
			<th><?php echo $row['aid']; ?></th>
			<th><?php echo $row['title']; ?></th>
			<th><?php echo $row['author']; ?></th>
			<th><?php echo $row['type']; ?></th>
			<th><?php echo $row['descp']; ?></th>
			<th><?php echo $row['add_time']; ?></th>
			<th><a href="./update.php?aid=<?php echo $row['aid'] ?>">修改</a><br>
			<a href="./remove.php?aid=<?php echo $row['aid'] ?>">删除</a>
			</th>
        </tr>
<?php 
endwhile;
?>
    </table>
</body>
</html>