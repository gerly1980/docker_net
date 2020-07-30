<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Student</title>
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
                    <a class="navbar-brand" href="/student/">Linux标准化实验平台</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							 <a href="/student/homework">我的作业</a>
						</li>
						<li class="active">
							 <a href="/student/apply">申请虚拟主机</a>
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
                        用户id
                    </th>
                    <th>
                        用户名
                    </th>
                    <th>
                        使用镜像
                    </th>
                    <th>
                        虚拟环境
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(isset($_SESSION["student"]))
                    $username = $_SESSION["student"];
                //查找user_id


                include '../../fun/conn.php';
                $conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

                if (!$conn) {
                    exit("连接失败: " . $conn->connect_error);
                }
                $sql = "select id from user where username='$username'";
                $resuqlt = $conn->query($sql);
                list($u_id) = $resuqlt->fetch_row();
                //根据命名规则，该环境名称应为c_uuser_id
                $container_name = "c_u".$u_id."_h-1";
                // echo "<script>alert('$container_name')</script>";
                    echo "
                <tr>
                    <td>$u_id</td>
                    <td>$username</td>
                    <td>CentsOS7</td>
                    <td>";


                //查找是否已经有了该用户该作业的实验环境
                $sql = "select count(*) from container where container_name='$container_name'";
                $result3 = $conn->query($sql);
                list($cnt) = $result3->fetch_row();
                //查找c_id
                $sql = "select id from container where container_name='$container_name'";
                $result4 = $conn->query($sql);
                list($c_id) = $result4->fetch_row();
                //环境未存在
                if($cnt == 0)
                {
                    echo "
                            <a href='create_container?user_id=$u_id'>创建实验环境</a>";
                }
                else
                {
                    echo "<a href='edit?user_id=$u_id'>操作</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='delete?id=$c_id'>删除</a>";
//                                echo "<a href='save?id=$id&user_id=$user_id'>&nbsp;&nbsp;保存</a>";
                }

                    echo "</td>
                </tr>";
                ?>

                </tbody>
            </table>

		</div>
	</div>
</div>
</body>
</html>