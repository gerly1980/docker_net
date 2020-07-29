<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Teacher</title>
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
                    <a class="navbar-brand" href="/teacher/">Linux标准化实验平台</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
                        <li>
                            <a href="/teacher/homework">
                                我布置的实验
                            </a>
                        </li>
                        <li>
                            <a href="/teacher/system">
                                系统概况
                            </a>
                        </li>
                        <li>
                            <a href="/teacher/image">
                                镜像管理
                            </a>
                        </li>
					</ul>
                    <?php
                    include "../fun/login_status.php";
                    ?>
				</div>
			</nav>
			<div class="jumbotron">
				<h1>
					Hello, world!
				</h1>
				<p>
                    这是一个基于docker的标准化linux实验平台。
				</p>
				<p>
					 <a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>