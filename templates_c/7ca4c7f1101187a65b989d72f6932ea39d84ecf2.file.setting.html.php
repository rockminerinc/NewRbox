<?php /* Smarty version Smarty-3.0.6, created on 2014-09-09 21:31:20
         compiled from "./templates/setting.html" */ ?>
<?php /*%%SmartyHeaderCode:1038743054540f01282799b1-42809026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ca4c7f1101187a65b989d72f6932ea39d84ecf2' => 
    array (
      0 => './templates/setting.html',
      1 => 1410269476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1038743054540f01282799b1-42809026',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 
<div id="content"  >
<p style="text-align:">	 
		<a href="http://rockhash.com/m/<?php echo $_smarty_tpl->getVariable('mac')->value;?>
"  target="_blank"  class="hint--right" data-hint="Share link at RockHash.com">
			http://rockhash.com/m/<?php echo $_smarty_tpl->getVariable('mac')->value;?>

		</a>
</p>
<form action="?act=setting" method="post" accept-charset="utf-8">

<div class="" style="float:left;padding-right:30px">



<table align=" " border="0" cellspacing="0" class="table ">
<tbody>

	<tr>
	<td align="right">Device Name(<a href="javascript:void(0)" class="hint--right" data-hint="The name showed at RockHash.com">?</a>)</td>
	<td align="left">
		<input name="dev_name" value="<?php echo $_smarty_tpl->getVariable('monitor')->value->dev_name;?>
" size="50" type="text" mouseev="true" keyev="true" >
	</td>
</tr>

<tr>
	<td align="right">IP(<a href="javascript:void(0)" class="hint--right" data-hint="This device's IP address">?</a>)</td>
	<td align="left">
		<input name="ip_adress" value="<?php echo $_smarty_tpl->getVariable('network')->value['ip_adress'];?>
 " size="30" type="text" mouseev="true" keyev="true" >
	</td>
</tr>
<tr>
	<td align="right">Mask</td>
	<td align="left">
		<input name="mask" value="<?php echo $_smarty_tpl->getVariable('network')->value['mask'];?>
" size="30" type="text"></td>
</tr>
<tr>
	<td align="right">Gateway</td>
	<td align="left">
		<input name="gateway_id" value="<?php echo $_smarty_tpl->getVariable('network')->value['gateway_id'];?>
" size="30" type="text">
	</td>
</tr>
 
<tr>
	<td align="right">Primary DNS</td>
	<td align="left">
		<input name="pdns" value="<?php echo $_smarty_tpl->getVariable('nameservers')->value[0];?>
" size="30" type="text"   >
	</td>
</tr>

<tr>
	<td align="right">Secondary DNS</td>
	<td align="left">
		<input name="sdns" value="<?php echo $_smarty_tpl->getVariable('nameservers')->value[1];?>
" size="30" type="text"  >
	</td>
</tr>
 
<tr>
	<td align="right">* Frequency(<a href="javascript:void(0)" class="hint--right" data-hint="Should be divisible by 10,such as 270/280/290">?</a>)</td>
	<td align="left">
		<input name="freq" value="<?php echo $_smarty_tpl->getVariable('freq')->value;?>
" size="30" type="text">
	</td>
</tr> 
 
</table >

</div>

<div class="setting"  style="float:left; ">

<table  align=" " border="0" cellspacing="0" class="table">
<tbody>


<tr>
	<td align="right">* Pool 1(<a href="javascript:void(0)" class="hint--right" data-hint="url:port;eg:us1.ghash.io:3333">?</a>)</td>
	<td align="left">
		<input name="pool_url1" value="<?php echo $_smarty_tpl->getVariable('pool1')->value->url;?>
" size="30" type="text"  >
	</td>

</tr>
<tr>
	<td align="right">* Worker 1</td>
	<td align="left">
		<input name="pool_worker1" value="<?php echo $_smarty_tpl->getVariable('pool1')->value->user;?>
" size="30" type="text"></td>
</tr>
<tr>
	<td align="right">* Password 1</td>
	<td align="left">
		<input name="pool_passwd1" value="<?php echo $_smarty_tpl->getVariable('pool1')->value->pass;?>
" size="30" type="text">
	</td>
</tr>
 
 
<tr>
	<td align="right">* Pool 2(<a href="javascript:void(0)" class="hint--right" data-hint="url:port;eg:us1.ghash.io:3333">?</a>)</td>
	<td align="left">
		<input name="pool_url2" value="<?php echo $_smarty_tpl->getVariable('pool2')->value->url;?>
" size="30" type="text"  >
	</td>

</tr>
<tr>
	<td align="right">* Worker 2</td>
	<td align="left">
		<input name="pool_worker2" value="<?php echo $_smarty_tpl->getVariable('pool2')->value->user;?>
" size="30" type="text"></td>
</tr>
<tr>
	<td align="right">* Password 2</td>
	<td align="left">
		<input name="pool_passwd2" value="<?php echo $_smarty_tpl->getVariable('pool2')->value->pass;?>
" size="30" type="text">
	</td>
</tr>

<tr>
	<td align="right">Auto Reboot(<a href="javascript:void(0)" class="hint--right" data-hint="Seconds to auto reboot.300 = 5 minutes.0 = never reboot">?</a>)</td>
	<td align="left">
		<input name="reboot_time" value="<?php echo $_smarty_tpl->getVariable('monitor')->value->reboot_time;?>
" size="30" type="text">
	</td>
</tr> 
 
 </tbody></table>

</div>


<div style=" width:50%; margin:0 auto;padding:0px;clear:both;" >

<p style=" color:red;">* Needs to reboot after change</p>
<input type="button" value="Refresh" onclick="window.location.href=''" class="btn">
<input name="submit" value="Submit" type="submit"  class="btn btn-primary">
</div>
  
</form>
</div>
 

<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 