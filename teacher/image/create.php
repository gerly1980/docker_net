<?php
header("Content-Type: text/html;charset=utf-8");

if(isset($_GET["id"]))
    $homework_id = $_GET["id"];
if(isset($_GET["user_id"]))
    $user_id = $_GET["user_id"];

include '../../fun/conn.php';
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}

//先去port表中查一个flag=0的port
$sql = "select port from port where flag=0 limit 1";
$result = $conn->query($sql);
list($port) = $result->fetch_row();


$container_name = "c_h".$homework_id;
$sql = "INSERT INTO container(homework_id,user_id,need_create,need_commit,port,container_name,image_name)
    VALUES ('$homework_id','$user_id','1','1','$port','$container_name','ssh:v1')";
if (mysqli_query($conn, $sql))
{
    $sql = "update port set flag='1' where port='$port'";
    if (mysqli_query($conn, $sql))
    {
        echo "<script>alert('创建成功');</script>";
        echo "<script>url=\"/teacher/image/\";window.location.href=url;</script>";
    }
}
else {
    echo $conn->error;
    echo "<script>alert('创建失败');</script>";
//    echo "<script>url=\"/teacher/image/\";window.location.href=url;</script>";
}


$conn->close();

?>