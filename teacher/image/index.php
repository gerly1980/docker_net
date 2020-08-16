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
                        <li  class="active">
                            <a href="/teacher/image">
                                镜像管理
                            </a>
                        </li>
                        <li >
                            <a href="/teacher/system">
                                系统概况
                            </a>
                        </li>
                    </ul>

                    <?php
                    include "../../fun/login_status.php"; 
	                    if(!isset($_SESSION["teacher"]))
	                    {
	                    	
	                		echo "<script>url='/';window.location.href=url;</script>";
	                    	exit(0);
	                    }
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
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                //查找用户的教师id和当前用户id
                $sql = "select id from user where username='$username'";
                $resuqlt11 = $conn->query($sql);
                list($u_id) = $resuqlt11->fetch_row();


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
//                    echo "<script>alert('$amount')</script>";
                    //镜像已存在
                    if($amount!=0)
                    {
                        //查找c_id
                        $sql = "select id from container where homework_id='$id' and user_id='$u_id'";
                        $result4 = $conn->query($sql);
                        list($c_id) = $result4->fetch_row();

                        echo "<a href='edit.php?id=$id&user_id=$user_id'>定制容器</a>";
                        echo "&nbsp;&nbsp;";
                        echo "<a href='save.php?id=$id&user_id=$user_id'>保存为镜像</a>";
                        echo "&nbsp;&nbsp;";
                        echo "<a href='delete?id=$c_id'>删除容器</a>";
                    }
                    else
                    {
                        echo "<a href='create.php?id=$id&user_id=$user_id'>添加一个基容器</a>";
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