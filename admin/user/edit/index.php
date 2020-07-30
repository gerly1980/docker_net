<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Admin</title>
</head>

<?php

?>


<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">实验平台 - 个人信息</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    include "../../../fun/login_status.php";
                    ?>

                </div>
            </nav>

            <a href="/admin/user"><button type="button" class="btn btn-default" >返回</button></a>

            <?php
            header("Content-Type: text/html;charset=utf-8");
            session_start();


            $id = $_GET["id"];

            include '../../../fun/conn.php';
            $conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);
            if (!$conn) {
                exit("连接失败: " . $conn->connect_error);
            }
            $conn->query("set names 'utf8'");
            $sql = "SELECT id,username,teacher_id,time,type FROM user where id='$id' limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                //找到username
                while ($row = $result->fetch_assoc())
                {
                    $id = $row["id"];
                    $username = $row["username"];
                    $teacher_id = $row["teacher_id"];
                    $time = $row["time"];
                    $type = $row["type"];
                    echo "<form class='form-horizontal' role='form' action='fun.php' method='post'>
                
                <div class='form-group'>
                    <label for='inputEmail3' class='col-sm-2 control-label'>ID</label>
                    <div class='col-sm-10'>                
                        <input type='text' class='form-control' value='$id' name='id' readonly='readonly'/>
                    </div>
                </div>
                
                <div class='form-group'>
                    <label for='inputEmail3' class='col-sm-2 control-label'>用户名</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' value='$username' name='username'/>
                    </div>
                </div>

                <div class='form-group'>
                    <label for='inputEmail3' class='col-sm-2 control-label'>教师id</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' value='$teacher_id' name='teacher_id'/>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='inputEmail3' class='col-sm-2 control-label'>注册时间</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' value='$time' readonly='readonly' name='time'/>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='inputEmail3' class='col-sm-2 control-label'>账户类型</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control'  value='$type' name='type'/>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-sm-offset-2 col-sm-10'>
                        <button type='submit'  class='btn btn-default btn-success'>Update!</button>
                    </div>
                </div>
            </form>";
                }
                mysqli_free_result($result);
            }
            $conn->close();
            ?>


        </div>
    </div>
</div>
</body>
</html>