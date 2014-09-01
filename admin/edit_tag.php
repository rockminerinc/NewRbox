<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];
$sql1="SELECT t.cp_id,t.name from ".$prefix."tag t where t.id=".$tid."";
$DB->db_query($sql1);
$rs1 = $DB->db_fetch_array();


$cid=$rs1['cp_id'];
$tagname=$rs1["name"];
//echo $cid;

$sql="select * from ".$prefix."chanpin  where id = ".$cid."";
$DB->db_query($sql);
$rs = $DB->db_fetch_array();
//echo $rs['intro'];

?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>修改产品</b>
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

			if ($pro_name)
			{
			$DB->db_query("INSERT INTO {$db_prefix}chanpin (name,intro) VALUES ('$pro_name','$pro_intro')");
			echo "".$pro_name." 添加成功!<BR> <p>";

			//$pid = $DB->db_insertID();
			}
		//}
	$tag = trim($_POST['tname']);


    $tag = array_filter(array_unique(explode(',', str_replace("\xa3\xac", ',', HConvert($tag)))));





	if(strcmp($tag, "")){	
 
 
	foreach ($tag as $key => $value)
	{

			$DB->db_query("INSERT INTO {$db_prefix}tag (name,cp_id) VALUES ('$value','$pid')");
			$tid = $DB->db_insertID();
			echo "<p><a href=admin_create.php?id=".$tid." target=_blank> ".$value."</a> 添加成功!<BR> </p>";
			//$tagid = $DB->db_insertID();

	}



	}
	
?>


</CENTER>

<form action="edit_tag2.php" method="post" >
<table border=0>
  <tr> <td>产品名称: </td><td> <input type=text name="pname" size=50 value=<?php echo $rs['name'] ?> ></td></tr>
  <tr> <td>产品型号: </td><td> <input type=text name="tname" size=50 value=<?php echo $tagname ?> > <input type=hidden name="tid"  value=<?php echo $tid ?>><input type=hidden name="cid"  value=<?php echo $cid ?>>
</td></tr>
<tr> <td>产品简介: </td><td> <textarea name="intro" rows="15" cols="75" class="textarea"><?php echo $rs['intro'] ?></textarea> </td></tr>


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