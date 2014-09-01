<?php
include "header.php";
require_once('../common.inc.php');

?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加产品</b>
<?
        //include ("../template.inc");
        //include ("config.php");
	
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



	//$name = $_POST[name];
	$pro_name=trim($_POST['pname']);
	$pro_intro=trim($_POST['intro']);
    //$rs = $DB->db_fetch_one_array("SELECT * FROM {$db_prefix}chanpin WHERE name = '$pro_name'");
		//if ($DB->db_num() > 0)
		//{
			//if ($pro_intro)
			//{
				//$DB->db_query("UPDATE {$db_prefix}chanpin SET intro = ".$pro_intro);
			//	$tagid = $rs['tagid'];
			//}
			//else
			//{
			//	$pid=$rs['id'];
			//	unset($pro_name);
				//continue;
			//}
		//}
		//else
		//{
			if ($pro_name)
			{
			$DB->db_query("INSERT INTO {$db_prefix}chanpin (name,intro) VALUES ('$pro_name','$pro_intro')");
			echo "".$pro_name." 添加成功!<BR> <p>";

			$pid = $DB->db_insertID();
			}
		//}
	$tag = trim($_POST['tname']);


    $tag = array_filter(array_unique(explode(',', str_replace("\xa3\xac", ',', HConvert($tag)))));





	if(strcmp($tag, "")){	
 
		//$conn=mysql_connect($host,$user,$dbpassword); 
		//mysql_query("set names utf8"); //解决中文乱码问题 
		//mysql_select_db($db); 

   echo "<table width=800 border=1><tbody>";

	foreach ($tag as $key => $value)
	{

			$DB->db_query("INSERT INTO {$db_prefix}tag (name,cp_id) VALUES ('$value','$pid')");
			$tid = $DB->db_insertID();
			$DB->db_query("UPDATE tag SET  level=".$tid." WHERE id =".$tid."");
			//$DB->db_query("UPDATE tag SET  level) VALUES ('$tid')");
			echo "<tr><td><a href=admin_create.php?id=".$tid." target=_blank> ".$value."</a> 添加成功!<BR> </td>";
		echo "<td WIDTH=150 ><a href=http://www.171biao.cn/yiqiyibiao/".$value." target=_blank >171biao</a></td>";
		echo "</tr>";



	}
	echo "</tbody></table>";

	}
?>


</CENTER>

<form action="add_tag.php" method="post" >
<table border=0>
  <tr> <td>产品名称: </td><td> <input type=text name="pname" size=50> </td></tr>
  <tr> <td>产品型号: </td><td> <input type=text name="tname" size=50> </td></tr>
 
<tr> <td>产品简介: </td><td> <textarea name="intro" rows="15" cols="75" class="textarea"></textarea> </td></tr>


</table>
<input type=submit name=submit value=提交>
</form>


<script src="./nicEditor/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('intro');
});
</script>
</body>
</html>