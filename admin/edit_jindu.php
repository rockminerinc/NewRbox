<?php
include "edit_header.php";
require_once('../common.inc.php');
$dingdan_id = $_REQUEST['did'];
$jindu_id =$_REQUEST['jdid'];
$com_name=get_com_name($dingdan_id);

?>
<body >
<center>
<b><?php echo $com_name;?></b>
<BR>
<?php
$rs_jindu = get_jindu($dingdan_id); //获取进度资料



if(isset($_POST['submit'])) 
{
	
	$jindu_hetong   = trim($_POST['jindu_hetong']);
	$jindu_didan   = trim($_POST['jindu_didan']);
	$jindu_fukuan   = trim($_POST['jindu_fukuan']);
	$jindu_fahuo   = trim($_POST['jindu_fahuo']);
	$jindu_fapiao   = trim($_POST['jindu_fapiao']);
	$jindu_jiedan   = trim($_POST['jindu_jiedan']);
	$jindu_id =$_REQUEST['jdid'];
	$dingdan_id =$_REQUEST['did'];
	
	if($jindu_id)
	{
	
 	$DB->db_query('UPDATE dingdan_jindu SET JD_HETONG="'.$jindu_hetong.'",JD_DIDAN="'.$jindu_didan.'" ,JD_FUKUAN="'.$jindu_fukuan.'",JD_FAHUO="'.$jindu_fahuo.'" ,JD_FAPIAO="'.$jindu_fapiao.'" , JD_JIEDAN="'.$jindu_jiedan.'"  WHERE JD_ID='.$jindu_id.' and JD_DD_ID ='.$dingdan_id );
	echo "修改ok!<br>";
	fowor_reload();
	return false;	
	}
	else
	{
	$DB->db_query("INSERT INTO dingdan_jindu (JD_HETONG,JD_DIDAN,JD_FUKUAN,JD_FAHUO,JD_FAPIAO,JD_JIEDAN,JD_DD_ID) VALUES ('$jindu_hetong','$jindu_didan','$jindu_fukuan','$jindu_fahuo','$jindu_fapiao','$jindu_jiedan','$dingdan_id') ");
	//$kpzl_id = $DB->db_insertID();
	echo '<BR><H1>增加OK!</H1><BR>';	
	fowor_reload();
	return false;	
	}

}


?>
联系信息
<A HREF="admin/edit_jindu.php?did=<?php echo $dingdan_id;?>" target="bottomFrame">添加修改</A>
<br>

<form action="edit_jindu.php?did=<?php echo $dingdan_id;?>&&jdid=<?php echo $jindu_id;?>" method="post" >

<table    ALIGN=""   border="1"  ><tbody>

	<tr><td width=100 bgcolor="#999999">合同</td> <td>
	<input type="radio" value="1" id="jindu_hetong" <?php if($rs_jindu['JD_HETONG']==1) echo " checked";?> name="jindu_hetong" /><label for="type">已回传</label>  
	<input type="radio" value="0" id="jindu_hetong" <?php if($rs_jindu['JD_HETONG']==0) echo " checked";?> name="jindu_hetong" /><label for="type">没回传</label>  	
	</td></tr>
	
   <tr><td bgcolor="#999999">汇款底单</td>  <td>
	<input type="radio" value="1" id="jindu_didan" <?php if($rs_jindu['JD_DIDAN']==1) echo " checked";?> name="jindu_didan" /><label for="type">有底单</label>  
	<input type="radio" value="0" id="jindu_didan" <?php if($rs_jindu['JD_DIDAN']==0) echo " checked";?> name="jindu_didan" /><label for="type">没底单</label>     
   
   </td> </tr>
   
   
   <tr><td bgcolor="#999999">到款</td> <td>
	<input type="radio" value="1" id="jindu_fukuan" <?php if($rs_jindu['JD_FUKUAN']==1) echo " checked";?> name="jindu_fukuan" /><label for="type">已到帐</label>  
	<input type="radio" value="0" id="jindu_fukuan" <?php if($rs_jindu['JD_FUKUAN']==0) echo " checked";?> name="jindu_fukuan" /><label for="type">没到帐</label>      
   
   </td></tr>

   <tr><td bgcolor="#999999">发货</td> <td>
	<input type="radio" value="1" id="jindu_fahuo" <?php if($rs_jindu['JD_FAHUO']==1) echo " checked";?> name="jindu_fahuo" /><label for="type">已发货</label>  
	<input type="radio" value="0" id="jindu_fahuo" <?php if($rs_jindu['JD_FAHUO']==0) echo " checked";?> name="jindu_fahuo" /><label for="type">没发货</label>      
   
   </td></tr>   
   
  <tr> <td bgcolor="#999999">发票</td> <td>
  
	<input type="radio" value="1" id="jindu_fapiao" <?php if($rs_jindu['JD_FAPIAO']==1) echo " checked";?> name="jindu_fapiao" /><label for="type">已开票</label>  
	<input type="radio" value="0" id="jindu_fapiao" <?php if($rs_jindu['JD_FAPIAO']==0) echo " checked";?> name="jindu_fapiao" /><label for="type">没开票</label>   
	
  </td> </tr>
   <tr><td bgcolor="#999999">结单</td>  <td>
	<input type="radio" value="1" id="jindu_jiedan" <?php if($rs_jindu['JD_JIEDAN']==1) echo " checked";?> name="jindu_jiedan" /><label for="type">已结单</label>  
	<input type="radio" value="0" id="jindu_jiedan" <?php if($rs_jindu['JD_JIEDAN']==0) echo " checked";?> name="jindu_jiedan" /><label for="type">未结单</label>      
   
   </td> </tr>
  
   
</TBODY></TABLE>
 <input type=submit name=submit value=提交>
</form>





</body>
</html>