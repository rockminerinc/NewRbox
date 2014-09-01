<?php /* Smarty version Smarty-3.0.6, created on 2014-08-27 15:41:51
         compiled from "./templates/homeheader.html" */ ?>
<?php /*%%SmartyHeaderCode:44111382553fd8bbf5ca7c4-37954721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd61d512cd4aeca24f537ce4ec6af1da33456231' => 
    array (
      0 => './templates/homeheader.html',
      1 => 1408012777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44111382553fd8bbf5ca7c4-37954721',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单</title>

<script src="facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
<link href="facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link href="caiwu/css/bootstrap.css" rel="stylesheet">
<script src="facefiles/facebox.js" type="text/javascript"></script>
 
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox()
    })
</script>
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script type="text/javascript" src="js/thickbox-compressed.js"></script>
<link rel="stylesheet"  href="templates/show.css" type="text/css"   />
 
<link rel="stylesheet" href="js/thickbox.css" type="text/css" media="screen" />

<META   HTTP-EQUIV="Pragma"   CONTENT="no-cache">   
<META   HTTP-EQUIV="Cache-Control"   CONTENT="no-cache">   
<META   HTTP-EQUIV="Expires"   CONTENT="0">   

</HEAD>
<BODY >
<CENTER>

  <div class="navbar ">
      <div class="navbar-inner">
        <div class="container">
		
<div class="nav-collapse collapse" >
 
<ul class="nav">
  <li><a tabindex="-1" href="index.php">订单首页</a></li>
  <li><a tabindex="-1" href="index.php?leibie=1">Alex</a></li>
  <li><a tabindex="-1" href="index.php?leibie=2">Eric</a></li>

  
<li><a href="index.php?ok=0&daifahuo=1" class="">待发货</A></li>
<li><a href="index.php?ok=0" class="">未完成单</A></li>
<li><a href="index.php?act=editdd" TARGET="mainFrame" class=""><b>添加订单</b></A></li>

<li><a href="index.php?act=shouhou" TARGET="mainFrame" class="">售后</A></li>
 
<li><a href="index.php?leibie=9" class="">撤销单</A></li>
<li><a href="index.php?act=product" class="">销售汇总</A></li>
<li><a href="index.php?act=wuliu" class="">发货记录</A></li>
<!--a href="http://fowor123/jishiben/" TARGET="mainFrame">记事本</A--></li>

 
<li><a href="index.php?act=cpfenlei" TARGET="mainFrame" class="">产品分类</A> </li>

<li><a href="index.php?act=kucun" TARGET="mainFrame" class="">库存</a></li>
<li><a href="index.php?act=ruku&ok=1" TARGET="mainFrame" class="">入库</a></li>
<li><a href="index.php?act=editruku" TARGET="mainFrame" class="">加入库</a></li>
<li><a href="index.php?act=chuku&ok=1" TARGET="mainFrame" class="">出库</a></li>
 
 
<?php if ($_smarty_tpl->getVariable('uname')->value){?>
<li><a href="index.php?act=logout" class="">退出</a></li>
<?php }?>
<br>

</ul>

</div>
</div>
</div>
</div>


<div id="search">
<form name="search" action="s.php" method="GET">
			<select name="type" style="width:80px" >
			<option value="1" checked>用户名</option>
			<option value="2" >型号</option>
			</select>	
<input type="text" name="w" id="kw" maxlength="100"   onmouseover="this.style.borderColor='black';this.style.backgroundColor='#ddd'"  style="border-color:black; border-width:1px; "    
onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'"   >
<input type="submit" value="搜索" id="su">
</form>
</div>
</CENTER>