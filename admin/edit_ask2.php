<?php
include "ask_header.php";
require_once('../common.inc.php');
?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加订单</b>
<?
	
	if(isset($_POST['submit'])&&strcmp($_POST['shijian'], "")){	
	$aid   = trim($_POST['id']);
	$gongsi   = trim($_POST['gongsi']);
	$shijian =strtotime(trim($_POST['shijian']));//time(); //date('Y-m-d');
	$beizhu = trim($_POST['beizhu']);
	$lianxiren = trim($_POST['lianxiren']);
	$dianhua = trim($_POST['dianhua']);
	$chuanzhen = trim($_POST['chuanzhen']);	
	
 	$rr=$DB->db_query('UPDATE xunjia SET GONGSI="'.$gongsi.'",SHIJIAN="'.$shijian.'" ,DIANHUA="'.$dianhua.'",LIANXIREN="'.$lianxiren.'",BEIZHU="'.$beizhu.'" WHERE id='.$aid);
	echo "<BR><H1>OK!</H1><BR>";
	fowor_reload();
	}
	

?>





 
</body>
</html>