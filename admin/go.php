<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];

echo "<a href=del.php?id=".$tid." >删除此产品</a>";
?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>


 

<script type="text/javascript">  
function copyText(obj)   
{  
var rng = document.body.createTextRange();  
rng.moveToElementText(obj);  
rng.scrollIntoView();  
rng.select();  
rng.execCommand("Copy");  
rng.collapse(false);}  
</script> 

<input   onclick="copyText(document.all.tbid)"   value="点击复制内容"   type="button">

<input   onclick="location.reload()"   value="点击刷新"   type="button">
<span id="tbid">   



 <?

	
	//$add =$_REQUEST['add'];
	
	//$name = $_POST[name];
	//$pro_name=trim($_POST['pname']);
	$DB->db_query("SELECT * FROM {$db_prefix}tag WHERE id=".$tid);
	$rs = $DB->db_fetch_array();
	$cpid=$rs['cp_id'];
	$tagname=$rs['name'];


    $DB->db_query("SELECT * FROM {$db_prefix}chanpin  WHERE id=".$cpid);
	$rs2 = $DB->db_fetch_array();
	$pintro=$rs2['intro'];
	//$pintro = str_replace("#",$info,$rs2['pintro']);
	$pname=$rs2['name'];
	$info="$tagname"."$pname";

	$rand=mt_rand(1,5);
	$rand2=mt_rand(1,9);
	$rand3=mt_rand(1,9);

	//$title='';




	$contents="<br><br><br>";
	//echo "<br>";
	if($rand%5==1)
	{
	$contents .=" ".$info.",0733-3259123华仪电子特价供应";
	$title= $info.",0733-3259123华仪电子特价供应";
	}
	else if($rand%5==2)
	{
	$contents .=" ".$info.",华仪电子0733-3258123:".$tagname." ";
	$title= $info.",华仪电子0733-3258123:".$tagname;
	}
	else if($rand%5==3)
	{
	$contents .=" ".$info."-0733-3259123华仪电子 ";
	$title= $info."-0733-3259123华仪电子";
	}
	else if($rand%5==4)
	{
	$contents .=" ".$tagname.",华仪0733-3258123,".$info." ";
	$title= $tagname.",华仪0733-3258123,".$info;
	}
	else 
	{
	$contents .=" ".$tagname.",0733-3259123华仪供应".$info." ";
	$title= $tagname.",0733-3259123华仪供应".$info;
	}

	$contents .='<table width="300px"><tr><td  style="FONT-SIZE: 7px; MARGIN-LEFT: 1em; COLOR: #666;">';

	$top='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>'.$title.'</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK media=screen href="../images/base.css" type=text/css rel=stylesheet>
<STYLE type=text/css>BODY {
	BACKGROUND: url(../images/bg.png) #acdae5 fixed no-repeat left top; COLOR: #222222
}

</STYLE>

<META content="" name=description>
<META content= name=author>
<META content="MSHTML 6.00.2900.5726" name=GENERATOR>
</HEAD>

<BODY class="narrowlook beforelogin">
 ';

	$contentall=$top."<br>";
	//echo "<BR>";

	$rand2=mt_rand(1,2);
	if($rand2%2)
	$condition .= " ORDER BY id ASC";
	else
	$condition .= " ORDER BY id DESC";


    $DB->db_query("SELECT * FROM {$db_prefix}info ".$condition);

while ($rs = $DB->db_fetch_array())
{
	$rand=mt_rand(1,2);
	
	$info1 = str_replace("@",$info,$rs['info1']);
	
	$info2 = str_replace("@",$info,$rs['info2']);
	//$tags[] = array(rawurlencode($rs['tagname']), $rs['tagname'], $rs['usenum'], getTagStyle());
	if($rand%2==0 )
	{
    
	//echo "<BR>";
	//echo $info1;
	$contents .= $info1;
	//echo "<BR>";
	//while($rand--)
	//echo $info1."<br>";
	}
	else
	{
	//echo "<BR>";
	//echo $info2;
	$contents .=  $info2;
	//echo "<BR>";
	//while($rand--)
	//echo $info2."<br>";
	}
	//while($rand>0)
	//{
	//$rand--;
	//echo "<BR>";
	//echo $info."制造销售<br>";
	$contents .=$info."制造销售 ";


	//$rand--;
	//}
}




	if($pintro)
	{
	$pintro = str_replace("@",$info,$pintro);
	//echo "<br>产品介绍：<br>".$pintro."<br>";
	$contents .="<br><img src=http://www.wotui.com/lianxi.gif alt=华仪电子联系方式></TD></TR></TABLE><BR>产品介绍：<br><H1>".$tagname.$pname."</H1><BR>".$pintro."<br>";
	}
	$contents .="<br>标签:<a href=http://$tagname.wotui.com >".$tagname."</a>&nbsp;&nbsp;<a href=http://".$tagname.".shuxianbiao.com/$tagname-product$tid.html>".$tagname."</a><br>";
	//echo "<br>标签:<a href=http://www.wotui.com/index.php?tag=$tagname>".$tagname."</a><br>";


	$bottom='<DIV class=ui-roundedbox id=newstatus>
<DIV class="ui-roundedbox-corner ui-roundedbox-tl">
<DIV class="ui-roundedbox-corner ui-roundedbox-tr">
<DIV class="ui-roundedbox-corner ui-roundedbox-bl">
<DIV class="ui-roundedbox-corner ui-roundedbox-br">
<DIV class=ui-roundedbox-content>
<DIV id=info1>

<DIV id=latest>
<H1>'.$title.'</H1>
'.$contents.'</DIV></DIV></DIV></DIV></DIV></DIV></DIV></DIV></DIV>

</BODY></HTML>';

	$contentall .= $bottom;

	echo $contents;
	//if($add=="yes")
	//{
	//$exec="UPDATE ".$prefix."tag SET views =views+1 WHERE id='$tid'";
	//$DB->db_query($exec);
	//}

		function add_article($filename, $news)
	{

		$fh = fopen($filename, "w");
		$news = stripslashes($news);
		fwrite($fh, "$news");
		fclose($fh);
	}
	//$n=mt_rand(1,255);
	//add_article("$tagname-product$tid.html", $contentall);
	//$exec="UPDATE ".$prefix."tag SET htmled='1' WHERE id='$tid'";
	//$DB->db_query($exec);


?>
 <BR>


</span>
</body>
</html>