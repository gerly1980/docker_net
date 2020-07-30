<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Admin</title>
</head>
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
                    <a class="navbar-brand" href="/admin/">Linux标准化实验平台</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/admin/system">
                                系统概况
                            </a>
                        </li>
                        <li class="active">
                            <a href="/admin/user">
                                用户管理
                            </a>
                        </li>

                        <li>
                            <a href="/admin/container">
                                容器管理
                            </a>
                        </li>
                        <li>
                            <a href="/admin/image">
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
                        用户名
                    </th>
                    <th>
                        注册时间
                    </th>
                    <th>&nbsp;&nbsp;&nbsp;
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
                $sql = "select id,username,time from user";
                $result = $conn->query($sql);
                while(list($id,$username,$time) = $result->fetch_row())
                {

                    echo "
                    <tr>
                        <td>
                            $id
                        </td>
                        <td>
                            $username
                        </td>
                        <td>
                            $time
                        </td>
                        <td>
                            <a href='edit?id=$id'>Edit</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href='delete?id=$id' onclick=\"return confirm('确定删除当前用户？')\">Del</a>
                            &nbsp;&nbsp;&nbsp;
                        </td>
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