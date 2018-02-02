<?php
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
$title='订单管理';
include './head.php';
$sql = "select * from ayangw_order order by id DESC";
$res = $DB->query($sql);

//数组实现分页
$temp= "";
$i = 1;
$arr = array();
while ($row = $DB->fetch($res)){
    $temp .="<tr><td>{$row['id']}</td> <td>".ch($row['trade_no'])."<br>{$row['out_trade_no']}<br></td>  <td>".getName($row['gid'],$DB)."</td>
    <td>".getPayType($row['type'])."<br>￥{$row['money']}</td> <td>{$row['rel']}</td>
    <td>{$row['benTime']}<br>".ch($row['endTime'])."</td> <td>".zt($row['sta'])."</td> <td><span id='{$row['id']}' class='btn btn-xs btn-primary btndel'>删除</span></td></tr>";
    if($i==10){
    array_push($arr,$temp);
    $temp = "";
    $i =0;
    }
    $i++;
    }
    if($temp != ""){
    array_push($arr,$temp);
}
function ch($t){
    if($t == "" || $t ==null){
        return "<font >无</font>";
    }else{
        return $t;
    }

}

function getName($id,$DB){
    $sql = "select * from ayangw_goods where id =".$id;
    $res = $DB->query($sql);
    $row = $DB->fetch($res);
    return $row['gName'];
}

function getPayType($str){
    if($str == "qqpay"){
        return "QQ钱包";
    }
    if($str == "tenpay"){
        return "财付通";
    }
    if($str == "alipay"){
        return "支付宝";
    }
    if($str == "wxpay"){
        return "微信";
    }
}

function zt($z){
    if($z == 0){
        return "<font color='red'>未完成</font>";
    }else if($z == 1){
        return "<font>已完成</font>";
    }
}
?>

<div class="main-container" id="main-container">
    
			<div class="main-container-inner">
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
								<a href="#">订单管理</a>
							</li>
							<li class="active">订单列表</li>

						</ul>
						<!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">

							<button class="btn btn-primary" id="det_allOder">删除所有订单信息</button>

							<button class="btn btn-primary" id="det_wOder">删除未交易成功的订单</button>

						</div>

						<div class="row">

							<div class="col-xs-12">

								<div class="table-responsive">

									<table class="table table-striped table-bordered table-hover">

										<thead>
											 <tr  class="mytr" id="mytr_title">
											 	<th>订单ID</th><th>交易号/<br>商户订单号</th><th>商品名称</th><th>支付类型/<br>价格</th><th>联系方式</th><th>创建时间/<br>完成时间</th><th>交易状态</th><th>操作</th>
											 </tr>						

										</thead>

										<tbody>

											 <?php
											 $page = 1;
											 if(count($arr)>0){
											 if(!empty($_GET['page'])){
											     $page = $_GET['page'];
											 }
											 echo $arr[($page-1)];
											 }
											 ?>
											</table>

										</tbody>

									</table>

								</div>
								
								<div class="page">
									<?php 
            
            
            
            echo "<ul class='pagination'>";
            if(count($arr)>1){
                if($page != 1){
                echo "<li><a href='list.php?page=1'>首页</a></li>";
                echo "<li><a href='list.php?page=".($page-1)."'>上一页</a></li>";
                }
                if($page != count($arr)){
                echo "<li><a href='list.php?page=".($page+1)."'>下一页</a></li>";
                echo "<li><a href='list.php?page=".count($arr)."'>末页</a></li>";
                }
                echo "<li><div class='input-group' style='max-width:150px; float:left;'>
			<input type='text' id='txt_page' class='form-control' placeholder='总".count($arr)."页'>
			<span id='but_page' title='list.php' alt='".count($arr)."' class='input-group-addon' style='cursor:pointer'>跳转到</span>
		</div></li>";
                echo "</ul>";
                
            }
          
            ?>
								</div>

							</div>

						</div>

					</div>
					<!-- /.page-content -->
				</div>
				<!-- /.main-content -->

			</div>
			<!-- /.main-container-inner -->

						

			<?php
			  	include './foot.php';
			?>
