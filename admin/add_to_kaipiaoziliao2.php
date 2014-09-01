<?php
/*
添加客户开票资料
*/
include "header.php";
require_once('../common.inc.php');
	
	$id =$_REQUEST['id'];  //获取订单ID

	$rs = get_kpzl($id); //获取开票资料

	$comname   = trim($rs['comname']);
	$shuihao = trim($rs['shuihao']);
	$shuihao=preg_replace("/(\s+)/",'',$shuihao);
	$dizhi2 = trim($rs['dizhi']);
	$dianhua = trim($rs['dianhua']);
	$dizhi = $dizhi2." ".$dianhua;
	$kaihuhang = trim($rs['yinhang']);
	$zhanghao2 = trim($rs['zhanghao']);
	$zhanghao2  =  preg_replace("/(\s+)/",'',$zhanghao2);
	$zhanghao=$kaihuhang." ".$zhanghao2;
	$beizhu = trim($rs['beizhu']);


 
	$DB->db_query("INSERT INTO kaipiaoziliao2 (name,shuihao,dizhi,zhanghao,beizhu) VALUES ('$comname','$shuihao','$dizhi','$zhanghao','$beizhu')");
			echo '<BR><H1>OK!</H1><BR>';
  
?>

