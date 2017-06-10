<?php
echo "<pre>";
header('Content-Type: text/html; charset=utf-8');

$conf = require_once "./conf.php";
require_once "./connect.php";

// var_dump($_GET);
if (!isset($_GET['aid'])) {
    echo "非法请求！";
}
$aid = $_GET['aid'];

$db_conn = my_connect($conf);

$table_name = "article";
$sql = "select title, author, type, is_show, descp, content, pic_path from $table_name where aid = $aid";
// echo $sql;
$res = $db_conn->query($sql);
// var_dump($res);
if (!$res) {
    die("无效数据！");
}
$res = $res->fetch_assoc();
// var_dump($res);
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
        <div style="text-align: left">
            <h4>添加文章</h4>
            <a href="./index.php">回到首页</a><br><br>
        </div>
        <form action="./update_db.php?aid=<?php echo $aid ?>" method="POST" enctype="multipart/form-data">
            <!-- 包括标题，作者，类型（新闻，娱乐，财经，科技），是否立即发布，插图，摘要，内容 -->
            <table align="left" width="60%">
                <tr>
                    <th>标题</th>
                    <td><input type="text" name="title" id="" value=<?php echo $res['title'] ?>></td>
                </tr>
                <tr>
                    <th>作者</th>
                    <td><input type="text" name="author" id="" value=<?php echo $res['author'] ?>></td>
                </tr>
                <tr>
                    <th>类型</th>
                    <td>
                        <select name="type" id="">
                    <option value="科技" <?php echo $res['type']=='科技'?'selected':'' ?>>科技</option>
                    <option value="新闻" <?php echo $res['type']=='新闻'?'selected':'' ?>>新闻</option>
                    <option value="娱乐" <?php echo $res['type']=='娱乐'?'selected':'' ?>>娱乐</option>
                    <option value="八卦" <?php echo $res['type']=='八卦'?'selected':'' ?>>八卦</option>
                </select></td>
                </tr>
                <tr>
                    <th>是否立即发布</th>
                    <td>
                        <input type="radio" name="is_show" id="" value="yes" checked=<?php echo $res['type']=='yes'?'checked':'' ?>>立即发布
                        <input type="radio" name="is_show" id="" value="no" checked=<?php echo $res['type']=='yes'?'checked':'' ?>>存为草稿
                    </td>
                </tr>
                <tr>
                    <th>摘要</th>
                    <td><textarea name="descp" id="" cols="30" rows="5"><?php echo $res['descp'] ?></textarea></td>
                </tr>
                <tr>
                    <th>文章插图</th>
                    <td><input type="file" name="myFile" id=""></td>
                </tr>
                <tr>
                    <th>内容</th>
                    <td><textarea name="content" id="" cols="30" rows="10"><?php echo $res['content'] ?></textarea></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" name='submit' value="添加"></td>
                </tr>
            </table>
        </form>
        <!-- 富文本编辑器ueditor -->
        <script charset="utf-8" src="ueditor/kindeditor-min.js"></script>
        <script charset="utf-8" src="ueditor/lang/zh_CN.js"></script>
        <script>
            var editor;
            KindEditor.ready(function (K) {
                editor = K.create('textarea[name="content"]', {
                    allowFileManager: true
                });
            });

        </script>
        <!-- 富文本编辑器ueditor -->
    </body>

    </html>
