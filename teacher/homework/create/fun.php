<?php
header("Content-Type: text/html;charset=utf-8");

if(isset($_POST["teacher_id"]))
    $teacher_id = $_POST["teacher_id"];
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


$sql = "INSERT INTO homework_teacher(teacher_id,title,des,start_time,end_time,image_id)
    VALUES ('$teacher_id','$title','$des','$start_time','$end_time','-1')";
if (mysqli_query($conn, $sql))
{

    echo "<script>alert('创建成功!');</script>";
    echo "<script>url=\"/teacher/homework\";window.location.href=url;</script>";
}
else {
    echo "<script>alert('检查输入是否完整');</script>";
    echo "<script>url='history.back()';window.location.href=url;</script>";
}


$conn->close();

?>