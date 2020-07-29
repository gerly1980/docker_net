<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册 - Linux实验平台</title>
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container_1">
    <div style="flex-direction: column">
        <!--            上下 -->
        <div style="height:150px;text-align: center;padding-top: 60px">
            <span style="font-size: 25px">
                注册账户
            </span>
        </div>
        <!-- 注册 -->
        <div style="height:160px;text-align: center">
            <form style="text-align: center" action="/fun/register/fun.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username"
                           style="display:inline;width:300px;"autocomplete="off" placeholder="账户名"
                            minlength="2"
                    />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="passwd" name="passwd"
                           style="display:inline;width:300px;"autocomplete="off" placeholder="密码"
                        maxlength="15" minlength="6"
                    />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="repasswd" name="repasswd"
                           style="display:inline;width:300px;"autocomplete="off" placeholder="重复"
                           minlength="6"/>
                </div>
                <button type="submit"  class="btn btn-default">注册</button>
                <a href="/fun/login"><button type="button" class="btn btn-default" >返回</button></a>
            </form>
        </div>
    </div>

</div>
</body>
</html>