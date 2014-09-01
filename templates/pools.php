<div id="content">

<center>
<a href="?c=home&m=switchpool&id=0" class="btn btn-primary">Switch to Pool 0</a>
<a href="?c=home&m=switchpool&id=1" class="btn btn-primary">Switch to Pool 1</a>
</center>

<br>

<table class="table table-striped" style="width:80%">
<tr style="font-weight:bold;">
	<td>POOL</td><td>URL</td><td>Status</td><td>Priority</td><td>User</td><td>Last Share Time</td><td>Pool Rejected%</td>
</tr>
 
<?php foreach ($r as $key=>$devs): ?>
<?php
if($key=='STATUS')continue;
?>

 <tr 
 				<?php 
 				if($key=="Hardware Errors") 
 					echo ' class="error" ';
 				else if($key=="MHS av") 
 					echo ' class="success" ';
 				
				else if($str=="Alive") 
 					echo ' class="success" ';
				 else if($str=="Dead") 
					echo ' class="error" '; 

				
 				?>
>
           <?php foreach ($devs as $key=>$str): ?>
				
				
				<?php
 
					if($key!='POOL' && $key!='URL' && $key!='Status' && $key!='User' && $key!='Priority' && $key!='Last Share Time' && $key!='Pool Rejected%')
						continue;

					
					
					if($key=='Last Share Time')
					{
						//$key="Time";
						$str = date('Y/m/d H:i:s',$str);
					}
										
					if($key=='MHS av'||$key=='MHS 5s'||$key=='MHS 1m'||$key=='MHS 5m'||$key=='MHS 15m')
					{
						//$key="Time";
						$str .= " MHS";
					}	
									
					 
				?>

				
               <td><?php echo $str; ?></td>
				 
            <?php endforeach; ?>
</tr>
       

 
 <?php endforeach; ?>
</table>




<div style="width:70%">

<form name="form3" method="post" action="">
<table style="float:left;" border="0" cellspacing="0">
 
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


</table>


<table style="float:right;">

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


 </table>

<table style="">
<tr>
	<td align="right">Frequency</td>
	<td align="left">
		<select name="frequency">
			<option value = "300" <?php if($frequency=='300') echo 'selected';?>  >300M</option>
			<option value = "320" <?php if($frequency=='320') echo 'selected';?>  >320M</option>
			<option value = "350" <?php if($frequency=='350') echo 'selected';?>  >350M</option>
		</select>
	</td>
</tr>
 
 </table>

<tr>
<td  align="center">
<input type="button" value="Refresh" onclick="window.location.href=''"   class="btn btn-primary">
<input name="update" value="Update" type="submit"   class="btn btn-primary">
</td>
</tr>


</form>

</div>


</div>