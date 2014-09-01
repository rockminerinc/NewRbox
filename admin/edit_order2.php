<?php
include "edit_header.php";
require_once('../common.inc.php');



?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>修改产品</b>
<?
	$oid = trim($_POST['oid']);
	$com_name   = trim($_POST['com_name']);
	$order_time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
	echo $order_time;
	$type_id = trim($_POST['account_type']);
	//$pro_id = trim($_POST['pro_id']);
	$amount = trim($_POST['amount']);

	$provider_id = trim($_POST['provider_id']);
	$remarks = trim($_POST['remarks']);
	$express_id = trim($_POST['express_id']);
	$express_code = trim($_POST['express_code']);
	//$express_id = trim($_POST['express_id']);
	$post_time = trim($_POST['post_time']);
	$customer = trim($_POST['customer']);
	$fapiao = trim($_POST['fapiao']);  //发票
	$owner = trim($_POST['owner']);  //跟单
	$laokehu = trim($_POST['laokehu']);  //跟单

	$invoice_express_id = trim($_POST['invoice_express_id']);  //发票快递公司id
	$invoice_express_code = trim($_POST['invoice_express_code']); ////发票快递单号

	$pro_name = trim($_POST['pro_name']);
	$pro_model = trim($_POST['pro_model']);
	$pro_num = trim($_POST['pro_num']);
	$pro_price = trim($_POST['pro_price']);
	$pro_amount = trim($_POST['pro_amount']);
	

	if(strcmp($com_name, "")){	
 
 			$DB->db_query('UPDATE dingdan SET DD_GONGSI_NAME="'.$com_name.'",DD_SHIJIAN="'.$order_time.'" ,DD_LEIBIE="'.$type_id.'",DD_BEIZHU="'.$remarks.'" ,DD_GENDAN_ID="'.$owner.'" , DD_LAOKEHU="'.$laokehu.'" WHERE DD_ID='.$oid);
			//$oid = $DB->db_insertID();
			echo "编辑成功!<BR> ";
			fowor_reload();
			return false;
	}
	
?>


</CENTER>


 
</body>
</html>