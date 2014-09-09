<?php /* Smarty version Smarty-3.0.6, created on 2014-09-09 13:00:56
         compiled from "./templates/reboot.html" */ ?>
<?php /*%%SmartyHeaderCode:547313567540e8988382e58-92280708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a460d37095701708c18f10160595535c17f45177' => 
    array (
      0 => './templates/reboot.html',
      1 => 1409306826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '547313567540e8988382e58-92280708',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 
 
 <center>
<form action="?act=reboot" method="post" accept-charset="utf-8">

<input name="reboot" value="Reboot" type="submit"   class="btn btn-large 	btn-primary">
 
<<?php ?>?php echo form_close(); ?<?php ?>>

 <?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
