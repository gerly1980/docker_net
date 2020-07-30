<?php
session_start();
$flag = 0 ;
if(isset($_SESSION["teacher"]))
{
    $username = $_SESSION["teacher"];
    $flag = 1;
}
else if(isset($_SESSION["student"]))
{
    $username = $_SESSION["student"];
    $flag = 1;
}else if(isset($_SESSION["admin"]))
{
    $username = $_SESSION["admin"];
    $flag = 1;
}

if($flag == 1)
{
    echo "
					<ul class='nav navbar-nav navbar-right'>
						<li class='dropdown'>
							 <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
							 $username
                                 <strong class='caret'></strong>
                             </a>
							<ul class='dropdown-menu'>
								<li>
									 <a href='/common/info'>个人信息</a>
								</li>
								<li>
									 <a href='/common/passwd_change'>修改密码</a>
								</li>
								<li class='divider'>
								</li>
								<li>
									 <a href='/fun/logout/fun.php'>退出登录</a>
								</li>
							</ul>
						</li>
					</ul>";
}
else
{
    echo "
					<ul class='nav navbar-nav navbar-right'>
						<li class='dropdown'>
							 <a href='/fun/login' >
							 登录
                             </a>
						</li>
					</ul>";
}