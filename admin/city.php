<?php
include "header.php";
require_once('../common.inc.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> 物流运输 </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
  <script language="javascript" src="city.js"></script>
    <script language="javascript" src="city2.js"></script>

 </HEAD>

 <BODY>
<CENTER>
<A HREF="../index.php">订单首页</A>
<A HREF="city.php">添加物流</A>
<A HREF="../wuliu.php">物流记录</A>

<h1>添加</h1>
</CENTER>

  <CENTER><form action="city2.php" method="post" name="form2">出发省份：<select name="start_sheng"  onchange="changecity1()" >
                <option selected>出发省份</option>
                <option value="江苏省">江苏省</option>
                <option value="北京">北京</option>
                <option value="天津">天津</option>
                <option value="上海">上海</option>
                <option value="重庆">重庆</option>
                <option value="广东省">广东省</option>
                <option value="浙江省">浙江省</option>
                <option value="福建省">福建省</option>
                <option value="湖南省">湖南省</option>
                <option value="湖北省">湖北省</option>
                <option value="山东省">山东省</option>
                <option value="辽宁省">辽宁省</option>
                <option value="吉林省">吉林省</option>
                <option value="云南省">云南省</option>
                <option value="四川省">四川省</option>
                <option value="安徽省">安徽省</option>
                <option value="江西省">江西省</option>
                <option value="黑龙江省">黑龙江省</option>
                <option value="河北省">河北省</option>
                <option value="陕西省">陕西省</option>
                <option value="海南省">海南省</option>
                <option value="河南省">河南省</option>
                <option value="山西省">山西省</option>
                <option value="内蒙古">内蒙古</option>
                <option value="广西">广西</option>
                <option value="贵州省">贵州省</option>
                <option value="宁夏">宁夏</option>
                <option value="青海省">青海省</option>
                <option value="新疆">新疆</option>
                <option value="西藏">西藏</option>
                <option value="甘肃省">甘肃省</option>
                <option value="台湾省">台湾省</option>
                <option value="香港">香港</option>
                <option value="澳门">澳门</option>
                <option value="国外">国外</option>
              </select>
			  <BR>
			  出发城市： 
              <SELECT name="start_city" style="width:80">
                <OPTION>出发城市</OPTION>
              </SELECT> 

<BR><BR>
到达省份：<select name="end_sheng"  onchange="changecity2()" >
                <option selected>到达省份</option>
                <option value="江苏省">江苏省</option>
                <option value="北京">北京</option>
                <option value="天津">天津</option>
                <option value="上海">上海</option>
                <option value="重庆">重庆</option>
                <option value="广东省">广东省</option>
                <option value="浙江省">浙江省</option>
                <option value="福建省">福建省</option>
                <option value="湖南省">湖南省</option>
                <option value="湖北省">湖北省</option>
                <option value="山东省">山东省</option>
                <option value="辽宁省">辽宁省</option>
                <option value="吉林省">吉林省</option>
                <option value="云南省">云南省</option>
                <option value="四川省">四川省</option>
                <option value="安徽省">安徽省</option>
                <option value="江西省">江西省</option>
                <option value="黑龙江省">黑龙江省</option>
                <option value="河北省">河北省</option>
                <option value="陕西省">陕西省</option>
                <option value="海南省">海南省</option>
                <option value="河南省">河南省</option>
                <option value="山西省">山西省</option>
                <option value="内蒙古">内蒙古</option>
                <option value="广西">广西</option>
                <option value="贵州省">贵州省</option>
                <option value="宁夏">宁夏</option>
                <option value="青海省">青海省</option>
                <option value="新疆">新疆</option>
                <option value="西藏">西藏</option>
                <option value="甘肃省">甘肃省</option>
                <option value="台湾省">台湾省</option>
                <option value="香港">香港</option>
                <option value="澳门">澳门</option>
                <option value="国外">国外</option>
              </select>
			  <BR>
			  　到达城市： 
              <SELECT name="end_city" style="width:80">
                <OPTION>到达城市</OPTION>
              </SELECT> 


<BR><BR>
 	
   <legend>快递公司</legend>
  <?PHP 
  	global $DB, $db_prefix;
	$DB->db_query("SELECT * FROM {$db_prefix}express ");
    echo '<SELECT  id="express" name="express" style="width:80">';
	echo ' <OPTION>选择快递</OPTION>';
    while ($rs = $DB->db_fetch_array())
	{
	//if($rs['id']==1)
		//$checked="checked";
		//else
		//$checked="";

	echo '<OPTION>'.$rs['name'].'</OPTION>';
	//<input type="radio"  value="'.$rs['id'].'" id="express_id" name="express_id" /><label for="type">'.$rs['name'].'</label> &nbsp;&nbsp;';
	}

 echo '</SELECT> ';
	?>
  
			  <BR><BR>
			耗时:隔<INPUT TYPE="text" NAME="days"  style="width:30">天到
			<BR>

 
			<BR><BR>
			价格:<INPUT TYPE="text" NAME="cost"  style="width:200"> 
<BR><BR>
<INPUT TYPE="submit" value="提交">

	</form></CENTER>
 </BODY>
</HTML>
