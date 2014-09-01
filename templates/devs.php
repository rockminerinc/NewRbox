<div id="content">

<table class="table table-striped" >


       <tr style="font-weight:bold;">
       	<td width=50px>ID</td><td>Enabled</td><td>Temperature</td><td>GHS av</td><td>GHS 5s</td><td>GHS 15m</td><td>Device Rejected%</td>
       </tr>

<?php foreach ($r as $key=>$devs): ?>

<?php
if($key=='STATUS')continue;
?>

       <tr >

            <?php foreach ($devs as $key=>$str): ?>
				<?php

					if($key!="ID"&&$key!="Enabled"&&$key!="Temperature"&&$key!="User"&&$key!="MHS av"&&$key!="MHS 5s"&&$key!="MHS 15m"&&$key!="Device Rejected%") 
						continue;

 					if($key=='Device Hardware%'||$key=='Pool Rejected%')
 					{
 						//$key="Time";
 						$str = number_format($str,2);
 					}

					if($key=='Temperature')
 					{
 						//$key="Time";
 						$str = floor($str);
 						if($str>55)
 							$str = '<span style="color:red;font-weight:bold;padding:5px 10px 5px 10px;background: #F3E86C;">'.$str.'</span>';

 					}

					if($key=='Device Rejected%')
 					{
 						//$key="Time";
 						$str = number_format($str,2);
 					}


 					if($key=='Enabled'&&$str=="N")
 					{
 						//$key="Time";
 						//continue;
 						$str = '<span style="color:red;font-weight:bold;">NO</span>';
 					}
										
 					if($key=='MHS av'||$key=='MHS 5s'||$key=='MHS 1m'||$key=='MHS 5m'||$key=='MHS 15m')
 					{
 						//$key="Time";
 						$key=str_replace("MHS", "GHS", $key);
 						$str=floor($str*0.001);
 						$str .=" GHS";
 					}					
			
					
				?>
			<td><?php echo $str; ?></td>
				 
            <?php endforeach; ?>
       </tr>      

 
 <?php endforeach; ?>
 </table>

 </div>