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

                        <li class="active">
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
                    if(!isset($_SESSION["admin"]))
                    {
                    	
                		echo "<script>url='/';window.location.href=url;</script>";
                    	exit(0);
                    }
                    ?>
                </div>
            </nav>

            <p>
                <strong>命名规则:</strong> <br>
                若是<strong>Container</strong>，用户id为1，作业id为2，则命名为<strong>c_u1_h2</strong>;
                <br>
                若是id为3的学生自行申请的Container  <em>(作业id不存在)</em>  则命名为<strong>c_u3_h-1</strong>;
            </p>

            <table class="table">
                <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        container名称
                    </th>
                    <th>
                        image名称
                    </th>
                    <th>
                        创建者
                    </th>
                    <th>
                        端口
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
                $sql = "select container.id,container_name,image_name,username,port from container,user where user_id=user.id";
                $result = $conn->query($sql);
                echo $conn->error;
                while(list($id,$container_name,$image_name,$username,$port) = $result->fetch_row())
                {

                    echo "
                    <tr>
                        <td>
                            $id
                        </td>
                        <td>
                            $container_name
                        </td>
                        <td>
                            $image_name
                        </td>
                        <td>
                            $username
                        </td>
                        <td>
                            $port
                        </td>
                        <td>
                            <a href='delete?id=$id' onclick=\"return confirm('确定删除当前容器？')\">Delete</a>
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