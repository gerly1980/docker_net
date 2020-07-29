<?php
header("Content-Type: text/html;charset=utf-8");
if(isset($_POST["id"]))
    $id = $_POST["id"];
if(isset($_POST["title"]))
    $title = $_POST["title"];
if(isset($_POST["des"]))
    $des = $_POST["des"];
if(isset($_POST["start_time"]))
    $start_time = $_POST["start_time"];
if(isset($_POST["end_time"]))
    $end_time = $_POST["end_time"];

include '../../../fun/conn.php';
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}


$sql = "update homework_teacher set title='$title',des='$des',start_time='$start_time',end_time='$end_time' 
    where id='$id'";
if (mysqli_query($conn, $sql))
{

    echo "<script>url=\"/teacher/homework/edit?id=$id\";window.location.href=url;</script>";
}
else {
    echo $conn->error;
    //echo "<script>alert('保存失败');</script>";
    //echo "<script>url=\"/teacher/homework\";window.location.href=url;</script>";
}


$conn->close();

?>