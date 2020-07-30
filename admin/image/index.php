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
                        <li>
                            <a href="/admin/user">
                                用户管理
                            </a>
                        </li>

                        <li>
                            <a href="/admin/container">
                                容器管理
                            </a>
                        </li>
                        <li class="active">
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

            <p>
                <strong>命名规则:</strong> <br>
                若是<strong>image</strong>，用户id为1，作业id为2，则命名为<strong>i_u1_h2</strong>;
            </p>

            <table class="table">
                <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        镜像名称
                    </th>
                    <th>
                        对应实验
                    </th>
                    <th>
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
                $sql = "select id,image_name,homework_id from image";
                $result = $conn->query($sql);
                while(list($id,$name,$homework_id) = $result->fetch_row())
                {

                    echo "
                    <tr>
                        <td>
                            $id
                        </td>
                        <td>
                            $name
                        </td>
                        <td>
                            $homework_id
                        </td>
                        <td>";
                    //查找name是否在container表中的image_name字段存在，若存在则不可删除
                    $sql = "select count(*) from container where image_name='$name'";
                    $result4 = $conn->query($sql);
                    list($f) = $result4->fetch_row();
                    //不存在
                    if($f == 0)
                    {

                        echo "
                            <a href='delete?id=$id' onclick=\"return confirm('确定删除当前镜像？')\">Delete</a>";
                    }
                    //存在
                    else{

                        echo "
                            <em>存在使用该image的容器，不可删除</em>";
                    }

                    echo "
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