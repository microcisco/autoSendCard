<?php
session_start();
include '../ayangw/common.php';
@header('Content-Type: application/json; charset=UTF-8');
if(empty($_GET['act'])){
    exit("非法访问！");
}else{
    $act=$_GET['act'];
}
if($act == 'checkLogin'){
        $user = addslashes(trim($_POST['user']));
        $pass = addslashes(trim($_POST['pass'])); 
       
        if($user == $conf['admin'] && md5($pass) == $conf['pwd']){
			$_SESSION['pass'] = md5($pass);
            exit('{"code":1,"msg":"登陆成功"}');
        }else{
            exit('{"code":0,"msg":"用户名或密码错误"}');
        }
}
if($_SESSION['pass'] != $conf['pwd']){header("location:".$siteurl."login.php");exit;}
switch ($act){
        //删除订单
    case 'delOrd': 
        $id = $_POST['id'];
        $sql = "delete from ayangw_order where id = ".$id;
        $b = $DB->query($sql);
        if($b > 0){
            exit('{"code":1,"msg":"删除成功"}');
        }else{
            exit('{"code":-1,"msg":"删除失败"}');
        }
        ;break;
       //删除卡密
    case 'delKm': 
            $id = $_POST['id'];
            $sql = "delete from ayangw_km where id = ".$id;
            $b = $DB->query($sql);
            if($b > 0){
                exit('{"code":1,"msg":"删除成功"}');
            }else{
                exit('{"code":-1,"msg":"删除失败"}');
            }
            ;break;
            //删除商品
     case 'delSp':
                $id = $_POST['id'];
                $sql = "delete from ayangw_goods where id = ".$id;
                $b = $DB->query($sql);
                if($b > 0){
                    $sql = "delete from ayangw_km where gid = ".$id;
                   $DB->query($sql);
                    exit('{"code":1,"msg":"删除成功"}');
                }else{
                    exit('{"code":-1,"msg":"删除失败"}');
                }
                ;break;
     case 'addSp':
                $tpId = $_POST['tid'];
                $gName = $_POST['gName'];
                $price = $_POST['price'];
                $state = $_POST['state'];
                $gInfo = $_POST['gInfo'];
                $sql = "insert into ayangw_goods(gName,gInfo,tpId,price,state) values('{$gName}','$gInfo',{$tpId},{$price},{$state})";
                $b = $DB->query($sql);
               
                if($b > 0){
                    exit('{"code":1,"msg":"添加成功"}');
                }else{
                    exit('{"code":-1,"msg":"添加失败"}');
                }
               ;break;
   case 'delType':
       $id = $_POST['tid'];
       $sql = "select * from ayangw_goods where tpid = ".$id;
       $res = $DB->query($sql);
       if($row = $DB->fetch($res)){
           exit('{"code":-1,"msg":"该分类下面还有商品！请先删除商品后再删除分类！"}');
       }
       $sql = "delete from ayangw_type where id =".$id;
       $b =  $DB->query($sql);
       if($b > 0){
           exit('{"code":1,"msg":"删除成功"}');
       }else{
           exit('{"code":-1,"msg":"删除失败"}');
       }
       ;break;    
   case 'AddType':
       $tName = $_POST['tName'];
       $sql = "insert into ayangw_type(tName) values('".$tName."')";
       $b =  $DB->query($sql);
       if($b > 0){
           exit('{"code":1,"msg":"添加成功"}');
       }else{
           exit('{"code":-1,"msg":"添加失败"}');
       }
       ;break;
   case 'upWeb':
       $i = 0;
       foreach ($_POST as $k => $value) {
           $value=daddslashes($value);
           $DB->query("insert into ayangw_config set `ayangw_k`='{$k}',`ayangw_v`='{$value}' on duplicate key update `ayangw_v`='{$value}'");
       }
       /*$sql = "update ayangw_web set web_name = '{$n}',web_title = '{$t}',web_keywords = '{$k}',web_notice = '{$nt}',web_url = '{$u}',web_qq = '{$q}' where web_admin = '{$a}'";
       $b = $DB->query($sql);*/
       if(1 > 0){
           exit('{"code":1,"msg":"修改成功"}');
       }else{
           exit('{"code":-1,"msg":"修改失败"}');
       }
       ;break;
       
   case 'upEpay':
        $i = 0;
       foreach ($_POST as $k => $value) {
           $i++;
           $value=daddslashes($value);
           $DB->query("insert into ayangw_config set `ayangw_k`='{$k}',`ayangw_v`='{$value}' on duplicate key update `ayangw_v`='{$value}'");
       }
       if($i > 0){
           exit('{"code":1,"msg":"修改成功"}');
       }else{
           exit('{"code":-1,"msg":"修改失败"}');
       }
       ;break;
   case 'upEmail':
     $i = 0;
       foreach ($_POST as $k => $value) {
           $i++;
           $value=daddslashes($value);
           $DB->query("insert into ayangw_config set `ayangw_k`='{$k}',`ayangw_v`='{$value}' on duplicate key update `ayangw_v`='{$value}'");
       }
       if($i > 0){
           exit('{"code":1,"msg":"修改成功"}');
       }else{
           exit('{"code":-1,"msg":"修改失败"}');
       }
       ;break;
  
   case 'upAdmin':
       $u= $_POST['u'];//用户名
       $p = md5($_POST['p']);//密码
       $b = $DB->query("update `ayangw_config` set `ayangw_v` ='{$p}' where `ayangw_k`='pwd'");
       if($b > 0){
           exit('{"code":1,"msg":"修改成功"}');
       }else{
           exit('{"code":-1,"msg":"修改失败"}');
       }
       ;break;
   case 'det_allkm':
       $sql = "delete from ayangw_km";
       $b =  $DB->query($sql);
       if($b > 0){
           exit('{"code":1,"msg":"删除成功"}');
       }else{
           exit('{"code":-1,"msg":"删除失败"}');
       }
       ;break;
   case 'det_ykm':
       $sql = "delete from ayangw_km where stat = 1";
       $b = $DB->query($sql);
       if($b > 0){
           exit('{"code":1,"msg":"删除成功"}');
       }else{
           exit('{"code":-1,"msg":"删除失败"}');
       }
       ;break;
   case 'det_allOder':
       $sql = "delete from ayangw_order";
       $b =  $DB->query($sql);
       if($b > 0){
           exit('{"code":1,"msg":"删除成功"}');
       }else{
           exit('{"code":-1,"msg":"删除失败"}');
       }
       ;break;
   case 'c':
           $url = $http."?host=".$_SERVER['HTTP_HOST']."&type=".TYPE;
           $sc = get_curl($url);
           $obj=(array)json_decode($sc);
           if($obj['code'] == -1){
               exit('{"code":-1}');
           }else{
               exit('{"code":1}');
           }
           ;break;
   case 'det_wOder':
           $sql = "delete from ayangw_order where sta = 0";
           $b =  $DB->query($sql);
           if($b > 0){
               exit('{"code":1,"msg":"删除成功"}');
           }else{
               exit('{"code":-1,"msg":"删除失败"}');
           }
           ;break;
    default:;break;
}


?>