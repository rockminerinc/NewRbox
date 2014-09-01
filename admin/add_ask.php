<?php
include "ask_header.php";
require_once('../common.inc.php');

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加询价</b>
<?
	

	$gongsi   = trim($_POST['gongsi']);
	$shijian =strtotime(trim($_POST['shijian']));//time(); //date('Y-m-d');
	$beizhu = trim($_POST['beizhu']);
	$lianxiren = trim($_POST['lianxiren']);
	$dianhua = trim($_POST['dianhua']);
	$chuanzhen = trim($_POST['chuanzhen']);


	if(isset($_POST['submit'])&&strcmp($shijian, "")){	
 
			$DB->db_query("INSERT INTO xunjia(gongsi,shijian,lianxiren,dianhua,chuanzhen,beizhu) VALUES ('$gongsi','$shijian','$lianxiren','$dianhua','$chuanzhen','$beizhu')");
			echo "<BR><H1>OK!</H1><BR>";
			fowor_reload();

	}
?>



<form action="add_ask.php" method="post" >
<table border=0>

 
  <tr> <td>时间: </td><td> <input class="input" type=text name="shijian" size=12 type="text"  value = "<?php echo date("Y-m-d",time());?>"></td></tr>

  <tr> <td>公司/地区: </td><td> <input type=text name="gongsi" size=50> </td></tr>
  <tr> <td>联系人: </td><td> <input type=text name="lianxiren" size=50> </td></tr>
  <tr> <td>电话: </td><td> <input type=text name="dianhua" size=50> </td></tr>
  <tr> <td>传真: </td><td> <input type=text name="chuanzhen" size=50> </td></tr>
  <tr> <td>备注: </td><td> <textarea name="beizhu" rows="5" cols="35" class="textarea">
  </textarea>  </td></tr>

</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>