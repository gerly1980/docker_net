<?php
header("Content-Type: text/html;charset=utf-8");
session_start();

$username = $_POST["username"];
$passwd = $_POST["passwd"];


include '../conn.php';
$conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);
if (!$conn) {
    exit("连接失败: " . $conn->connect_error);
}

$conn->query("set names 'utf8'");
$sql = "SELECT username,passwd,type FROM user where username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //找到username
    while ($row = $result->fetch_assoc()) {
        if (md5(md5($passwd)) == $row["passwd"])
        {
            //以下记录下用户所拥有的权限
            if ($row["type"] == 'teacher') {
                $_SESSION['teacher'] = $row["username"];
                echo "<script>url=\"/teacher\";window.location.href=url;</script>";
            }
            else if ($row["type"] == 'student') {
                $_SESSION['student'] = $row["username"];
                echo "<script>url=\"/student\";window.location.href=url;</script>";
            }
            else if ($row["type"] == 'admin') {
                $_SESSION['admin'] = $row["username"];
                echo "<script>url=\"/admin\";window.location.href=url;</script>";
            }
        }
        else {
            echo "<script>alert('用户名或密码不正确!');history.back();</script>";
        }
    }
    mysqli_free_result($result);
} else
{
    //用户名
    echo "<script>alert('用户名或密码不正确!');history.back();</script>";
}
$conn->close();
?>