<?php
include '../ayangw/common.php';
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
$title='商品管理';
include './head.php';
$sql = "select * from ayangw_goods";
$res =$DB->query($sql);

//数组实现分页
$temp= "";
$i = 1;
$arr = array();
while ($row =$DB->fetch($res)){
    $temp .="<tr><td>{$row['id']}</td> <td>{$row['gName']}</td> <td>".stType($row['tpId'],$DB)."</td> <td>{$row['price']}</td>
   <td>".zt($row['state'])."</td><td>".stKmSy($row['id'],$DB)."/".stKmCou($row['id'],$DB)."</td> <td> ".zzt($row['state'],$row['id'])." <span id='{$row['id']}' class='btn btn-xs btn-primary btndel_sp'>删除</span></td></tr>";
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
//查询商品类型
function stType($tpId,$DB){
    $sql = "select * from ayangw_type where id =".$tpId;
    $rest = $DB->query($sql);
    $rowt = $DB->fetch($rest);
    return $rowt['tName'];
}

//查询卡密数量
function stKmCou($gid,$DB){
    $sql = "select count(id) from ayangw_km where gid =".$gid;
    $resg = $DB->count($sql);
    return $resg;
}
//查询剩余卡密数量
function stKmSy($gid,$DB){
    $sql = "select count(id) from ayangw_km where stat = 0 and gid =".$gid;
    $resg = $DB->count($sql);
    return $resg;
}
function zt($z){
    if($z == 0){
        return "<font color='red'>停售</font>";
    }else if($z == 1){
        return "<font>上架中</font>";
    }
}
function zzt($z,$id){
    if($z == 0){
        return "<a href='./clist.php?act=sj&id={$id}' class='btn btn-xs btn-warning '>上架</a>";
    }else{
        return "<a href='./clist.php?act=xj&id={$id}' class='btn btn-xs btn-warning '>下架</a>";
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
								<a href="#">商品管理</a>
							</li>
							<li class="active">商品列表</li>

						</ul>
						<!-- .breadcrumb -->

					</div>

					<div class="page-content">
		<?php 
		    if(!empty($_GET['act'])){
		        if( $_GET['act'] == "xj"){
		            if(!empty($_GET['id']) && $_GET['id'] != ""){
		                $DB->query("update ayangw_goods set state = 0 where id = ".$_GET['id']);
		                echo '<hr/><a href="./clist.php">>>操作完成！请返回</a></div></div>';
		                exit();
		            }
		            echo '<hr/><a href="./clist.php">>>操作失败！请返回</a></div></div>';
		        }else if($_GET['act'] == "sj"){
		            if(!empty($_GET['id']) && $_GET['id'] != ""){
		                $DB->query("update ayangw_goods set state =1 where id = ".$_GET['id']);
		                echo '<hr/><a href="./clist.php">>>操作完成！请返回</a></div></div>';
		                exit();
		            }
		            echo '<hr/><a href="./clist.php">>>操作失败！请返回</a></div></div>';
		        }
		        exit();
		    }
	    ?>
						<div class="page-header">

							<a href="./addgoods.php" class="btn btn-primary">新增商品</a>


						</div>
						<div class="row">

							<div class="col-xs-12">

								<div class="table-responsive">

									<table class="table table-striped table-bordered table-hover">

										<thead>

											<tr>
												<th>商品ID</th>
												<th>商品名称</th>
												<th>商品类型</th>
												<th>价格</th>
												<th>商品状态</th>
												<th>卡密：剩余/总数</th>
												<th>操作</th>

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

										</tbody>

									</table>

								</div>
								
								<div class="page">
									<?php 
									echo "<ul class='pagination'>";
							            if(count($arr)>1){
							                if($page != 1){
							                echo "<li><a href='clist.php?page=1'>首页</a></li>";
							                echo "<li><a href='clist.php?page=".($page-1)."'>上一页</a></li>";
							                }
							                if($page != count($arr)){
							                echo "<li><a href='clist.php?page=".($page+1)."'>下一页</a></li>";
							                echo "<li><a href='clist.php?page=".count($arr)."'>末页</a></li>";
							                }
							                echo "<li><div class='input-group' style='max-width:150px; float:left;'>
										<input type='text' id='txt_page' class='form-control' placeholder='总".count($arr)."页'>
										<span id='but_page' title='clist.php'  alt='".count($arr)."'  class='input-group-addon' style='cursor:pointer'>跳转到</span>
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

