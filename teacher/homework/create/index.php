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
                    <a class="navbar-brand" href="/">实验平台 - 创建作业</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    include "../../../fun/login_status.php";
                    ?>

                </div>
            </nav>

            <a href="/teacher/homework"><button type="button" class="btn btn-default" >返回</button></a>
            <form class="form-horizontal" role="form"  action="fun.php" method="post">
                <?php
                include '../../../fun/conn.php';
                $conn = new mysqli($servername, $dbusername, $dbpasswd, $dbname);

                if (!$conn) {
                    exit("连接失败: " . $conn->connect_error);
                }
                $username = $_SESSION["teacher"];
                $sql = "select id from user where username='$username'";
                $result = $conn->query($sql);
                list($idd) = $result->fetch_row();
                $teacher_id = $idd;
                ?>

                <input type="hidden" name="teacher_id" value="<?php echo $teacher_id;?>"/>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id" value="auto" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" autocomplete="off"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">描述</label>
                    <div class="col-sm-10">
                        <textarea name="des" class="form-control" style="resize:none" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">开始时间</label>
                    <div class="col-sm-10">
                        <input name="start_time" id="startTime" type="text" class="form-control"
                               placeholder='开始时间' style="width: 200px;"; autocomplete="off"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">结束时间</label>
                    <div class="col-sm-10">
                        <input name="end_time" id="endTime" type="text" class="form-control"
                               placeholder='结束时间' style="width: 200px;"; autocomplete="off"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default btn-success">Create!</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
</body>


<!--时间选择器-->
<script src="/laydate/laydate.js"></script>
<script>
    function changeDate(){
        var date = new Date();
        var y = date.getFullYear();
        var m = date.getMonth()+1;
        m = m<10 ? ('0'+ m) :m;
        var d = date.getDate();
        d = d<10 ? ('0'+ d) :d;
        var h = date.getHours();
        h = h<10 ? ('0'+ h) :h;
        var i = date.getMinutes();
        i = i<10 ? ('0'+ i) :i;
        var s = date.getSeconds();
        s = s<10 ? ('0'+ s) :s;
        return y+'-'+m+'-'+d+' '+h+':'+i+':'+s;
    }
    var now = changeDate();
    var startTime =laydate.render({
        elem: '#startTime',
        type: 'datetime',
        min: now,
        max: '2035-12-31 12:30:00',
        done: function(value, date, endDate)
        {
            endLayDate.config.min = {
                year: date.year,
                month: date.month - 1,
                date: date.date,
                hours: date.hours,
                minutes: date.minutes,
                seconds: date.seconds +1
            };
        },
    });
    var endLayDate = laydate.render({
        elem: '#endTime',
        type: 'datetime',
        max: '2035-12-31 12:30:00',
        btns: ['clear', 'confirm'],  //clear、now、confirm
        done: function(value, date, endDate) {
            startTime.config.max = {
                year: date.year,
                month: date.month - 1,
                date: date.date,
                hours: date.hours,
                minutes: date.minutes,
                seconds: date.seconds -1
            };
        },
    });
</script>
<!--时间选择器-->
</html>