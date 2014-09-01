<div id="content">

<?php echo form_open('c=home&m=setdns'); ?>

<table align=" " border="0" cellspacing="0">
<tbody>

<tr>
	<td align="right">Primary Nameserver</td>
	<td align="left">
		<input name="PDNS" value="<?php echo $nameservers[0];?>" size="30" type="text"   >
	</td>
</tr>

<tr>
	<td align="right">Secondary Nameserver</td>
	<td align="left">
		<input name="SDNS" value="<?php echo $nameservers[1];?>" size="30" type="text"  >
	</td>
</tr>


<tr>
<td align="right"></td></tr>
<tr>
<td colspan="2" align="center">
<input type="button" value="Refresh" onclick="window.location.href=''"  class="btn">
<input name="setdns" value="Update" type="submit"  class="btn">
</td>
</tr></tbody></table>


</form>
</div>