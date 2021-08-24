这是一个linux实验平台。您可以使用默认的镜像定制一个容器，提交保存后将自动打包成镜像，并推送给对应的学生账户。学生申请实验环境后可直接使用ssh连接。后台可管理正在运行的容器或现有的镜像。

该系统基于lamp docker python3。

在根目录下使用`nohub python3 py/test.py &`命令开启容器分配服务。

体验账号: teacher 123 student 123 admin 123
