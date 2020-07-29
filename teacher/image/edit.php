<?php
include '../../fun/conn.php';
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);
//                echo "<script>alert('$username')</script>";

if(isset($_GET["id"]))
    $homework_id = $_GET["id"];
if(isset($_GET["user_id"]))
    $user_id = $_GET["user_id"];

if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}
//先去port表中查一个flag=0的port
$sql = "select port from container where homework_id='$homework_id' and user_id='$user_id' limit 1";
$result = $conn->query($sql);
list($port) = $result->fetch_row();

$str = "使用ssh -p ".$port." root@ip连接,密码为1021822981,完成后在列表保存即可";
echo "<script>alert('$str')</script>;";
echo "<script>url=\"/teacher/image/\";window.location.href=url;</script>";