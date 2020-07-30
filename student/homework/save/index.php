<?php
header("Content-Type: text/html;charset=utf-8");

if(isset($_GET["id"]))
    $homework_id = $_GET["id"];
if(isset($_GET["user_id"]))
    $user_id = $_GET["user_id"];


include '../../../fun/conn.php';
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}

//将对应容器need_commit改成1
$sql = "update container set need_commit='1' where homework_id='$homework_id' and user_id='$user_id'";
if (mysqli_query($conn, $sql))
{
    echo "<script>alert('保存成功');</script>";
    echo "<script>url=\"/teacher/image/\";window.location.href=url;</script>";

}