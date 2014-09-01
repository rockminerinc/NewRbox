<?php
include "header.php";
require_once('../common.inc.php');

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<b>添加备忘</b>
<?
	

	//$com_name   = trim($_POST['com_name']);
	$time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
	//echo time();

	$content = trim($_POST['content']);

	//$pro_name = trim($_POST['pro_name']);
	//$pro_model = trim($_POST['pro_model']);
	//$pro_num = trim($_POST['pro_num']);
	//$pro_price = trim($_POST['pro_price']);
	//$pro_amount = trim($_POST['pro_amount']);
	//$time=time(); 





	if(strcmp($time, "")){	
 
			$DB->db_query("INSERT INTO {$db_prefix}note (time,content) VALUES ('$time','$content')");
			//$oid = $DB->db_insertID();
			echo "OK!<BR>";



	}
?>



<form action="add_note.php" method="post" >
<table border=0>

 
  <tr> <td>时间: </td><td> <input class="input" type=text name="regdate" size=12 onclick="fPopCalendar(regdate,regdate);return false" type="text"  value = "<?php echo date("Y-m-d",time());?>"></td></tr>
 
  <tr> <td>内容: </td><td> <textarea name="content" rows="15" cols="55" class="textarea">
 
  </textarea>  </td></tr>

</table>
<input type=submit name=submit value=提交>
</form>

 <script src="../nicEditor/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('content');
});
</script>

</body>
</html>