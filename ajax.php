<?php
include 'ayangw/common.php';
@header('Content-Type: application/json; charset=UTF-8');

if(empty($_GET['act'])){
    exit("非法访问！");
}else{
    $act=$_GET['act'];
}

switch ($act){
    //异步获取商品
    case 'selgo': 
       $select = "<option>请选择商品</option>";
        $tpID = $_POST['tyid'];
        $sql = "select * from ayangw_goods where  state =1 and tpId = ".$tpID;
        $res = $DB->query($sql);
       $i=1;
        while ($row =$DB->fetch($res)){
            $c = $DB->count("SELECT COUNT(id) from ayangw_km  where stat = 0 and gid =".$row['id']);
          $select.="<option id='".$row['id']."' value='".$row['gName']."'kc='".$c."'  title='".$row['price']."' alt = '".$row['gInfo']."'>".$row['gName']."</option>";
         
        }
       exit('{"code":0,"msg":"'.$select.'"}');
        break; 
     //创建订单
     case 'create':
         $out_trade_no = $_POST['out_trade_no'];
         $gid = $_POST['gid'];
         $money = $_POST['money'];
         $rel = $_POST['rel'];
         $type = $_POST['type'];
         $sql = "insert into ayangw_order(out_trade_no,gid,money,rel,benTime,type) 
         values('{$out_trade_no}',{$gid},{$money},'{$rel}',now(),'{$type}')";
         $b = $DB->query($sql);
         if($b > 0){
             exit('{"code":0,"msg":"ok"}');
         }else{
             exit('{"code":-1,"msg":"no"}');
         }
         ;
     
     break;
     //查询卡密库存
     case 'selKm':
         $gid = $_POST['gid'];
         $sql = "select * from ayangw_km where stat = 0 and gid = ".$gid;
         $res =$DB->query($sql);
         if($row =  $DB->fetch($res)){
             exit('{"code":0,"msg":"ok"}');
         }else{
             exit('{"code":-1,"msg":"no"}');
         }
         ;break;
     //用户提取卡密
     case 'tqKm':
         $t = $_POST['t'];
         $sql = "select * from ayangw_km
         where out_trade_no ='{$t}' or trade_no = '{$t}' or rel = '{$t}'
         ORDER BY endTime desc
         limit 1";
        $res =$DB->query($sql);
        $ginfo = "";
        if($row =  $DB->fetch($res)){
            $sql2 = "select * from ayangw_goods where id =".$row['gid'];
            $res2 = $DB->query($sql2);
            $row2 = $DB->fetch($res2);
            $ginfo ="<tr><td id='td1'>".$row2['gName']."</td><td id='td2'>".$row['out_trade_no']."</td><td id='td3'>".$row['endTime']."</td><td id='td4'>".$row['km']."</td></tr>";
            exit('{"code":0,"msg":"'.$ginfo.'"}');
           
        }else{
            exit('{"code":-1,"msg":"无本条记录"}');
        }
         ;break;
     

    default: 
        exit('{"code":-2,"msg":"NOT"}');
        break;
}


?>