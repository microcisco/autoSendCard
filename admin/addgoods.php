<?php
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
$title='添加商品';
include './head.php';

$sql = "select * from ayangw_type";
$res =$DB->query($sql);
$t = "";

while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['tName']}</option>";
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
								<a href="#">商品</a>
							</li>
							<li class="active">添加商品</li>

						</ul>
						<!-- .breadcrumb -->

					</div>

					<div class="page-content">

						<div class="row">

							<div class="col-xs-12">

								<div class="panel-body">

									<form method="post" class="form-horizontal">

										<input type="button" name="submit_addsp" id="submit_addsp" value="点击添加" class="btn btn-sm btn-primary pull-right"/>

										<br><br>


										<div class="tab-content">

											<!-- 常规 START -->

											<div class="tab-pane active" id="tab-general">
												<div class="form-group">
													<label class="col-sm-2 control-label">选择改商品的分类</label>
													<div class="col-sm-10">
														<select class="form-control" id="type" name="type" default="">
														<option value="">----    选择商品分类    ----</option>
														<?php echo $t;?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">商品名称</label>
													<div class="col-sm-10">
														<input type="text" name="g_name" id="g_name"  class="form-control">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-2 control-label">商品介绍</label>
													<div class="col-sm-10">
													<input type="text" name="g_info" id="g_info"  class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">商品价格</label>
													<div class="col-sm-10">
														<input type="text" name="g_price" id="g_price"  class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">是否上架</label>
													<div class="col-sm-10">
														<select class="form-control" id="state" name="state" default="">
														<option value='1'>上架</option>
														<option value='0'>停售</option>
														</select>
													</div>
												</div>

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
