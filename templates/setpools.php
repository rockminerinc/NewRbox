<div id="content">


<form name="form3" method="post" action="">
<table align=" " border="0" cellspacing="0">
<tbody>
<tr>
	<td align="right">Pool 1</td>
	<td align="left">
		<input name="pool_url1" value="<?php echo $data_pool1->url;?>" size="30" type="text"  >
	</td>

</tr>
<tr>
	<td align="right">Pool1 worker</td>
	<td align="left">
		<input name="pool_worker1" value="<?php echo $data_pool1->user;?>" size="30" type="text"></td>
</tr>
<tr>
	<td align="right">Pool1 password</td>
	<td align="left">
		<input name="pool_passwd1" value="<?php echo $data_pool1->pass;?>" size="30" type="text">
	</td>
</tr>


<tr>
<td colspan="2"> <hr></td>
</tr>
<tr>
	<td align="right">Pool 2</td>
	<td align="left">
		<input name="pool_url2" value="<?php echo $data_pool2->url;?>" size="30" type="text" mouseev="true" keyev="true" >
	</td>

</tr>
<tr>
	<td align="right">Pool2 worker</td>
	<td align="left">
		<input name="pool_worker2" value="<?php echo $data_pool2->user;?>" size="30" type="text"></td>
</tr>
<tr>
	<td align="right">Pool2 password</td>
	<td align="left">
		<input name="pool_passwd2" value="<?php echo $data_pool2->pass;?>" size="30" type="text">
	</td>
</tr>

<tr>
<td colspan="2"> <hr></td>
</tr>
<tr>
	<td align="right">Frequency</td>
	<td align="left">
		<input name="freq" value="<?php echo $freq;?>" size="30" type="text">
	</td>
</tr> 


<tr>
<td align="right"></td></tr>
<tr>
<td colspan="2"  align="center">
<input type="button" value="Refresh" onclick="window.location.href=''"   class="btn">
<input name="update" value="Update" type="submit"   class="btn">
</td>
</tr></tbody></table>

</form>


</div>