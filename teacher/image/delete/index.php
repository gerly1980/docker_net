<?php
header("Content-Type: text/html;charset=utf-8");
if(isset($_GET["id"]))
    $id = $_GET["id"];
include '../../../fun/conn.php';
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}


//设置need_create为2，表示需要被删除
$sql = "update container set need_create='2' where id='$id'";
if (mysqli_query($conn, $sql))
{

    echo "<script>url=\"/teacher/image\";window.location.href=url;</script>";

}
else {
    echo $conn->error;
    //echo "<script>alert('保存失败');</script>";
    //echo "<script>url=\"/teacher/homework\";window.location.href=url;</script>";
}


$conn->close();

?>