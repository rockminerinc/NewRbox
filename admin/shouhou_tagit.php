<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];
$time =time();

//echo '<a href="del2.php?id='.$tid.'">确认删除</a>';

$sql='update shouhou SET zhuangtai=1 where id = '.$tid;
	$DB->db_query($sql);

	echo "成功！"


?>
