<?php /* Smarty version Smarty-3.0.6, created on 2014-09-09 21:15:47
         compiled from "./templates/header.html" */ ?>
<?php /*%%SmartyHeaderCode:1709399313540efd83190c74-67863599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd701c050746a5ee258b58a5bc4dd80a198b99e51' => 
    array (
      0 => './templates/header.html',
      1 => 1410268469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1709399313540efd83190c74-67863599',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New R-BOX</title>
<link href="static/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="static/css/layout.css" rel="stylesheet" type="text/css" />
<link href="static/css/hint.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="container">
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container"  style="width:98%">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" class="brand"><img src="static/img/logo.png" style="height:20px"></a>

          <div class="nav-collapse collapse">
            <ul class="nav">
              <li <?php if ($_smarty_tpl->getVariable('act')->value==''){?>class="active"<?php }?>><a href="/">Home</a></li>
              <li <?php if ($_smarty_tpl->getVariable('act')->value=='setting'){?>class="active"<?php }?>><a href="?act=setting">Setting</a></li>
              <li <?php if ($_smarty_tpl->getVariable('act')->value=='reboot'){?>class="active"<?php }?>><a href="?act=reboot">Reboot</a></li>
            </ul>
           </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


	  

  <div id="mainContent">