<?php
if(isset($_POST["id"]))
    $id = $_POST["id"];
if(isset($_POST["username"]))
    $username = $_POST["username"];
if(isset($_POST["teacher_id"]))
    $teacher_id = $_POST["teacher_id"];

include "../../fun/conn.php";
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);
if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}
$conn->query("set names 'utf8'");
$sql = "update user set username='$username',teacher_id='$teacher_id' where id='$id'";
if (mysqli_query($conn, $sql))
{
    //先删除所有与该用户id相关的作业项
    $sql = "delete from homework_student where student_id='$id'";
    if (mysqli_query($conn, $sql))
    {
        //添加teacherid对应的作业项
        $sql = "select id from homework_teacher where teacher_id='$teacher_id'";
        $result = $conn->query($sql);
        while(list($homework_id) = $result->fetch_row())
        {
            echo $homework_id;
            $sql = "insert into homework_student(student_id,homework_id,statu) values('$id','$homework_id','待完成')";
            if (mysqli_query($conn, $sql))
            {
                echo "<script>alert('保存成功！请重新登录');</script>";
                echo "<script>url='/fun/logout/fun.php';window.location.href=url;</script>";
            }
        }
    }
}
else {
    echo "<script>alert('保存失败');</script>";
    echo "<script>url=\"/common/info\";window.location.href=url;</script>";
}
$conn->close();
