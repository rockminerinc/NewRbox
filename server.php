<?php
include_once("common.inc.php"); //连接数据库 
$action=$_GET[action]; 
$id=intval($_GET[id]); 
if($action=="getbeizhu"){ 
    $query=$DB->db_query("select * from dingdan where DD_ID=$id"); 
    $row=$DB->db_fetch_array(); 
    $list=array("gname"=>$row[DD_GONGSI_NAME],"beizhu"=>$row[DD_BEIZHU],); 
    echo json_encode($list); 
} 
else if($action=="getchanpin"){ 
    $query=$DB->db_query("select * from chanpin where CP_DINGDAN_ID =$id"); 
	while($row=$DB->db_fetch_array())
	{
	//$row=$DB->db_fetch_array(); 
    $list[] =array("cname"=>$row[CP_NAME],"guige"=>$row[CP_GUIGE],); 
	}
	
	//$list=json_to_array($list[]);
    echo json_encode($list[0]); 
	//echo json_encode($list[1]); 
} 

else if($action=="getkpzl"){ 
    $query=$DB->db_query("select * from kaipiaoziliao where KPZL_ID  =$id"); 
	$row=$DB->db_fetch_array(); 
    $list=array("name"=>$row[KPZL_NAME],
				"beizhu"=>$row[KPZL_BEIZHU],
				"shuihao"=>$row[KPZL_SHUIHAO],
				"dizhi"=>$row[KPZL_DIZHI],
				"zhanghao"=>$row[KPZL_ZHANGHAO],
							
				); 
    echo json_encode($list); 
}
?>