<?php
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
$title='添加商品';
include './head.php';


$sql = "select * from ayangw_type";
$res = $DB->query($sql);
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
								<a href="#">商品管理</a>
							</li>
							<li class="active">商品分类管理</li>

						</ul>
						<!-- .breadcrumb -->

					</div>

					<div class="page-content">

						<div class="row">

							<div class="col-xs-12">

								<div class="panel-body">

									<form method="post" class="form-horizontal">
										<div class="pull-right">
											<input type="button" name="submit_addtype" id="submit_addtype" value="添加分类" class="btn btn-sm btn-primary"/>
											<input type="button" name="up_type" id="up_type" value="删除该分类" class="btn btn-sm btn-primary"/>
										</div>
										<br><br>
										<div class="tab-content">

											<!-- 常规 START -->

											<div class="tab-pane active" id="tab-general">
												<div class="form-group">
													<label class="col-sm-2 control-label">已添加的分类</label>
													<div class="col-sm-10">
														<select class="form-control" id="g_type" name="type" default="">
														<option value="">----    选择分类    ----</option>
														<?php echo $t;?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">分类名称</label>
													<div class="col-sm-10">
														<input type="text" name="t_name" id="t_name"  class="form-control">
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

