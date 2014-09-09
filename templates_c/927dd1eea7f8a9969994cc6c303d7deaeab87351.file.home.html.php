<?php /* Smarty version Smarty-3.0.6, created on 2014-09-09 12:55:19
         compiled from "./templates/home.html" */ ?>
<?php /*%%SmartyHeaderCode:312813173540e8837313412-12739388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '927dd1eea7f8a9969994cc6c303d7deaeab87351' => 
    array (
      0 => './templates/home.html',
      1 => 1409305680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312813173540e8837313412-12739388',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 
 

<div id="content">
<table class="table table-striped" style="width:90%">
<tr style="font-weight:bold;"> 
	<td>Elapsed</td><td>GHS av</td><td>GHS 5s</td><td>GHS 1m</td><td>GHS 5m</td><td>GHS 15m</td>  
</tr>
<tr >
<td> <?php echo $_smarty_tpl->getVariable('sumary')->value['Elapsed'];?>
</td>         
<td> <?php echo sprintf("%.1f",($_smarty_tpl->getVariable('sumary')->value['MHS av']*0.001));?>
</td>         
<td> <?php echo sprintf("%.1f",($_smarty_tpl->getVariable('sumary')->value['MHS 5s']*0.001));?>
</td>         
<td> <?php echo sprintf("%.1f",($_smarty_tpl->getVariable('sumary')->value['MHS 1m']*0.001));?>
</td>         
<td> <?php echo sprintf("%.1f",($_smarty_tpl->getVariable('sumary')->value['MHS 5m']*0.001));?>
</td>         
<td> <?php echo sprintf("%.1f",($_smarty_tpl->getVariable('sumary')->value['MHS 15m']*0.001));?>
</td>         
  </tr>
 
</table>

<table class="table table-striped" style="width:90%">
<tr style="font-weight:bold;"> 
	<td>URL</td><td>Worker</td><td>Last Share Time</td>   
</tr>
	<?php  $_smarty_tpl->tpl_vars['pool'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pools')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pool']->key => $_smarty_tpl->tpl_vars['pool']->value){
?>


<tr >
<td> <?php echo $_smarty_tpl->tpl_vars['pool']->value['URL'];?>
</td>         
<td> <?php echo $_smarty_tpl->tpl_vars['pool']->value['User'];?>
</td>         
<td> <?php echo $_smarty_tpl->tpl_vars['pool']->value['Last Share Time'];?>
</td>         
      
  </tr>
 <?php }} ?>
</table>


<table class="table table-striped" style="width:90%">


       <tr style="font-weight:bold;">
       	<td width=50px>ID</td><td>Temperature</td><td>GHS av</td><td>GHS 5s</td><td>GHS 15m</td>
       </tr>

<?php  $_smarty_tpl->tpl_vars['dev'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('devs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['dev']->key => $_smarty_tpl->tpl_vars['dev']->value){
?>
<?php if ($_smarty_tpl->tpl_vars['dev']->value['Enabled']=='Y'){?>
  			<tr >
 
 			<td><?php echo $_smarty_tpl->tpl_vars['dev']->value['PGA']+1;?>
</td>	
 			<td><?php echo sprintf("%d",$_smarty_tpl->tpl_vars['dev']->value['Temperature']);?>
</td>	
 			<td><?php echo sprintf("%.1f",($_smarty_tpl->tpl_vars['dev']->value['MHS av']*0.001));?>
</td>	
 			<td><?php echo sprintf("%.1f",($_smarty_tpl->tpl_vars['dev']->value['MHS 5s']*0.001));?>
</td>	
 			<td><?php echo sprintf("%.1f",($_smarty_tpl->tpl_vars['dev']->value['MHS 15m']*0.001));?>
</td>	
 
				 
        </tr>      
<?php }?>
 <?php }} ?>
 </table>


</div>
 



<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
