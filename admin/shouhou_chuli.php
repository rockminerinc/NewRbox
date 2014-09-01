<?php
include "header.php";
require_once('../common.inc.php');
$oid = $_REQUEST['id'];
?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加售后处理信息</b>
<?


	$chuli=trim($_POST['chuli']);
	$time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');

	//$time=time();

if(strcmp($chuli, "")){	

	$oid = trim($_POST['oid']);
 			$DB->db_query('UPDATE shouhou SET chuli="'.$chuli.'",chuli_time="'.$time.'"  WHERE id='.$oid);

	echo "<p> 添加成功!<BR> <p>";
}
?>

<form action="shouhou_chuli.php" method="post" >
<table border=0>
 
<tr> <td>时间: </td><td> <input class="input" type=text name="regdate" size=12 onclick="fPopCalendar(regdate,regdate);return false" type="text"  value = "<?php echo date("Y-m-d",time());?>"></td></tr>

<tr> <td> 内容: </td><td> <textarea name="chuli" rows="15" cols="75" class="textarea"></textarea> </td></tr>

    <input type=hidden name="oid" size=50 value="<?php echo $oid;?>">

</table>
<input type=submit name=submit value=提交>

</form>


</CENTER>
</body>
</html>