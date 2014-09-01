<?php
include "../header.php";
require_once('../common.inc.php');

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

	$tid =$_REQUEST['id'];

	//$name = $_POST[name];
	//$pro_name=trim($_POST['pname']);
	$DB->db_query("SELECT * FROM {$db_prefix}tag WHERE id=".$tid);
	$rs = $DB->db_fetch_array();
	$cpid=$rs['cp_id'];
	$tagname=$rs['name'];

	$preid=$tid-1;
	$DB->db_query("SELECT * FROM {$db_prefix}tag WHERE id=".$preid);
	$prers = $DB->db_fetch_array();
	//$cpid=$prers['cp_id'];
	$pretagname=$prers['name'];	

	$nextid=$tid+1;
	$DB->db_query("SELECT * FROM {$db_prefix}tag WHERE id=".$nextid);
	$nextrs = $DB->db_fetch_array();
	//$cpid=$prers['cp_id'];
	$nexttagname=$nextrs['name'];

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




	$contents="<br>";
	//echo "<br>";
	if($rand%5==1)
	{
	$contents .="<br>".$info.",0733-3259123华仪电子特价供应";
	$title= $info.",0733-3259123华仪电子特价供应";
	}
	else if($rand%5==2)
	{
	$contents .="<br>".$info.",华仪电子0733-3258123:".$tagname."<br>";
	$title= $info.",华仪电子0733-3258123:".$tagname;
	}
	else if($rand%5==3)
	{
	$contents .="<br>".$info."-0733-3259123华仪电子<br>";
	$title= $info."-0733-3259123华仪电子";
	}
	else if($rand%5==4)
	{
	$contents .="<br>".$tagname.",华仪0733-3258123,".$info."<br>";
	$title= $tagname.",华仪0733-3258123,".$info;
	}
	else 
	{
	$contents .="<br>".$tagname.",0733-3259123华仪供应".$info."<br>";
	$title= $tagname.",0733-3259123华仪供应".$info;
	}



	$top='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>'.$title.'</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK media=screen href="images/base.css" type=text/css rel=stylesheet>
<STYLE type=text/css>BODY {
	BACKGROUND: url(images/bg.png) #acdae5 fixed no-repeat left top; COLOR: #222222
}

</STYLE>

<META content='.$title.' name=description>
<META content='.$title.' name=author>
<META content="MSHTML 6.00.2900.5726" name=GENERATOR>
</HEAD>

<BODY class="narrowlook beforelogin">
<DIV id=container>
<DIV id=header>
<!-- <H1><SPAN>首页</SPAN></H1>
 -->
 <DIV class=ui-roundedbox id=newnav>
<DIV class="ui-roundedbox-corner ui-roundedbox-tl">
<DIV class="ui-roundedbox-corner ui-roundedbox-tr">
<DIV class="ui-roundedbox-corner ui-roundedbox-bl">
<DIV class="ui-roundedbox-corner ui-roundedbox-br">
<DIV class=ui-roundedbox-content>
<UL>
  <LI><A href="http://www.shuxianbiao.com/">首页</A> </LI>
  <LI><A href="http://www.huayi123.com">华仪电子</A> </LI>
  <LI><A href="http://www.171biao.cn">仪器仪表查询网</A> 
</LI>
</UL></DIV></DIV></DIV></DIV></DIV></DIV></DIV>

';



	$contentall=$top."<br><div class=tophead>";
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
	$contents .=$info."制造销售<br>";
	//$rand--;
	//}
}
	//echo "型号：$info";
	//echo "<BR>产品名称：$pname";
	
	if($pintro)
	{
	$pintro = str_replace("@",$info,$pintro);
	//echo "<br>产品介绍：<br>".$pintro."<br>";
	$contents .="</div><br>产品介绍：<br>".$pintro."<br>";
	}
	//$contents .="<br>标签:<a href=http://www.wotui.com/index.php?tag=$tagname>".$tagname."</a><br>";
	//echo "<br>标签:<a href=http://www.wotui.com/index.php?tag=$tagname>".$tagname."</a><br>";


	$bottom='<DIV class=ui-roundedbox id=newstatus>
<DIV class="ui-roundedbox-corner ui-roundedbox-tl">
<DIV class="ui-roundedbox-corner ui-roundedbox-tr">
<DIV class="ui-roundedbox-corner ui-roundedbox-bl">
<DIV class="ui-roundedbox-corner ui-roundedbox-br">
<DIV class=ui-roundedbox-content>
<DIV id=info1>

<DIV id=latest>
<H1>'.$title.'</H1><BR>
<CENTER><img src="http://www.huayi123.com/info.gif"><BR>
</CENTER>
'.$contents.'</DIV>
上一篇:<a href="http://'.$pretagname.'.shuxianbiao.com/'.$pretagname.'-product'.$preid.'.html">'.$pretagname.'</a>
<br>
下一篇:<a href="http://'.$nexttagname.'.shuxianbiao.com/'.$nexttagname.'-product'.$nextid.'.html">'.$nexttagname.'</a>

</DIV></DIV></DIV></DIV></DIV></DIV></DIV></DIV>




<script type="text/javascript" src="http://js.tongji.cn.yahoo.com/759605/ystat.js"></script><noscript><a href="http://tongji.cn.yahoo.com"><img src="http://img.tongji.cn.yahoo.com/759605/ystat.gif"/></a></noscript>

</BODY></HTML>';

	$contentall .= $bottom;

	echo $contentall;

		function add_article($filename, $news)
	{

		$fh = fopen($filename, "w");
		$news = stripslashes($news);
		fwrite($fh, "$news");
		fclose($fh);
	}
	//$n=mt_rand(1,255);
	$tagname=str_replace("/", "-",$tagname);
	add_article("../$tagname-product$tid.html", $contentall);
	$exec="UPDATE ".$prefix."tag SET htmled='1' WHERE id='$tid'";
	$DB->db_query($exec);


?>
 <BR>


</span>
</body>
</html>