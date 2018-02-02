<?php

define('SYSTEM_ROOT_E', dirname(__FILE__).'/');
include '../ayangw/common.php';
require_once(SYSTEM_ROOT_E."epay/epay.config.php");
require_once(SYSTEM_ROOT_E."epay/epay_notify.class.php");

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//验证成功
	//商户订单号
	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号
	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];

	$sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$out_trade_no}' limit 1";
   
    $res = $DB->query($sql);
    $srow = $DB->fetch($res);
    if($_GET['trade_status'] == 'TRADE_FINISHED') {
		//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
    }
    else if ($_GET['trade_status'] == 'TRADE_SUCCESS' && $srow['sta']==0) {
        $sql = "update ayangw_order set sta = 1, trade_no = '{$trade_no}' ,endTime = now() where out_trade_no = '{$out_trade_no}'";
        $sql2 = "UPDATE ayangw_km set endTime = now(),out_trade_no = '{$out_trade_no}',trade_no='{$trade_no}',rel ='{$srow['rel']}',stat = 1
        where gid = {$srow['gid']} and stat = 0
        limit  1";
         $DB->query($sql);
         $DB->query($sql2);
        
    }

	echo "success";
}
else {
    //验证失败
    echo "fail";
}
?>