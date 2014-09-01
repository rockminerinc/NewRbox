<?php
include "header.php";
require_once('../common.inc.php');
//$tid =$_REQUEST['id'];
//$sql1="SELECT t.cp_id,t.name from ".$prefix."tag t where t.id=".$tid."";
//$DB->db_query($sql1);
//$rs1 = $DB->db_fetch_array();


//$cid=$rs1['cp_id'];
//$tagname=$rs1["name"];
//echo $cid;

//$sql="select * from ".$prefix."chanpin  where id = ".$cid."";
//$DB->db_query($sql);
//$rs = $DB->db_fetch_array();
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
	$cid =trim($_POST['cid']);
	$tid=trim($_POST['tid']);
	echo $cid;
    //$rs = $DB->db_fetch_one_array("SELECT * FROM {$db_prefix}chanpin WHERE name = '$pro_name'");

			if ($pro_name)
			{
			$DB->db_query('UPDATE chanpin SET name="'.$pro_name.'",intro="'.$pro_intro.'" WHERE id='.$cid);
			echo "".$pro_name." 修改成功!<BR> <p>";

			//$pid = $DB->db_insertID();
			}
		//}
	$tag = trim($_POST['tname']);


    $tag = array_filter(array_unique(explode(',', str_replace("\xa3\xac", ',', HConvert($tag)))));





	if(strcmp($tag, "")){	
 
 
	foreach ($tag as $key => $value)
	{

			$DB->db_query('UPDATE tag SET name="'.$value.'" WHERE id = '.$tid);
			//$tid = $DB->db_insertID();
			echo "<p><a href=go.php?id=".$tid." target=_blank> ".$value."</a> 修改成功!<BR> </p>";
			//$tagid = $DB->db_insertID();

	}



	}
	
?>


</CENTER>

</body>
</html>