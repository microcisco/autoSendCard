<?php
//decode by QQ:270656184 http://www.yunlu99.com/

/**
 * 后台管理中心
**/
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
$title='后台管理';
include './head.php';
$r1 = $DB->count("SELECT COUNT(id) from ayangw_order");
$r2 = $DB->count("SELECT COUNT(id) from ayangw_order  where sta = 1");
$r3 =$DB->count("select COUNT(id) from ayangw_km");
$r4 = $DB->count("SELECT COUNT(id) from ayangw_km  where stat = 0");
$r5 =$DB->count("SELECT COUNT(id) from ayangw_km  where stat = 1");
$r6 = $DB->count("select COUNT(id)
from ayangw_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now())");
$r7 =$DB->count("select SUM(money)
from ayangw_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now()) and sta = 1");
?>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try {
								ace.settings.check('breadcrumbs', 'fixed')
							} catch(e) {}
						</script>

						<ul class="breadcrumb">

							<li>
								<i class="fa fa-home home-icon"></i>
								<a href="#">首页</a>
							</li>
							<li class="active">首页</li>

						</ul>
						<!-- .breadcrumb -->

					</div>

					<div class="page-content">

						<link rel="stylesheet" href="css/index.css" />

						<div class="row">

							<div class="col-xs-12">

								<div class="row">

									<div class="col-lg-3 col-md-3 col-sm-6">

										<div class="tile">

											<div class="tile-heading">

												今日订单

											</div>

											<div class="tile-body">

												<i class="fa fa-shopping-cart"></i>

												<h2 class="pull-right"><?php echo $r6?></h2>

											</div>

											<div class="tile-footer">

												<a href="list.php">显示详细...</a>

											</div>

										</div>

									</div>
									
									<div class="col-lg-3 col-md-3 col-sm-6">

										<div class="tile">

											<div class="tile-heading">

												订单总数

											</div>

											<div class="tile-body">

												<i class="fa fa-shopping-cart"></i>

												<h2 class="pull-right"><?php echo $r1?></h2>

											</div>

											<div class="tile-footer">

												<a href="list.php">显示详细...</a>

											</div>

										</div>

									</div>


									<div class="col-lg-3 col-md-3 col-sm-6">

										<div class="tile">

											<div class="tile-heading">

												交易完成
											</div>

											<div class="tile-body">

												<i class="fa fa-credit-card"></i>

												<h2 class="pull-right"><?php echo $r2?></h2>

											</div>

											<div class="tile-footer">

												<a href="list.php">显示详细...</a>

											</div>

										</div>

									</div>

									<div class="col-lg-3 col-md-3 col-sm-6">

										<div class="tile">

											<div class="tile-heading">

												今日成交额


											</div>

											<div class="tile-body">

												<i class="fa fa-user"></i>

												<h2 class="pull-right"><?php if($r7 != ""){ echo round($r7,2);}else{ echo "0";};?>元</h2>

											</div>

											<div class="tile-footer">

												<a href="list.php">显示详细...</a>

											</div>

										</div>

									</div>

								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-6">

										<div class="tile">

											<div class="tile-heading">

												卡密总数


											</div>

											<div class="tile-body">

												<i class="fa fa-shopping-cart"></i>

												<h2 class="pull-right"><?php echo $r3?></h2>

											</div>

											<div class="tile-footer clearfix">

												<span class="pull-left">剩余：<?php echo $r4?></span>
												<span class="pull-right">已卖出：<?php echo $r5?></span>
											</div>

										</div>

									</div>
									
								</div>
							
								</div>

							</div>

						</div>

					</div>
					<!-- /.page-content -->
				</div>
				<!-- /.main-content -->

			</div>
			<!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="fa fa-double-angle-up fa fa-only bigger-110"></i>
			</a>
		</div>
		<!-- /.main-container -->

<!--
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">后台管理首页</h3></div>
          <ul class="list-group">
         
			<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b></b>订单总数:　　交易完成:　　今日订单数:　　今日成交金额:￥
			
			</li>
			<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b></b>卡密总数: 　剩余:<?php echo $r4?>　已卖出:<?php echo $r5?>
			
			</li>
            <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b><?php echo date("Y-m-d h:i:sa")?>  </li>
			<li class="list-group-item"><span class="glyphicon glyphicon-home"></span> <a target="_blank" href="../" class="btn btn-xs btn-primary">平台首页</a>&nbsp;<a href="./list.php" class="btn btn-xs btn-success">订单管理</a>&nbsp;<a href="./kmlist.php" class="btn btn-xs btn-warning">卡密列表</a>&nbsp;<a href="./clist.php" class="btn btn-xs btn-warning">商品列表</a>
			</li>
          </ul>
      </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">网站信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>当前网站名称：</b><?php echo $conf['title'] ?>
		</li>
		<li class="list-group-item">
			<b>当前网站域名：</b><?php echo $_SERVER['HTTP_HOST'] ?>
		</li>
		<li class="list-group-item">
			<b>网站客服QQ：</b><?php echo $conf['zzqq'] ?>
		</li>
	</ul>
</div>

    </div>	
  </div>-->
<?php
  	include './foot.php';
?>