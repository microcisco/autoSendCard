<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>正在为您跳转到支付页面，请稍候...</title>
    <style type="text/css">
        body {margin:0;padding:0;}
        p {position:absolute;
            left:50%;top:50%;
            width:330px;height:30px;
            margin:-35px 0 0 -160px;
            padding:20px;font:bold 14px/30px "宋体", Arial;
            background:#f9fafc url(../assets/load.gif) no-repeat 20px 26px;
            text-indent:22px;border:1px solid #c5d0dc;}
        #waiting {font-family:Arial;}
    </style>
<script>
function open_without_referrer(link){
document.body.appendChild(document.createElement('iframe')).src='javascript:"<script>top.location.replace(\''+link+'\')<\/script>"';
}
</script>
</head>
<body>
<?php

define('SYSTEM_ROOT_E', dirname(__FILE__).'/');
define('SYSTEM_ROOT_INFO', md5($_SERVER['HTTP_HOST']."24K"));
include '../ayangw/common.php';
if(empty($conf['xq_id'])){
    exit("未初始化支付账号！");
}
@header('Content-Type: text/html; charset=UTF-8');

$type=isset($_GET['type'])?$_GET['type']:exit('No type!');


if($type=='alipay' || $type=='tenpay' || $type=='qqpay' || $type=='wxpay'){
	require_once(SYSTEM_ROOT_E."epay/epay.config.php");
	require_once(SYSTEM_ROOT_E."epay/epay_submit.class.php");
	$or = daddslashes($_GET['out_trade_no']);
	//防止修改价格
	$sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$or}' limit 1";
	$row = $DB->get_row($sql);
	if(!$row || $row['money'] != $_GET['money']){
	    exit("验证失败1");
	}
	$sql = "select * from  ayangw_goods where id = ". daddslashes($_GET['gid']);
	$row = $DB->get_row($sql);
	if(!$row || $row['price'] != $_GET['money']){
	    exit("验证失败2");
	}
	$parameter = array(
		"pid" => $conf['xq_id'],//商户ID
		"type" => $_GET['type'],//支付类型
		"notify_url"	=>"http://".$_SERVER['HTTP_HOST'].'/other/epay_notify.php',//异步通知
		"return_url"	=> "http://".$_SERVER['HTTP_HOST'].'/other/epay_return.php',//回调
		"out_trade_no"	=> $_GET['out_trade_no'],//订单编号
		"name"	=> $_GET['name'],//商品名称
		"money"	=> $_GET['money'],//金额
		"sitename"	=> $conf['title']//网站名称
	);
	//建立请求
	
	$alipaySubmit = new AlipaySubmit($alipay_config);
	$html_text = $alipaySubmit->buildRequestForm($parameter,"POST", "正在验证订单并跳转...");
	echo $html_text;


}else{
    echo "错误";
}

?>
<p>正在为您跳转到支付页面，请稍候...</p>
</body>
</html>