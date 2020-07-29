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
                    <a class="navbar-brand" href="/">实验平台 - 修改密码</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    include "../../fun/login_status.php";
                    ?>

                </div>
            </nav>

            <a href="/"><button type="button" class="btn btn-default" >返回</button></a>
            <form class="form-horizontal" role="form"  action="fun.php" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">原密码</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="username" value="<?php echo "$username";?>">
                        <input type="password" class="form-control" id="inputEmail3" name="oldpasswd"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="passwd"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">重复</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="repasswd"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default btn-success">Update!</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>