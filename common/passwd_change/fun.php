<?php
if(isset($_POST["username"]))
    $username = $_POST["username"];
if(isset($_POST["oldpasswd"]))
    $oldpasswd = $_POST["oldpasswd"];
if(isset($_POST["passwd"]))
    $passwd = $_POST["passwd"];
if(isset($_POST["repasswd"]))
    $repasswd = $_POST["repasswd"];

include "../../fun/conn.php";

$flag = 0 ;
if($passwd != $repasswd)
{
    $flag = 1;
    echo "<script>alert('两次密码输入不一致');history.back();</script>";
}
if($flag == 0)
{

    $conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);
    if (!$conn) {
        exit("连接失败: " . $conn->connect_error);
    }

    $conn->query("set names 'utf8'");
    $sql = "SELECT username,passwd FROM user where username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //找到username
        while ($row = $result->fetch_assoc()) {
            if (md5(md5($oldpasswd)) == $row["passwd"])
            {
                $passwd_md5 = md5(md5($passwd));
                $sql = "update user set passwd='$passwd_md5' where username='$username'";
                if (mysqli_query($conn, $sql))
                {
                    echo "<script>alert('保存成功！请重新登录');</script>";
                    echo "<script>url='/fun/logout/fun.php';window.location.href=url;</script>";
                }
                else {
                    echo "<script>alert('保存失败');</script>";
                    echo "<script>url=\"/common/info\";window.location.href=url;</script>";
                }


                echo "<script>url=\"/\";window.location.href=url;</script>";
            }
            else {
                echo "<script>alert('原密码不正确');history.back();</script>";
            }
        }
        mysqli_free_result($result);
    } else
    {
        //用户名
        echo "<script>alert('用户名或密码不正确!');history.back();</script>";
    }
    $conn->close();
}
