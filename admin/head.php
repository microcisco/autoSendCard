<?php
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
@header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>后台管理中心</title>
  <mata author="QQ:1284790389"/>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<link type="image/x-icon" href="" rel="icon">
		<link type="image/x-icon" href="" rel="bookmark">

		<link rel="stylesheet" href="css/ace.min.css" />
		<link rel="stylesheet" href="css/ace-rtl.min.css" />
		<link rel="stylesheet" href="css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

   
</head>
<body class="navbar-fixed">

  <div class="navbar navbar-default navbar-fixed-top" id="navbar">

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="./" class="navbar-brand">
						<small>
							<!--
							<i class="fa fa-leaf"></i>
							-->
							后台管理中心
						</small>
					</a>
					<!-- /.brand -->
				</div>
				<!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">

								<span class="user-info">
									admin								</span>

								<i class="fa fa-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li class="divider"></li>

								<li>
									<a href="./">平台首页</a>
									<a href="./login.php">退出系统</a>
								</li>
							</ul>
						</li>
					</ul>
					<!-- /.ace-nav -->
				</div>
				<!-- /.navbar-header -->
			</div>
			<!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try {
					ace.settings.check('main-container', 'fixed')
				} catch(e) {}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar sidebar-fixed" id="sidebar">

					<ul class="nav nav-list">

						<li>

							<a href="./list.php" class="dropdown-toggle">

								<i class="fa fa-shopping-cart"></i>

								<span class="menu-text">订单管理</span>

							</a>
						</li>
						<li>

							<a href="#" class="dropdown-toggle">

								<i class="fa fa-key fa-fw"></i>

								<span class="menu-text">卡密管理</span>

								<b class="arrow fa fa-angle-down"></b>

							</a>

							<ul class="submenu">

								<li>

									<a href="./kmlist.php">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">卡密列表</span>

									</a>

								</li>
								<li>

									<a href="addkm.php">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">添加卡密</span>

									</a>

								</li>

							</ul>

						</li>
						<li>

							<a href="#" class="dropdown-toggle">

								<i class="fa fa-gift"></i>

								<span class="menu-text">商品管理</span>

								<b class="arrow fa fa-angle-down"></b>

							</a>

							<ul class="submenu">
								<li>

									<a href="./clist.php">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">商品列表</span>

									</a>

								</li>

								<li>

									<a href="./addgoods.php">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">添加商品</span>

									</a>

								</li>

								<li>

									<a href="./addGType.php">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">商品分类管理</span>

									</a>

								</li>

							</ul>

						</li>
						<li>

							<a href="#" class="dropdown-toggle">

								<i class="fa fa-dashboard"></i>

								<span class="menu-text">系统设置</span>

								<b class="arrow fa fa-angle-down"></b>

							</a>

							<ul class="submenu">

								<li>

									<a href="./set.php?mod=admin">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">管理员配置</span>

									</a>

								</li>

								<li>

									<a href="./set.php?mod=upimg">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">首页背景配置</span>

									</a>

								</li>

								<li>

									<a href="./set.php?mod=site">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">网站信息配置</span>

									</a>

								</li>
								<li>

									<a href="./set.php?mod=email">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">发件邮箱配置</span>

									</a>

								</li>
								<li>

									<a href="./set.php?mod=pay">

										<i class="fa fa-double-angle-right"></i>

										<span class="url-title">支付接口配置</span>

									</a>

								</li>

							</ul>

						</li>

					</ul>

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="fa fa-angle-double-left" data-icon1="fa fa-angle-double-left" data-icon2="fa fa-angle-double-right"></i>
					</div>

					<script type="text/javascript">
						try {
							ace.settings.check('sidebar', 'collapsed')
						} catch(e) {}
					</script>
				</div>
