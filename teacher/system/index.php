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
                        <li>
                            <a href="/teacher/image">
                                镜像管理
                            </a>
                        </li>
                        <li  class="active">
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
			<div class="jumbotron">
				<p>
                    <?php
                    echo "<b>服务器系统版本:</b><br>";
                    echo php_uname()."<br>";
                    echo "<b>服务器解释环境:</b><br>";
                    // 获取服务器解译引擎 / 运行环境
                    echo $_SERVER['SERVER_SOFTWARE']."<br>";
                    echo "<b>服务器当前时间:</b><br>";
                    // 服务器当前时间
                    echo date("Y-m-d H:i:s")."<br>";
                    echo "<b>服务器语言:</b><br>";
                    // 获取服务器语言
                    echo $_SERVER['HTTP_ACCEPT_LANGUAGE']."<br>";
                    echo "<b>服务器WEB端口:</b><br>";
                    // 获取服务器Web端口
                    echo $_SERVER['SERVER_PORT']."<br>";
                    echo "<b>采用的通信协议版本:</b><br>";
                    // 获取请求页面时通信协议的名称和版本
                    echo $_SERVER['SERVER_PROTOCOL']."<br>";


                    ?>

                </p>
			</div>
		</div>
	</div>
</div>
</body>
</html>