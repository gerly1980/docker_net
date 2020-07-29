<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Welcome - Linux实验平台</title>
</head>

<?php
    session_start();
    if(isset($_SESSION["teacher"]))
    {
        echo "<script>url=\"/teacher\";window.location.href=url;</script>";
    }
    else if(isset($_SESSION["student"]))
    {
        echo "<script>url=\"/student\";window.location.href=url;</script>";
    }
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
                    <a class="navbar-brand" href="/student/">Linux标准化实验平台</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                操作
                                <strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/fun/login">登录</a>
                                </li>
                                <li>
                                    <a href="/fun/register">注册</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">关于我们</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
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