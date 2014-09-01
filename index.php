<?php
include('common.inc.php');

$act=$_GET['act'];
$smarty->assign("act",$act);

switch($act)
{

 	case 'setting':

 		if($_POST['submit'])
 		{
 			$need_reboot=0;
 			//ip
  			$network_content ="auto lo
auto eth0
allow-hotplug eth0
iface lo inet loopback
iface eth0 inet static\n";

			$ip_adress=trimall($_POST['ip_adress']);
			$mask=trimall($_POST['mask']);
			$gateway_id=trimall($_POST['gateway_id']);
 			
			//var_dump($ip_adress);
			if(!checkipaddres($ip_adress))
			{
				//var_dump($ip_adress) ;
				showmsg('ip address error!');
				exit;
			}


			$newmac = getmac();

			$network_content .= 'address '.$ip_adress."\n";
			$network_content .= 'netmask '.$mask."\n";
			$network_content .= 'gateway '.$gateway_id."\n";
			$network_content .= 'hwaddress ether '.$newmac."\n";



			//dns
			$pdns=trimall($_POST['pdns']); 
			$sdns=trimall($_POST['sdns']); 
 			$dns_content = 'nameserver '.$pdns."\n";
			$dns_content .= 'nameserver '.$sdns."";

			if(!checkipaddres($pdns)||!checkipaddres($sdns))
			{
				showmsg('dns address error!');
				exit;
			}
			//dns end

			//pools start

			$pool1_datas['url']  =trimall($_POST['pool_url1']);
			$pool1_datas['user'] =trimall($_POST['pool_worker1']); 
			$pool1_datas['pass'] =trimall($_POST['pool_passwd1']); 
 			$pool2_datas['url']  =trimall($_POST['pool_url2']);
			$pool2_datas['user'] =trimall($_POST['pool_worker2']);
			$pool2_datas['pass'] =trimall($_POST['pool_passwd2']);
			//$pool2_datas['freq'] =$this->input->post('freq', TRUE);

			$freq = trimall($_POST['freq']);

			$content['pools']=array($pool1_datas,$pool2_datas); 
			$content['api-listen']=true;
			$content['api-port']='4028';
			$content['expiry']='120';
			$content['failover-only']=true;
			$content['log']='5';
			$content['no-pool-disable']=true;
			$content['queue']='2';
			$content['scan-time']='60';
			$content['worktime']=true;
			$content['shares']='0';
			$content['kernel-path']='/usr/local/bin';
			$content['api-allow']='W:0/0';
			$content['icarus-options']='115200:1:1';
			$content['api-description']='cgminer 4.3.0';
			$content['hotplug']='5';
			$content['rmu-auto']=$freq;

			//echo   
			$data_cg = json_encode($content);
			$data_cg = str_replace("\\/", "/",  $data_cg);


			//////
			$file_pointer_ip = @fopen('/etc/network/interfaces','w'); 
			if($file_pointer_ip === false)
			{

				showmsg('/etc/network/interfaces open error');
				exec('sudo chmod 777 /etc/network/interfaces');
			}   
			else
			{

				fwrite($file_pointer_ip,$network_content);
				fclose($file_pointer_ip);
				//exec('sudo /etc/init.d/networking restart');
				//showmsg('IP update OK!');
			}
			///////
			$file_pointer_dns = fopen('/etc/resolv.conf','w'); 
			if($file_pointer_dns === false)
			{
				showmsg('/etc/resolv.conf open error');
				exec('sudo chmod 777 /etc/resolv.conf');
			}
			else
			{
				fwrite($file_pointer_dns,$dns_content);
				fclose($file_pointer_dns);
				//exec('sudo /etc/init.d/networking restart');
				//showmsg('DNS updated OK!');
			}
			////////
			exec('sudo /etc/init.d/networking restart');

			$file_pointer_cg = fopen('/etc/cgminer.conf','w');
			if($file_pointer_cg === false)
			{
				showmsg('/etc/cgminer.conf open error');
				exec('sudo chmod 777 /etc/cgminer.conf');
			}
			else
			{
				fwrite($file_pointer_cg,$data_cg);
				fclose($file_pointer_cg);
				$need_reboot = 1;
				//exec('sudo service cgminer stop &');
				//sleep(3);
				//exec('sudo service cgminer start &');
				//showmsg('Settings updated OK! ','?c=home&m=index');
			}


 			$file_pointer_set = fopen('/usr/share/nginx/www/data/setting.txt','w');
			if($file_pointer_set === false)
			{
				exec('sudo chmod 777 /usr/share/nginx/www/data/setting.txt');
				$file_pointer_set = fopen('/usr/share/nginx/www/data/setting.txt','w');

			}

			$device['dev_name']    		= trimall($_POST['dev_name']);
			$device['reboot_time']    	= trim($_POST['reboot_time']);
			//$device['monitor_url'] = $_POST['monitor_url']; 
			//$device['btckan_id']   = $_POST['btckan_id'];
			if(!empty($device['dev_name'])) 
			{
				$data_set=json_encode($device);
				var_dump($data_set);
				fwrite($file_pointer_set,$data_set);
				fclose($file_pointer_set);				
			}



 			showmsg('Update OK! May need reboot to  take effect',WEB_ROOT);	
			//else
			//showmsg('Update OK!');			
			//pools end
				
 		}
 		else
 		{
 			//ip
 			$lines = file('/etc/network/interfaces');
			foreach ($lines as $line_num => $line) 
			{
				$address = strstr($line, 'address');
				if($address)
				{
					$address_arr = explode(" ",$address);
					if($address_arr['1']!='ether')
					$ipdata['ip_adress']=$address_arr['1'];
				}
				
				//mask
				$Mask = strstr($line, 'netmask');
				if($Mask)
				{
					$Mask_arr = explode(" ",$Mask);
					$ipdata['mask']=$Mask_arr['1'];
				}
				//gateway
				$gateway = strstr($line, 'gateway');
				if($gateway)
				{
				$gateway_arr = explode(" ",$gateway);
				$ipdata['gateway_id']=$gateway_arr['1'];
				//echo $gateway_id;
				}

				$macaddr = strstr($line, 'hwaddress');
				if($macaddr)
				{
				$mac_arr = explode(" ",$macaddr);
				$ipdata['mac']=end($mac_arr);
				}
 

 			}

 			//dns

 			$lines = file('/etc/resolv.conf');
			foreach ($lines as $line_num => $line) 
			{
				$nameserver = strstr($line, 'nameserver');
				if($nameserver)
				{
					$address_arr = explode(" ",$nameserver);
					$nameservers[]=$address_arr['1'];
				}

			}	

			//pool

			$filename = "/etc/cgminer.conf";
		    $handle = fopen($filename, "r");
		    $contents = fread($handle, filesize ($filename));
		    fclose($handle);
			$data_arr = json_decode($contents);
			$data_arr2 = json_decode($contents,true);
			$pools_data=$data_arr->pools;
			$pool1 = $pools_data[0];
			$pool2 = $pools_data[1];
			$freq = $data_arr2['rmu-auto'];



	 		$filename = "/usr/share/nginx/www/data/setting.txt";
				$ctx = stream_context_create(array( 
					'http' => array( 
						        'timeout' => 1    //设置超时
						    ) 
						) 
					); 

			$contents= json_decode(file_get_contents($filename, 0, $ctx)) ;
			$mac		= 	@mac2int(getmac());
				//$mac = str_replace(":", '', $mac);
				//$mac=substr($mac,-6);

			$smarty->assign("monitor",$contents);		 			
			$smarty->assign("mac",$mac);
 			$smarty->assign("network",$ipdata);
 			$smarty->assign("nameservers",$nameservers);
 			$smarty->assign("pool1",$pool1);
 			$smarty->assign("pool2",$pool2);
 			$smarty->assign("freq",$freq);



 			$smarty->display('setting.html');	
 		}

  		

  	break;
  	case 'monitor':
  		if($_POST['submit'])
  		{
 					$file_pointer = fopen('/usr/share/nginx/www/data/setting.txt','w');
					if($file_pointer === false)
					{
						exec('sudo chmod 777 /usr/share/nginx/www/data/setting.txt');
						$file_pointer = fopen('/usr/share/nginx/www/data/setting.txt','w');

					}
					$device['dev_name'] = $_POST['dev_name'];
					$device['monitor_url'] =$_POST['monitor_url']; 
					$device['btckan_id'] =$_POST['btckan_id']; 
					$data=json_encode($device);
					fwrite($file_pointer,$data);
					fclose($file_pointer);
					showmsg('Monitor updated OK!'); 			
  		}
  		else
  		{
 			$filename = "/usr/share/nginx/www/data/setting.txt";
			$ctx = stream_context_create(array( 
				'http' => array( 
					        'timeout' => 1    //设置超时
					    ) 
					) 
				); 

			$contents= json_decode(file_get_contents($filename, 0, $ctx)) ;
			$mac		= 	@mac2int(getmac());
			//$mac = str_replace(":", '', $mac);
			//$mac=substr($mac,-6);

			$smarty->assign("monitor",$contents);		 			
			$smarty->assign("mac",$mac);		 			
  			$smarty->display('monitor.html');
  		}
  		
  	break;

  	case 'check':
  		$smarty->display('check.html');

  	break;


	//miners num
	case 'check_lsusb':
	 
		// lsusb command
		$command = 'sudo lsusb';
		exec( $command , $output );

		$aryReturn = array( 'BLADES'=>0 );

		// check result
		if ( !empty( $output ) && count( $output ) > 0 )
		{
			// run command success
			//$aryReturn['COMMAND'] = 1;
			// find mill
			foreach ( $output as $usb )
			{
				//Bus 001 Device 004: ID 10c4:ea60 Cygnal Integrated Products, Inc. CP210x UART Bridge / myAVR mySmartUSB light


				preg_match( '/.*Bus\s(\d+)\sDevice\s(\d+).*Cygnal\sIntegrated\sProducts.*CP210x\sUART\sBridge.*/' , $usb , $match_usb );
				if ( !empty( $match_usb[1] ) && !empty( $match_usb[2] ) )
				{
					$aryReturn['BLADES'] ++;
				}
			}
		}

		echo json_encode( $aryReturn );
		exit;
	 
	break;

	case 'check_time_zone':

	 
		$aryReturn = array( 'ZONE'=>0 );

		// date command
		$command = SUDO_COMMAND.'date -R';
		exec( $command , $output );

		// get current time
		//$cur = time();
		//$aryReturn['TIME'] = $cur;

		// check
		if ( !empty( $output ) && count( $output ) > 0 ) 
		{
			// match timezone
			//preg_match( '/\+0800/' , $output[0] , $match_zone );

			//if ( !empty( $match_zone[0] ) ) 
			//{
				$aryReturn['ZONE'] = $output[0];
			//}
		}

		echo json_encode( $aryReturn );
		exit;
	 
 	
 	break;

	case 'check_network':
	 
		$aryReturn = array( 'NET'=>0 , 'NET_DELAY'=>0 );

		// ping network
		$command_network = SUDO_COMMAND.'ping -c 1 -w 5 www.baidu.com';
		//$command_wiibox = SUDO_COMMAND.'ping -c 1 -w 5 www.google.com';

		exec( $command_network , $output_network );
		//exec( $command_wiibox , $output_wiibox );

		foreach ( $output_network as $data )
		{
			preg_match( '/.*time=(.*?)\sms.*/' , $data , $match_network );
			if ( !empty( $match_network[0] ) && !empty( $match_network[1] ) )
			{
				$aryReturn['NET'] = 1;
				$aryReturn['NET_DELAY'] = $match_network[1];
			}
		}
	


		echo json_encode( $aryReturn );
		exit;
	 
	break;

	case 'check_ip':
	 
		// get ip
		$os = DIRECTORY_SEPARATOR=='\\' ? "windows" : "linux";
		$mac_addr = new CMac( $os );
		$ip_addr = new CIp( $os );

		$aryReturn = array( 'IP'=>0 , 'MAC'=>0 );

		$aryReturn['IP'] = $ip_addr->ip_addr;
		$aryReturn['MAC'] = $mac_addr->mac_addr;

		echo json_encode( $aryReturn );
		exit;
	 

	break;

	case 'reboot':
		if($_POST['reboot'])
		{

			$command = 'sudo reboot 2>&1';

			exec( $command , $output ,$result);
 
			showmsg('Rebooting...Wait for 30s...');	
		}
		else
		$smarty->display('reboot.html');
	break;


	case 'post_to_monitor':
 
		$data['ip']			= 	getip();
		$data['mac']			= 	getmac();
		//var_dump($data['mac']);
		$data['ipint']			= 	ip2long($data['ip']);
 
		$filename = "/usr/share/nginx/www/data/setting.txt";
		$ctx = stream_context_create(array( 
					        'http' => array( 
					            'timeout' => 1    //设置超时
					            ) 
					        ) 
			); 
		$file_data = file_get_contents($filename, 0, $ctx);
		
		$contents=json_decode($file_data) ;
 		//$server =$contents->monitor_url;
 		$server ='http://rockhash.com/';

 		if(empty($server))
 		{
 			echo 'server is blank';
 			exit;
 		}

		$data['type']	= '9';
		$data['dev_name']	= $contents->dev_name;

 
		$data['dev_num']	= 	dev_num();
		$sumary = request('summary');
		$data['asc_elapsed']  		= 	$sumary['SUMMARY']['Elapsed'];//$data_array[0];
		$data['asc_mhs_5s']  	= 	$sumary['SUMMARY']['MHS 5s'];//$data_array[0];
		$data['asc_mhs_5m']  	= 	$sumary['SUMMARY']['MHS 5m'];//$data_array[1];
		$data['asc_mhs_15m']  	= 	$sumary['SUMMARY']['MHS 15m'];//$data_array[2];
		$data['asc_mhs_av']  	= 	$sumary['SUMMARY']['MHS av'];
		$data['asc_last_share_time']  	= 	$sumary['SUMMARY']['Last getwork'];
 
		$data['event_time']  	=	time();
  
		$miner_data['ip'] = $data['ip'];
		$miner_data['mac'] = $data['mac'];
		$miner_data['ipint'] =$data['ipint'];
		$miner_data['dev_name'] =$data['dev_name'];
		$miner_data['dev_num'] =$data['dev_num'];
		$miner_data['asc_mhs_5s'] =$data['asc_mhs_5s'];
		$miner_data['asc_mhs_5m'] =$data['asc_mhs_5m'];
		$miner_data['asc_mhs_15m'] =$data['asc_mhs_15m'];
		$miner_data['asc_mhs_av'] =$data['asc_mhs_av'];
		$miner_data['asc_last_share_time'] =$data['asc_last_share_time'];
		$miner_data['event_time'] =$data['event_time'];
		$miner_data['asc_elapsed'] =$data['asc_elapsed'];


		$devices = request('devs');

		foreach ($devices as $key => $dev) {
			if($key=="STATUS")
				continue;
			foreach ($dev as $key2 => $value) {
				if($key2=="Temperature")
					$temp_arry[]=$value;
			}
			
			# code...
		}

		$max_key = array_search(max($temp_arry),$temp_arry); 

		$miner_data['temperature'] = floor($temp_arry[$max_key]);//max Temperature

 		$miner_json = json_encode($miner_data);
  		
		$url=$server."index.php?c=home&m=getdata&data=".$miner_json;
		//$btckan_url="http://localhost/index.php?act=btckan&m=send_status";
 		//var_dump($btckan_url);
		$ctx = stream_context_create(array( 
					        'http' => array( 
					            'timeout' => 5    //time out
					            ) 
					        ) 
			); 
		$re=file_get_contents($url, 0, $ctx);//($url);
		//$re=geturl($url);//($url);
		//$re2=geturl($btckan_url);//($url);

		//定时重启
		var_dump($contents->reboot_time);
		var_dump($miner_data['asc_elapsed']);

		if($contents->reboot_time != 0&&$contents->reboot_time <= $miner_data['asc_elapsed'])
			exec('sudo reboot');


 		var_dump($re);
		//echo $re2;

	break;

  	default:
		$sumary_data =  request('summary');

 		$sumary = $sumary_data['SUMMARY'];
 		$sumary['Elapsed']=timed_diff($sumary['Elapsed']);
		$pools_data =  request('pools');
		unset($pools_data['STATUS']);

		//var_dump($pools_data);
		$pools_data['POOL0']['Last Share Time']=timed_diff(time()-$pools_data['POOL0']['Last Share Time']);
		if($pools_data['POOL1']['Last Share Time']==0)
			$pools_data['POOL1']['Last Share Time']='Never';
		else	
		$pools_data['POOL1']['Last Share Time']=timed_diff(time()-$pools_data['POOL1']['Last Share Time']);





 		//$pools  =  request('pools');
		$devs_data =   request('devs');
		unset($devs_data['STATUS']);
 
		$smarty->assign("pools",$pools_data);
		$smarty->assign("devs",$devs_data);
		$smarty->assign("sumary",$sumary);
 		$smarty->display('home.html');
 		break;

}
 

function DelItems($data_array,$type = 'sumary')
{
	if($type=='sumary')
	$items_array  = array('Found Blocks','Getworks','Utility','Discarded','Stale','Get Failures','Local Work',
		'Remote Failures','Network Blocks','Work Utility','Difficulty Accepted','Difficulty Rejected',
		'Difficulty Stale','Best Share','Pool Rejected%','Pool Stale%','Accepted','Rejected','Hardware Errors','Device Rejected%','Device Hardware%');
	else if($type == 'pools')
		$items_array  = array('POOL','Status','Priority','Quota','Long Poll','Getworks','Accepted','Rejected',
			'Discarded','Works','Stale','Get Failures','Remote Failures','Diff1 Shares','Proxy Type','Proxy',
			'Difficulty Accepted','Difficulty Rejected','Difficulty Stale','Last Share Difficulty','Has Stratum','Stratum Active',
			'Has GBT','Best Share','Pool Stale%')	;
	else if($type == 'dev')
		$items_array  = array('POOL');

		foreach($data_array as $k=>$v)
		{
			foreach ($items_array as $item) 
			{

			    if($k==$item)
			    {
			        unset($data_array[$k]);
			        unset($k);
			    }
			}

		}		 

	return $data_array;
}

function FormartData($data_array)
{
	foreach ($data_array as $key => $value) {
		# code...
		if($key == 'Elapsed')
		{

		}
		if($key == 'Last getwork')
		{

		}
		if($key == 'MHS av'|| $key == 'MHS 5s'|| $key == 'MHS 1m'|| $key == 'MHS 5m'|| $key == 'MHS 15m'|| $key == 'MHS 5s'|| $key == 'Total MH')
		{

		}
	}

}

?>