<?php
header("Content-Type: text/html;charset=utf-8");

if(isset($_POST["username"]))
    $username = $_POST["username"];
if(isset($_POST["passwd"]))
    $passwd = $_POST["passwd"];
if(isset($_POST["repasswd"]))
    $re_passwd = $_POST["repasswd"];


if ("$re_passwd" != "$passwd") {
    echo "<script>alert('两次密码输入不一致');history.back();</script>";
} else {
    include '../conn.php';
    $conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

    if (!$conn) {
        exit("连接失败: " . $conn->connect_error);
    }

    $flag = 0;

    $sql = "select count(*) as amount from user where username='$username'";
    $result = $conn->query($sql);
    list($amount) = $result->fetch_row();
    if($amount != 0)
        $flag = 1;
    if($flag == 1)
    {
        echo "<script>alert('用户名已被注册，可直接登录');</script>";
        echo "<script>url=\"/\";window.location.href=url;</script>";
    }
    else
    {
        $md5 = md5(md5($passwd));
        $sql = "INSERT INTO user (username,passwd,teacher_id,time,type)
			VALUES ('$username' ,'$md5','-1',now(),'student')";
        if (mysqli_query($conn, $sql))
        {

            echo "<script>alert('注册成功!');</script>";
            echo "<script>url=\"/\";window.location.href=url;</script>";
        }
        else {
            //echo $conn->error;
            echo "<script>alert('注册失败');</script>";
            echo "<script>url=\"/\";window.location.href=url;</script>";
        }
    }

    $conn->close();
}
?>