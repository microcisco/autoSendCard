<?php
header("Content-Type: text/html; charset=utf-8");
include 'ayangw/common.php';


if(!empty($_GET['out_trade_no'])){
    $t = $_GET['out_trade_no'];
}else{
    $t = "";
}
$km ="";

if(!empty($_POST['tqm'])){
    $tqm = $_POST['tqm'];
    $sql = "select * from ayangw_km
    where out_trade_no ='{$tqm}' or trade_no = '{$tqm}' or rel = '{$tqm}'
    ORDER BY endTime desc
    limit 1";
    
    $res = $DB->query($sql);
    if($row = $DB->fetch($res)){
        $sql2 = "select * from ayangw_goods where id =".$row['gid'];
        $res2 = $DB->query($sql2);
        $row2 =$DB->fetch($res2);
    }else{
        exit("<script>alert('无此条记录！');window.location.href='getkm.php'</script>");
        
    }
}

$mod=isset($_GET['act'])?$_GET['act']:null;
if($mod == "email"){
   
}

function isEmail($email){
    $mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
    if(preg_match($mode,$email)){
        return true;
    }
    else{
        return false;
    }
}


?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>卡密提取 - <?php echo $conf['title'];?></title>
	<meta name="keywords" content="<?php echo $conf['keywords'];?>" />
	<meta name="description" content="<?php echo $conf['description'];?>" /> 
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/fancy-buttons.css" />
	
	<!--=== Other CSS files ===-->
	<link rel="stylesheet" href="css/animate.css" />
	
	<!--=== Main Stylesheets ===-->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/responsive.css" />
	
	
	
	<!--=== Internet explorer fix ===-->
	<!-- [if lt IE 9]>
		<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif] -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/4.png" media="screen" />
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="layer/layer.js"></script>
  <script src="js/ayangw.js"></script>
  <script type="text/javascript">
  $(function(){
	getPoint($("#tp_tid"));		
	})
  </script>
<style>
img.logo{width:14px;height:14px;margin:0 5px 0 3px;}
</style>
</head>
<body>	
	<!--=== Header section Starts ===-->
	<div id="header" class="header-section">
		<!-- sticky-bar Starts-->
		<div class="sticky-bar-wrap">
			<div class="sticky-section">
				<div id="topbar-hold" class="nav-hold container">
					<nav class="navbar" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
							<!--=== Site Name ===-->
							<a class="site-name navbar-brand" href="/">
								<?php echo $conf['title'];?></a>
						</div>
						
						<!-- Main Navigation menu Starts -->
						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="/">在线购买下单</a></li>
								<li class="current"><a href="getkm.php">订单查询提卡</a></li>
							</ul>
						</div>
						<!-- Main Navigation menu ends-->
					</nav>
				</div>
			</div>
		</div>
		<!-- sticky-bar Ends-->
		<!--=== Header section Ends ===-->
		
		<!--=== Home Section Starts ===-->
		<div id="section-home" class="home-section-wrap center">
			<div class="section-overlay"></div>
			<div class="container home">
				<div class="row">
					<h1 class="well-come">注意事项</h1>
					
					<div class="col-md-8 col-md-offset-2">
						<p class="intro-message">1.联系方式也可以作为你的提卡凭证</p>
						<p class="intro-message">2.必须等待付款完成自动跳转，不可提前关闭页面，否则会导致订单失效，后果自负</p>
						
						<div class="home-buttons">
							<a href="#" class="fancy-button button-line button-white zoom">
								快速
								<span class="icon">
									<i class="fa fa-paper-plane-o"></i>
								</span>
							</a>
							<a href="#" class="fancy-button button-line button-white zoom">
								及时
								<span class="icon">
									<i class="fa fa-clock-o"></i>
								</span>
							</a>
							<a href="#" class="fancy-button button-line button-white zoom">
								稳定
								<span class="icon">
									<i class="fa fa-sign-in"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--=== Home Section Ends ===-->
	</div>

<?php if(empty($_GET['act'])) {?>
	<!--=== Testimonials section Starts ===-->
	<section id="section-testimonials" class="testimonials-wrap" style="min-height: 500px;">
		<div class="section-overlay"></div>
		<div class="container testimonials center animated" data-animation="rollIn" data-animation-delay="500">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form support-form"  action="getkm.php?act=query" method="POST">
						
						<div class="col-lg-12">
							<input id="tqm" value="<?php if($t != ""){ echo $t;}?>" class="input-field form-item field-name placeholder" type="text" required="required" name="tqm" placeholder="输入联系方式/订单编号/商户单号/都可以提取到您的卡密">
						</div>
						<button type="submit" class="fancy-button button-line button-white large zoom subform" id="sub_query">
							提取卡密
							<span class="icon">
								<i class="fa fa-paper-plane-o"></i>
							</span>
						</button>
						<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['zzqq']?>&site=qq&menu=yes" class="fancy-button button-line button-white large zoom subform">
							联系客服
							<span class="icon">
								<i class="fa fa-headphones"></i>
							</span>
						</a>
					</form>
					
				</div>
			</div>
		</div>
	</section>
	<!--=== Testimonials section Ends ===-->

	<?php }elseif ($_GET['act'] == "query") { 
	/**/
	    ?>
	    <section id="section-testimonials" class="testimonials-wrap">
		<div class="section-overlay"></div>
		<div class="container testimonials animated" data-animation="rollIn" data-animation-delay="500">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form support-form" action="getkm.php?act=email&a=<?php echo $row['out_trade_no'];?>&b=<?php echo $row2['gName'];?>&c=<?php echo $row['km'];?>&sj=<?php echo $row['endTime']?>" method="POST">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">订单编号</div>
									<input type="text" name="bh"  value="<?php echo $row['out_trade_no'];?>" class="input-field form-item field-name placeholder" placeholder="" disabled/>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">商品名称</div>
									<input type="text" name="mc" value="<?php echo $row2['gName'];?>" class="input-field form-item field-name placeholder" placeholder="" disabled/>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">成交时间</div>
									<input type="text" name="sj" value="<?php echo $row['endTime']?>" class="input-field form-item field-name placeholder" placeholder="" disabled/>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">您的卡密</div>
									<input type="text" name="km"  value="<?php echo $row['km'];?>" class="input-field form-item field-name placeholder" placeholder="" disabled/>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">发送到邮箱</div>
									<input type="text" name="yx"  value="" class="input-field form-item field-name placeholder" placeholder="请填写您的邮箱地址 比如：888888@qq.com" required/>
								</div>
							</div>
						</div>
						<div class="center">
							<button type="submit" class="fancy-button button-line button-white large zoom subform" id="sub_email">
								发送到邮箱
								<span class="icon">
									<i class="fa fa-paper-plane-o"></i>
								</span>
							</button>
							<a href="http://wpa.qq.com/msgrd?v=3&uin=12345678&site=qq&menu=yes" class="fancy-button button-line button-white large zoom subform">
								联系客服
								<span class="icon">
									<i class="fa fa-headphones"></i>
								</span>
							</a>
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</section>
	
	
	<?php }else if($_GET['act'] == "email"){
	    require_once("./System/functions.php");
	    require_once("./System/ayang.php");
	    header("Content-Type: text/html; charset=utf-8");
	    
	   $bh = $_GET['a'];//订单编号
	    $mc = $_GET['b'];//名称
	    $km = $_GET['c'];//卡密
	     $goal = $_POST['yx'];//目标邮箱
	    $time = $_GET['sj'];//时间
	    if($goal == null || $goal == ""){
	        exit("<script>alert('收件邮箱不能为空！');window.history.go(-1);</script>");
	    }
	    if(isEmail($goal)==false){
	        exit("<script>alert('邮箱格式错误！');window.history.go(-1);</script>");
	    }
	    $content = "<br>　　您购买的商品：".$mc."<br>　　订单编号：".$bh."<br>　　购买时间为：".$time."<br>　　您的卡密为：".$km;
	    $foot = $conf['description'];
	    $fromName = $conf['title'];
	    $str = getM1($goal,$content,$foot,$fromName);
	   
	    $flag = sendMail($goal,$str);
	 
	    if( $flag ){
	        exit("<script>alert('发送成功！');window.location.href='getkm.php';</script>");
	    }else{
	        exit("<script>alert('发送失败！');window.location.href='getkm.php';</script>");
	    }
	    
	} ?>
	<!--=== Footer section Starts ===-->
	<div id="section-footer" class="footer-wrap">
		<div class="container footer center">
			<?php echo $conf['foot']?>
			<div class="row">
				<div class="col-lg-12">
					<p class="copyright">Copyright © 2017 <?php echo $conf['title'];?></p>
				</div>
			</div>
		</div>
	</div>
	<!--=== Footer section Ends ===-->
	
<!--==== Js files ====-->
<!--==== Essential files ====-->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<!--==== Scroll and navigation plugins ====-->
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript" src="js/jquery.appear.js"></script>


<!--==== Custom Script files ====-->
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>