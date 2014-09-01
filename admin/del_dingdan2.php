<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];

			//$DB->db_query("SELECT pro_id from orders where id=".$tid." LIMIT 1");
			//$rs = $DB->db_fetch_array();
			//$pro_id = $rs['pro_id'];
	//
	$sql="update dingdan_jindu SET JD_JIEDAN=8 where JD_DD_ID = ".$tid;
	$DB->db_query($sql);

	echo "删除成功！"



		//	$DB->db_query("DELETE from products where id = ".$pro_id." LIMIT 1");
		//	echo "删除产品成功!<BR>";

?>