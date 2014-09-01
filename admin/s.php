<?php
include "header.php";
require_once('../common.inc.php');

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>搜索产品</b><BR>

<?
        //include ("../template.inc");
        //include ("config.php");
	
 



$tag = trim($_REQUEST['word']);
$type= trim($_REQUEST['type']);


if(strcmp($tag, "") && $type == "1" ){
	//echo $tag;
	
	$sql ="select * from  {$db_prefix}orders where com_name LIKE '%".$tag."%' ";
	$DB->db_query($sql);



	
?>

<table width=100% border=1  ALIGN="center"><tbody>

<tr bgcolor="#6699CC" >

	 <td>ID </td>
	
	<td WIDTH=60>订货时间</td>
	<td WIDTH=250>公司名称</td>
	<td WIDTH=250>产品信息</td>

	<td>金额</td>
	<td>供应商</td>
	<td>快递公司</td>
	<td>发货时间</td>
	<td>汇款底单</td>
	<td>付款否</td>
	<td>备注</td>
	<td WIDTH=70>操作</td>

	</tr>
<?php	

	$express_id='';
	$express_name='';

	while ($rs = $DB->db_fetch_array())
{
	//var $n=0;
	//$n++;
	$order_time = date("Y-m-d", $rs['order_time']+3600*8) ;
	$provider_id = $rs['provider_id'];
	//$provider_id = $rs['provider_id'];
	$express_code= $rs['express_code'];
	$express_id= $rs['express_id'];
	$order_id = $rs['id'];
	$complete = $rs['complete'];
	//$DB2->db_query("SELECT * FROM {$db_prefix}express where id=".$provider_id);
    $DB2->db_query("SELECT * FROM {$db_prefix}products where id=".$rs['pro_id']);
	$rs3 = $DB2->db_fetch_array();
	$pro_name = $rs3['name'];
	$pro_model = $rs3['model'];
	$pro_num = $rs3['number'];
	$pro_price = $rs3['price'];
	$pro_amount = $rs3['amount'];

    $DB2->db_query("SELECT * FROM {$db_prefix}provider where id=".$provider_id);
	$rs3 = $DB2->db_fetch_array();
	$provider_name = $rs3['name'];

	if($express_id)
	{
    $DB2->db_query("SELECT * FROM {$db_prefix}express where id=".$express_id);
	$rs2 = $DB2->db_fetch_array(); 
	$express_name= $rs2['name'];
	}
	?>

    <tr>
	 <td  > <a href="#<?php echo $rs['id']; ?>" ><?php echo $rs['id']; ?></a></td> 
	
	<td <?php if( $rs['invoice']) echo "Bgcolor=#009933 ";?> WIDTH=70><?php echo $order_time;?></td>

	<td WIDTH=250 height=20 <?php if( $rs['type_id']==2 ) echo "Bgcolor=#CCCC00 ";else if( $rs['type_id']==3 )echo "Bgcolor=#6699CC ";?>> 

    <DIV TITLE="header=[<?php 	echo $rs['com_name'];?>] body=[<?php echo $rs['customer'];?>] doubleclickstop=[on]" >

 	<?php echo $rs['com_name']; ?></a>  
	</DIV>
 	</td>
	<td WIDTH=250 height=20 >
	<DIV TITLE="header=[<?php 	echo $pro_name;?>] body=[型号:<?php echo $pro_model; ?><br>数量:<?php echo $pro_num; ?><br>单价:<?php echo $pro_price; ?><br>总额:<?php echo $pro_amount; ?>]" >
	<?php if($pro_model) echo $pro_model ; else echo ".";?>
	</DIV>
	</td>

	<td><?php echo $pro_amount; ?></td>
	<td><?php echo $provider_name; ?></td>

	<td>
	<DIV TITLE="header=[<?php
		if($express_id==1) 
		echo '<a href=http://www.yundaex.com target=_blank>'.$express_name.'www.yundaex.com/</a>'; 
		else if($express_id==2)
		echo '<a href=http://www.sf-express.com/tabid/68/Default.aspx target=_blank>'.$express_name.'http://embed.sf-express.com/sfwebc2_ch/track_index.jsp</a>'; 
		else if($express_id==3)
		echo '<a href=http://www.ems.com.cn/qcgzOutQueryAction.do?reqCode=gotoSearch target=_blank>'.$express_name.'www.ems.com.cn/</a>'; 
		else if($express_id==4)
		echo '<a href=http://www.sto.cn/Default.htm target=_blank>'.$express_name.'www.sto.cn/</a>'; 
		else 
		echo $express_name; 

	?>] body=[单号:<?php echo $express_code;?>] " >
<?php 	if($express_id) echo $express_name; else echo "<font color=red><B>未发货</B></font>";?>
</DIV>
    </td>
	
		<td><?php if($rs['post_time']) echo $rs['post_time'];  else echo "<font color=red><B>/////</B></font>";?></td>

	<td>

 	 <DIV TITLE='header=[操作] body=[<?php if ($rs['payfax']) {?>
		<a href="admin/unpayfax.php?id=<?php  echo $order_id;?>" target="_blank">没底单</a>
		<?php } else { ?>
		<a href="admin/payfax.php?id=<?php  echo $order_id;?>" target="_blank">有底单</a>
		<?php } ?>]' > 

	<?php if($rs['payfax']) echo "有";  else echo "<font color=red><B>无</B></font>";?>
 
	 

	</DIV>
	 

	</td>

	<td>
	<DIV TITLE='header=[操作] body=[<?php if ($rs['pay']) {?>
		<a href="admin/unpay.php?id=<?php  echo $order_id;?>" target="_blank">未付款</a>
		<?php } else { ?>
		<a href="admin/pay.php?id=<?php  echo $order_id;?>" target="_blank">已付款</a>
		<?php } ?>]' >
	<?php if($rs['pay']) echo "已付款";  else echo "<font color=red><B>未付款</B></font>";?>
	

	</DIV>
	
	</td>	<td>
	<DIV TITLE="header=[备注信息] body=[<?php echo $rs['remarks'];?>] " >
<?php if($rs['remarks']) echo '<font color="#CC0000"><B>备注</B></font>'; else echo ".";?>
	</DIV>
	</td>
	<td>
	<a href="admin/edit_order.php?id=<?php  echo $order_id;?>" target="_blank">编辑</a>&nbsp;&nbsp;
		<a href="admin/del.php?id=<?php  echo $order_id;?>" target="_blank">删除</a>&nbsp;&nbsp;
		<?php if ($complete) {?>
		<a href="admin/unok.php?id=<?php  echo $order_id;?>" target="_blank">未完成</a>&nbsp;&nbsp;
		<?php } else { ?>
		<a href="admin/ok.php?id=<?php  echo $order_id;?>" target="_blank">结单</a>&nbsp;&nbsp;
		<?php } ?>
		<a href="admin/shouhou.php?id=<?php  echo $order_id;?>" target="_blank">售后</a>&nbsp;&nbsp;
		<?php if ($rs['pay']) {?>
		<a href="admin/unpay.php?id=<?php  echo $order_id;?>" target="_blank">未付款</a>&nbsp;&nbsp;
		<?php } else { ?>
		<a href="admin/pay.php?id=<?php  echo $order_id;?>" target="_blank">已付款</a>&nbsp;&nbsp;
		<?php } ?>
	</td>

<?php

}
?>
</tbody></table>
<?php
}	

if(strcmp($tag, "") && $type == "2" ){

	//echo $tag;

}


?>





</CENTER>




</body>
</html>