<?php
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
$title='卡密管理';
include './head.php';
if(!empty($_POST['goods']) && !empty($_POST['txtKm'])){
    $g = $_POST['goods'];
    $str = $_POST['txtKm'];
    $arr = explode("\n",$str);
    if(count($arr) < 1){
        exit("<script>layer.msg('没有获取到有效卡密');window.location.href='addkm.php'</script>") ;
    }
    for($i = 0; $i <count($arr);$i++){
        $sql = "insert into ayangw_km(gid,km,benTime) values({$g},'{$arr[$i]}',now())";
         $DB->query($sql);
    }
    echo "<script>layer.msg('成功添加".count($arr)."张卡密！');window.location.href='addkm.php'</script>";
}

$sql = "select * from ayangw_goods";
$res =  $DB->query($sql);
$t = "";
while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['gName']}</option>";
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
							<li class="active">添加卡密</li>

						</ul>
						<!-- .breadcrumb -->

					</div>

					<div class="page-content">

						<div class="row">

							<div class="col-xs-12">

								<div class="panel-body">

									<form method="post" class="form-horizontal">
										<h3>注意：添加卡密一行一个，不要有空白行。</h3>


										<input type="submit" name="submit_km" id="submit_km" value="添加卡密" class="btn btn-sm btn-primary pull-right"/>

										<br><br>


										<div class="tab-content">

											<!-- 常规 START -->

											<div class="tab-pane active" id="tab-general">
												<div class="form-group">
													<label class="col-sm-2 control-label">选择要添加卡密的商品</label>
													<div class="col-sm-10">
														<select class="form-control" id="goods" name="goods" default="">
															<?php echo $t;?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">卡密</label>
													<div class="col-sm-10">
														<textarea id="txtKm" name="txtKm" class="form-control" rows="50"></textarea>
													</div>
												</div>
												<script type="text/javascript">if (typeof c == 'undefined')	window.close();</script>
											</div>

										</div>
										<!-- /.page-content -->
									</form>
								</div>
								<!-- /.main-content -->

							</div>
							<!-- /.main-container-inner -->

							<?php
							  	include './foot.php';
							?>
