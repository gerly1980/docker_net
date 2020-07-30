<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Student</title>
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
                    <a class="navbar-brand" href="/student">Linux标准化实验平台</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							 <a href="/student/homework">我的作业</a>
						</li>
						<li>
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
                        作业id
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

                    <th>
                        操作
                    </th>
                    <th>
                        虚拟环境
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php
                $username = $_SESSION["student"];
                include '../../fun/conn.php';
                $conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);
//              echo "<script>alert('$username')</script>";
                if (!$conn) {
                    exit("连接失败: " . $conn->connect_error);
                }
                //查找用户的教师id和当前用户id
                $sql = "select id,teacher_id from user where username='$username'";
                $resuqlt11 = $conn->query($sql);
                list($u_id,$t_id) = $resuqlt11->fetch_row();


                $sql = "select id,title,start_time,end_time from homework_teacher where teacher_id='$t_id'";
                $result = $conn->query($sql);
                echo $conn->error;
                while(list($id,$title,$start_time,$end_time) = $result->fetch_row())
                {
                    //查找该作业存不存在虚拟环境
                    $sql = "select count(*) from image where homework_id='$id'";
                    $resuqlt2 = $conn->query($sql);
                    list($amout) = $resuqlt2->fetch_row();

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
                            <a href='details?id=$id'>详情</a>
                        </td>
                        <td>";
                        if($amout == 0 )
                        {
                            echo "尚未配置实验环境";
                        }
                        else
                        {
                            //镜像已存在
                            //查找是否已经有了该用户该作业的实验环境
                            $sql = "select count(*) from container where homework_id='$id' and user_id='$u_id'";
                            $result3 = $conn->query($sql);
                            list($cnt) = $result3->fetch_row();
                            //查找c_id
                            $sql = "select id from container where homework_id='$id' and user_id='$u_id'";
                            $result4 = $conn->query($sql);
                            list($c_id) = $result4->fetch_row();
                            //环境未存在
                            if($cnt == 0)
                            {
                                echo "
                            <a href='create_container?id=$id&user_id=$u_id'>创建实验环境</a>";
                            }
                            else
                            {
                                echo "<a href='edit?id=$id&user_id=$u_id'>操作</a>";
                                echo "&nbsp;&nbsp;";
                                echo "<a href='delete?id=$c_id'>删除</a>";
//                                echo "<a href='save?id=$id&user_id=$user_id'>&nbsp;&nbsp;保存</a>";
                            }

                        }

                        echo"    
                    </td>
                        </a>
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