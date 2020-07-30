<?php
header("Content-Type: text/html;charset=utf-8");
if(isset($_GET["id"]))
    $id = $_GET["id"];
include '../../../fun/conn.php';
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}


$sql = "update image set need_del='1' where id='$id'";
if (mysqli_query($conn, $sql))
{

    echo "<script>url=\"/admin/image\";window.location.href=url;</script>";

}
else {
    echo $conn->error;
    //echo "<script>alert('保存失败');</script>";
    //echo "<script>url=\"/teacher/homework\";window.location.href=url;</script>";
}


$conn->close();

?>