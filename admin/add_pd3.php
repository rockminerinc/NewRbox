<?php
include "header.php";
require_once('../common.inc.php');

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<b>添加型号</b>
<?
	
function HConvert($var)
{
	if (is_array($var))
	{
		foreach ($var as $key => $value)
		{
			$var[$key] = HConvert($value);
		}
	}
	else
	{
		$var = str_replace(array('"', '\'', '<', '>', "\t", "\r"), array('&quot;', '&#39;', '&lt;', '&gt;', '&nbsp;&nbsp;', ''), $var);
	}
	return $var;
}

	//$time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
	//$pd1 = trim($_POST['pd1']);
	$pd3 = trim($_POST['pd3']);

	//$tag = trim($_POST['tname']);


    $pd3 = array_filter(array_unique(explode(',', str_replace("\xa3\xac", ',', HConvert($pd3)))));




	if(strcmp($pd3, "")){	
 
	foreach ($pd3 as $key => $value)
	{

			$DB->db_query("INSERT INTO {$db_prefix}t_pd3 (pd3) VALUES ('$value')");

		echo "OK";



	}

	}
?>



<form action="add_pd3.php" method="post" >
<table border=0>

 
  <tr> <td>PD3: </td><td> <input class="input" type=text name="pd3" size=32  type="text"></td></tr>
<!--    <tr> <td>PD2: </td><td> <input class="input" type=text name="pd2" size=12  type="text"></td></tr>
 -->

</table>
<input type=submit name=submit value=提交>
</form>

 

</body>
</html>