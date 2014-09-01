<?php
include "header.php";
require_once('../common.inc.php');

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<b>添加型号</b>
<?
	

	//$time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
	$pd1 = trim($_POST['pd1']);
	$pd2 = trim($_POST['pd2']);





	if(strcmp($pd1, "")){	
 
			$DB->db_query("INSERT INTO {$db_prefix}pd194e (pd1,pd2) VALUES ('$pd1','$pd2')");
			//$oid = $DB->db_insertID();
			echo "OK!<BR>";



	}
?>



<form action="add_model.php" method="post" >
<table border=0>

 
  <tr> <td>PD1: </td><td> <input class="input" type=text name="pd1" size=12  type="text"></td></tr>
   <tr> <td>PD2: </td><td> <input class="input" type=text name="pd2" size=12  type="text"></td></tr>


</table>
<input type=submit name=submit value=提交>
</form>

 

</body>
</html>