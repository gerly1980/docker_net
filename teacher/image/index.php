<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Teacher</title>
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
                    <a class="navbar-brand" href="/teacher">Linux标准化实验平台</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/teacher/homework">
                                我布置的实验
                            </a>
                        </li>
                        <li >
                            <a href="/teacher/system">
                                系统概况
                            </a>
                        </li>
                        <li  class="active">
                            <a href="/teacher/image">
                                镜像管理
                            </a>
                        </li>
                    </ul>

                    <?php
                    include "../../fun/login_status.php";
                    ?>

                </div>
            </nav>

            <table class="table">
                <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        标题
                    </th>
                    <th>
                        开始时间
                    </th>
                    <th>
                        结束时间
                    </th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        操作
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php
                $username = $_SESSION["teacher"];
                include '../../fun/conn.php';
                $conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);
                //                echo "<script>alert('$username')</script>";
                if (!$conn) {
                    exit("连接失败: " . $conn->connect_error);
                }
                $sql = "select homework_teacher.id,homework_teacher.title,
                    homework_teacher.start_time,homework_teacher.end_time,user.id
                    from homework_teacher,user where user.username='$username'
                     and homework_teacher.teacher_id=user.id";
                $result = $conn->query($sql);
                while(list($id,$title,$start_time,$end_time,$user_id) = $result->fetch_row())
                {

                    echo "
                    <tr>
                        <td>
                            $id
                        </td>
                        <td>
                            $title
                        </td>
                        <td>
                            $start_time
                        </td>
                        <td>
                            $end_time
                        </td>
                        <td>
                        ";
                    $sql = "select count(*) from container where homework_id='$id'";
                    $result2 = $conn->query($sql);
                    list($amount) = $result2->fetch_row();
                    //镜像已存在
                    if($amount!=0)
                    {
                        echo "<a href='edit.php?id=$id&user_id=$user_id'>&nbsp;&nbsp;定制</a>";
                        echo "<a href='save.php?id=$id&user_id=$user_id'>&nbsp;&nbsp;保存</a>";
                    }
                    else
                    {
                        echo "<a href='create.php?id=$id&user_id=$user_id'>添加一个镜像</a>";
                    }
                        echo "</td>
                    </tr>
                    ";
                }
                ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>