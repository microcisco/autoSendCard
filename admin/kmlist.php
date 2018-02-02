<?php
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
$title='卡密列表';
include './head.php';
$sql = "select * from ayangw_km";
$res =  $DB->query($sql);

//数组实现分页
$temp= "";
$i = 1;
$arr = array();
while ($row = $DB->fetch($res)){
    $temp .="<tr><td>{$row['id']}</td> <td>".getName($row['gid'],$DB)."</td> <td>{$row['km']}</td> <td>{$row['benTime']}/<br>{$row['endTime']}</td> <td>{$row['out_trade_no']}/<br>{$row['trade_no']}</td>
    <td>{$row['rel']}</td> <td>".zt($row['stat'])."</td> <td><span id='{$row['id']}' class='btn btn-xs btn-primary btndel_km'>删除</span></td></tr>";
    if($i==10){
        array_push($arr,$temp);
        $temp = "";
        $i =0;
    }
    $i++;
}
function getName($id,$DB){
    $sql = "select * from ayangw_goods where id =".$id;
    $res =  $DB->query($sql);
    $row = $DB->fetch($res);
    return $row['gName'];
}
if($temp != ""){
    array_push($arr,$temp);
}
function zt($z){
    if($z == 1){
        return "<font color='red'>已使用</font>";
    }else if($z == 0){
        return "<font>未使用</font>";
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
								<a href="#">卡密管理</a>
							</li>
							<li class="active">卡密列表</li>

						</ul>
						<!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">

							<button class="btn btn-primary" id="det_allkm">删除所有卡密</button>

							<button class="btn btn-primary" id="det_ykm">删除已使用卡密</button>

						</div>

						<div class="row">

							<div class="col-xs-12">

								<div class="table-responsive">

									<table class="table table-striped table-bordered table-hover">

										<thead>
											 <tr  class="mytr" id="mytr_title">
											     <th>卡密ID</th><th>商品ID</th><th>卡密</th><th>导入时间<br>使用时间</th><th>使用订单<br>使用流水号</th><th>使用者</th><th>状态</th><th>操作</th>
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
						                echo "<li><a href='kmlist.php?page=1'>首页</a></li>";
						                echo "<li><a href='kmlist.php?page=".($page-1)."'>上一页</a></li>";
						                }
						                if($page != count($arr)){
						                echo "<li><a href='kmlist.php?page=".($page+1)."'>下一页</a></li>";
						                echo "<li><a href='kmlist.php?page=".count($arr)."'>末页</a></li>";
						                }
						                echo "<li><div class='input-group' style='max-width:150px; float:left;'>
									<input type='text' id='txt_page' class='form-control' placeholder='总".count($arr)."页'>
									<span id='but_page' title='kmlist.php' alt='".count($arr)."'  class='input-group-addon' style='cursor:pointer'>跳转到</span>
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
