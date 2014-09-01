<?php
require('libs/Smarty.class.php');
require_once('common.inc.php');

$smarty = new Smarty;
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
switch ($act)
{
	case 'showkpzl':
	if($id)
	{
	$row_kpzl = get_kpzl($id); //获取开票资料
	$smarty->assign("kpzl",$row_kpzl);
	$smarty->display('show_kpzl.tpl');
	}
	else
	echo 'no,<a href="#">ADD</a>';
	break;
	
	case 'showcp':
	if($id)
	{
	$sql ="select * from  chanpin where CP_DINGDAN_ID =".$id."";
	$DB->db_query($sql);
	$n=0;
	while ($row = $DB->db_fetch_array())
	{ 
		$n++;
	$CHANPINS[] = Array ( "ID" => $row["CP_ID"], 
						"NAME" => $row["CP_NAME"],
						"GUIGE" => $row["CP_GUIGE"],
						"JIAGE" => $row["CP_JIAGE"],
						"NUM" => $row["CP_NUM"],
						"ZONGE" => $row['CP_JIAGE']*$row['CP_NUM'],
						"BEIZHU" => $row["CP_BEIZHU"],
						"cixu" => $n						
						);
  
	$num1  += $row['CP_NUM'];
	$heji += $row['CP_JIAGE']*$row['CP_NUM'];

	}
 	$smarty->assign("chanpin_list",$CHANPINS);
 	$smarty->assign("shuliang",$num1);
 	$smarty->assign("heji",$heji);
	$smarty->display('showcp.tpl');
	}
	else
	echo 'no,<a href="#">ADD</a>';
	break;	

	case 'showwl':
	if($id)
	{
	$sql ="select wz.*,wg.* from  wuliu_ziliao wz,wuliu_gongsi wg where wz.WLZL_GONGSI_ID=wg.WL_ID AND wz.WLZL_DINGDAN_ID =".$id."";
	echo $sql;
	$DB->db_query($sql);
	while ($row = $DB->db_fetch_array())
	{ 
		
	$WULIUS[] = Array ( "ID" => $row["WLZL_ID"], 
						"NAME" => $row["WL_NAME"],
						"LEIBIE" => $row["WLZL_LEIBIE"],
						"DANHAO" => $row["WLZL_DANHAO"],
						"FAHUO_SHIJIAN" => $row["WLZL_FAHUO_SHIJIAN"],
						"YUDAO_SHIJIAN" => $row["WLZL_YUDAO_SHIJIAN"],
						"DAOHUO_SHIJIAN" => $row["WLZL_DAOHUO_SHIJIAN"],
						"BEIZHU" => $row["WLZL_BEIZHU"],
					
						);
  
	}
	$smarty->assign("wuliu_list",$WULIUS);
	$smarty->display('showwl.tpl');
	}
	else
	echo 'no,<a href="#">ADD</a>';
	break;
	
	case 'showlxr':
	if($id)
	{
	$row_lxr = get_lxr($id); //获取联系人资料
	$smarty->assign("lxr",$row_lxr);
	$smarty->display('show_lxr.tpl');
	}
	else
	echo 'no,<a href="#">ADD</a>';
	break;	
	
	case 'showjd':
	if($id)
	{
	$row_jd = get_jindu($id); //获取进度
	$smarty->assign("jd",$row_jd);
	$smarty->display('show_jd.tpl');
	}
	else
	echo 'no,<a href="#">ADD</a>';
	break;		
	
	case 'showbz':
	if($id)
	{
	$row_bz = get_beizhu($id); //获取备注资料
	$smarty->assign("beizhu",$row_bz);
	$smarty->display('show_bz.tpl');
	}
	else
	echo 'no,<a href="#">ADD</a>';
	break;	
}