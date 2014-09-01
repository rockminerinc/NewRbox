<?php
include "header.php";
require_once('../common.inc.php');
?>

<body bgcolor="#ffffff" >
<CENTER><b>修改</b>
<?
	
		//$aid = trim($_POST['aid']);
	$oid =$_REQUEST['id'];  //获取订单ID
	$comname   = trim($_POST['comname']);
	$shuihao = trim($_POST['shuihao']);
	$dizhi = trim($_POST['dizhi']);
	$zhanghao = trim($_POST['zhanghao']);
	$beizhu = trim($_POST['beizhu']);



	if(isset($_POST['submit'])){	
 
 			$DB->db_query('UPDATE kaipiaoziliao SET KPZL_NAME="'.$comname.'",KPZL_SHUIHAO="'.$shuihao.'" ,KPZL_DIZHI="'.$dizhi.'",KPZL_ZHANGHAO="'.$zhanghao.'" ,KPZL_BEIZHU="'.$beizhu.'" WHERE KPZL_ID='.$oid);
			//$oid = $DB->db_insertID();
			echo "编辑成功!<BR> ";

	}
?>





 
</body>
</html>