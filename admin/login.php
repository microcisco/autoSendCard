<?php
include '../ayangw/common.php';
session_start();
$_SESSION['pass'] = '';
@header('Content-Type: text/html; charset=UTF-8');

$title='用户登录';
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>后台管理中心</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
	body{height:100%;background:#16a085;overflow:hidden;}
	canvas{z-index:-1;position:absolute;}
	</style>	
  	
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="js/jquery.cookie.js"></script>
  <script src="js/ayangw.js"></script>
  <script src="js/jquery.md5.js"></script>
  <script src="../layer/layer.js"></script>
	<script src="js/Particleground.js"></script>
	<script>
	$(document).ready(function() {
	  //粒子背景特效
	  $('body').particleground({
	    dotColor: '#5cbdaa',
	    lineColor: '#5cbdaa'
	  });
	  
	});
	</script>
</head>
<body>
	<div class="login-form">
	<dl class="admin_login">
	 <dt>
	  <strong><?php echo $cof['titile'] ?>发卡平台</strong>
	 </dt>
	 <div class="check-tips" style="text-align:center;color:#fff;"></div>
	 <dd class="user_icon">
	  <input type="text" id="user" name="user" placeholder="用户名" class="login_txtbx" required="required">
	 </dd>
	 <dd class="pwd_icon">
	  <input type="password" id="pass" name="pass" placeholder="密码" class="login_txtbx" required="required">
	 </dd>
	
	 <dd>
	  <input type="button" value="立即登陆" class="submit_btn" id="login_submit">
	 </dd>
	 <dd>
	  <p>Copyright © 2015-2017 <?php echo $cof['titile'] ?> 版权所有
	</p>
	 </dd>
	</dl>
	</div>
	
	
</body></html>
