<?php /* Smarty version Smarty-3.0.6, created on 2014-08-27 15:41:51
         compiled from "./templates/index.html" */ ?>
<?php /*%%SmartyHeaderCode:31959846553fd8bbf51ac70-54476976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '386e744df7e9238f7ec52b4ceb835215e0b2a942' => 
    array (
      0 => './templates/index.html',
      1 => 1407992920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31959846553fd8bbf51ac70-54476976',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<?php $_template = new Smarty_Internal_Template("homeheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<table id="DDTABLE" width=100%   ALIGN="center" border="1" cellspacing="0" cellpadding="0" bordercolor="#444444" bordercolorlight="#000000" bgcolor="#DFF7F9">
<tbody>
	<tr bgcolor="#6699CC" >
		<td>ID </td>
		<td>时间</td>
 		<td>跟单</td>		
		<td>客户</td>
		<td>产品</td>
		<td>物流</td>
		<td>联系人</td>
		<td>进度</td>	
		<td>备注</td>
		
		<td>操作</td>
	</tr>

<?php  $_smarty_tpl->tpl_vars['dingdan'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dingdan_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['dingdan']->key => $_smarty_tpl->tpl_vars['dingdan']->value){
?>
	<tr onMouseOver="this.bgColor='#cccccc'" onMouseOut="this.bgColor=''">
	
		<td <?php if (($_smarty_tpl->tpl_vars['dingdan']->value['LEIBIE']==1||$_smarty_tpl->tpl_vars['dingdan']->value['LEIBIE']==3)&&$_smarty_tpl->tpl_vars['dingdan']->value['FAPIAO']==1){?>
		bgColor='green'
		<?php }?>
		><a target="_blank" href="s.php?w=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
&type=3"><?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
</a></td>
		<td 
		<?php if (($_smarty_tpl->tpl_vars['dingdan']->value['LEIBIE']==2||$_smarty_tpl->tpl_vars['dingdan']->value['LEIBIE']==4)){?>
		bgColor='#6699CC'
		<?php }elseif($_smarty_tpl->tpl_vars['dingdan']->value['LEIBIE']==3){?>
		bgColor='yellow'
		<?php }?>
		><?php echo $_smarty_tpl->tpl_vars['dingdan']->value['SHIJIAN'];?>
</td>
 
		<td >
		<?php if ($_smarty_tpl->tpl_vars['dingdan']->value['GENDAN_ID']==1){?>
		Alex
		<?php }elseif($_smarty_tpl->tpl_vars['dingdan']->value['GENDAN_ID']==2){?>
		Eric
		<?php }else{ ?>
		其他
		<?php }?>		
		</td>			
		<td
		<?php if ($_smarty_tpl->tpl_vars['dingdan']->value['LEIBIE']==9){?>
		bgColor='#dddddd'
		<?php }?>

		>
		<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['NAME'];?>
 
		</td>
		<td
		<?php if ($_smarty_tpl->tpl_vars['dingdan']->value['JIEDAN']==0){?>
		style="background:FF957A"
		<?php }?>
		>
		
		 
		
		<a  href="index.php?act=product&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
&KeepThis=true&TB_iframe=true&height=400&width=600" class="thickbox"><?php echo $_smarty_tpl->tpl_vars['dingdan']->value['MODEL'];?>
</A>
		<a  href="index.php?act=addcp&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
&KeepThis=true&TB_iframe=true&height=400&width=600" class="thickbox  btn btn-small btn-primary" style="float:right">+</A>
		</td>
		<td><a  href="index.php?act=wuliu&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
&KeepThis=true&TB_iframe=true&height=400&width=600" class="thickbox">物流</a></td>
		<td><a  href="index.php?act=lianxiren&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
&KeepThis=true&TB_iframe=true&height=400&width=600" class="thickbox">
		联系人
		</a></td>
		<td <?php if ($_smarty_tpl->tpl_vars['dingdan']->value['JINGDU_BAIFENLV']!=3){?>background="1.jpg"<?php }?>><a  href="index.php?act=jindu&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
&KeepThis=true&TB_iframe=true&height=400&width=600" class="thickbox"><?php echo $_smarty_tpl->tpl_vars['dingdan']->value['JINGDU_BAIFENLV'];?>
/3</a></td>	
	
		<td >
		<a  href="index.php?act=beizhu&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
&KeepThis=true&TB_iframe=true&height=400&width=600" class="thickbox">
		<?php if ($_smarty_tpl->tpl_vars['dingdan']->value['BEIZHU']){?>
		有备注
		<?php }else{ ?>
		NO
		<?php }?>
		</a>
		</td>	
		
		
		<td><a href="#info<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
" rel=facebox>操作</a>
		<div id="info<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
" style="display:none;"> 
		  <a href="index.php?act=editdd&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
" class="thickbox">编辑订单</a><br>
		  <a href="index.php?act=editsh&did=<?php echo $_smarty_tpl->tpl_vars['dingdan']->value['ID'];?>
" class="thickbox">添加售后</a><br>
		  
		</div>
		
		</td>
	</tr>
<?php }} ?>

</tbody></table>
<?php echo $_smarty_tpl->getVariable('mult')->value;?>


<br><br>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 
