<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];

//echo '<a href="del2.php?id='.$tid.'">确认删除</a>';

	$sql="update dingdan_jindu SET JD_JIEDAN=9 where JD_DD_ID = ".$tid;

	$DB->db_query($sql);

	echo "成功！"


?>
