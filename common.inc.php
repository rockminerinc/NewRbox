<?PHP
//require_once('config.inc.php');
//include_once('mysql.class.php');
include('libs/Smarty.class.php');
 
$smarty = new Smarty(); 
 

$smarty->template_dir = "./templates";   
$smarty->debugging = 0;

$smarty->caching=0; 
$smarty->cache_lifetime=10; 
$smarty->compile_dir=$path;
$smarty->cache_dir=$path;
$smarty->compile_locking=false;
 
$smarty->compile_dir = "./templates_c";  
$smarty->cache_dir = "./cache";  
   
$smarty->left_delimiter = "{{";   
$smarty->right_delimiter = "}}"; 
//$smarty->php_handling = 1 ;

define('WEB_ROOT','http://'.$_SERVER['HTTP_HOST']);


function showmsg($msg,$linkname="home",$link="./")
{
	global $smarty;
	$smarty->assign("message",$msg);
	$smarty->assign("linkname",$linkname);
	$smarty->assign("link",$link);
	@$smarty->display('message.html');
	exit;
}

 

function getsock($addr, $port)
{
 $socket = null;
 $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
 if ($socket === false || $socket === null)
 {
	$error = socket_strerror(socket_last_error());
	$msg = "socket create(TCP) failed";
	echo "ERR: $msg '$error'\n";
	return null;
 }

 $res = socket_connect($socket, $addr, $port);
 if ($res === false)
 {
	$error = socket_strerror(socket_last_error());
	$msg = '<center class="alert alert-danger bs-alert-old-docs">CGMiner is not running...If it is not restart after minutes ,please try to reboot.</center>';

	socket_close($socket);
	echo $msg;
	@exec('sudo service cgminer stop ');
	@exec('sudo service cgminer stop ');
	@exec('sudo service cgminer stop ');
	$network = get_network();
	$gateway = $network['gateway_id'];
	@exec('sudo  route add default gw '.$gateway);
	//sleep(3);
	//@exec('sudo service cgminer start &');

	//showmsg($msg,'?c=home&m=reboot','10000');
	//echo "ERR: $msg '$error'\n";
	//exit;
	return null;
 }
 return $socket;
}

function get_network()
{
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
	return 	$ipdata;		

}



#
# Slow ...
function readsockline($socket)
{
 $line = '';
 while (true)
 {
	$byte = socket_read($socket, 1);
	if ($byte === false || $byte === '')
		break;
	if ($byte === "\0")
		break;
	$line .= $byte;
 }
 return $line;
}
#


function request($cmd)
{
 $socket = getsock('127.0.0.1', 4028);
 if ($socket != null)
 {
	socket_write($socket, $cmd, strlen($cmd));
	$line = readsockline($socket);
	socket_close($socket);

	if (strlen($line) == 0)
	{
		echo "WARN: '$cmd' returned nothing\n";
		return $line;
	}

	//print "$cmd returned '$line'\n";
	//print $line;
	
	if (substr($line,0,1) == '{')
		return json_decode($line, true);

	$data = array();

	$objs = explode('|', $line);
	foreach ($objs as $obj)
	{
		if (strlen($obj) > 0)
		{
			$items = explode(',', $obj);
			$item = $items[0];
			$id = explode('=', $items[0], 2);
			if (count($id) == 1 or !ctype_digit($id[1]))
				$name = $id[0];
			else
				$name = $id[0].$id[1];

			if (strlen($name) == 0)
				$name = 'null';

			if (isset($data[$name]))
			{
				$num = 1;
				while (isset($data[$name.$num]))
					$num++;
				$name .= $num;
			}

			$counter = 0;
			foreach ($items as $item)
			{
				$id = explode('=', $item, 2);
				if (count($id) == 2)
					$data[$name][$id[0]] = $id[1];
				else
					$data[$name][$counter] = $id[0];

				$counter++;
			}
		}
	}

	return $data;
 }

 return null;
}


function time_tran($time){
    $t=time()-$time;
    $f=array(
        '31536000'=>' Year',
        '2592000'=>' month',
        '604800'=>' week',
        '86400'=>' day',
        '3600'=>' hour',
        '60'=>' minutes',
        '1'=>' seconds'
    );
    foreach ($f as $k=>$v)    {
        if (0 !=$c=floor($t/(int)$k)) {
            return $c.$v.' ago ';
        }
    }
}

function timed_diff($timediff)
{
 
 
     $days = intval($timediff/86400);
     $remain = $timediff%86400;
     $hours = intval($remain/3600);
     $remain = $remain%3600;
     $mins = intval($remain/60);
     $secs = $remain%60;

     if($days)
     	$res = $days.'d ';

     if($hours)
     	$res .= $hours.'h ';


     if($mins)
     	$res .= $mins.'m ';

     if($secs)
     	$res .= $secs.'s ';
   
     //if
     //$res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs);
     return $res.' Ago';
}


function checkipaddres($ip) {

    if(preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/", $ip)) 
    	return true; 
    else 
    	return false; 
  
}

function trimall($_str)
{
	if(empty($_str))
	{
		showmsg('Settings should not be empty!') ;
		return '';
		exit;
	}

	$_str =preg_replace("/\s/","",$_str);
	return $_str;
}

 function generatemac()
	{

			$strTmp = '1234567890abcdef';
			$mac_str_1_p1 = $strTmp{rand(0, strlen($strTmp)-1)};
			$mac_str_1_p2 = $strTmp{rand(0, strlen($strTmp)-1)};
			$mac_str_2_p1 = $strTmp{rand(0, strlen($strTmp)-1)};
			$mac_str_2_p2 = $strTmp{rand(0, strlen($strTmp)-1)};
			$mac_str_3_p1 = $strTmp{rand(0, strlen($strTmp)-1)};
			$mac_str_3_p2 = $strTmp{rand(0, strlen($strTmp)-1)};
			$mac_str_4_p1 = $strTmp{rand(0, strlen($strTmp)-1)};
			$mac_str_4_p2 = $strTmp{rand(0, strlen($strTmp)-1)};

			$mac_str_1 = $mac_str_1_p1.$mac_str_1_p2;
			$mac_str_2 = $mac_str_2_p1.$mac_str_2_p2;
			$mac_str_3 = $mac_str_3_p1.$mac_str_3_p2;
			$mac_str_4 = $mac_str_4_p1.$mac_str_4_p2;

			$aryMacData = explode( ':' , $old_mac );
			$aryMacData[count( $aryMacData )-4] = $mac_str_1;
			$aryMacData[count( $aryMacData )-3] = $mac_str_2;
			$aryMacData[count( $aryMacData )-2] = $mac_str_3;
			$aryMacData[count( $aryMacData )-1] = $mac_str_4;

			$new_mac = implode( ':' , $aryMacData );
			$newmac = '70:00'.$new_mac;
			return $newmac;
			//@exec("sudo fconfig eth0 down");
			//@exec("ifconfig eth0 hw ether ".$newmac);
			//@exec("ifconfig eth0 up ");

	}


function getip()
{
		@exec("ifconfig -a", $return_array);

		$temp_array = array();
		foreach ( $return_array as $value )
		{
			if ( preg_match_all( "/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/i", $value, $temp_array ) )
			{
				$tmpIp = $temp_array[0];
				if ( is_array( $tmpIp ) ) $tmpIp = array_shift( $tmpIp );
				$ip_addr = $tmpIp;
				break;
			}
		}

		unset($temp_array);
		return $ip_addr;

}

function getmac()
{
		@exec("ifconfig -a", $return_array);

		$temp_array = array();
		foreach ( $return_array as $value )
		{
			if ( preg_match( "/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i", $value, $temp_array ) )
			{
				$mac_addr = $temp_array[0];
				break;
			}
		}

		unset($temp_array);
		return $mac_addr; 
 }


function geturl($url){

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);

	$result=curl_exec($ch); 
	curl_close($ch); 
	return $result;
	}

function dev_num()
{
		// lsusb command
		$command = 'sudo lsusb';
		@exec( $command , $output );

		$dev_num=0;

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
					$dev_num ++;
				}
			}
		}
		return $dev_num;

	}

function mac2int($mac) {
	$mac=str_replace(":", "", $mac);
	
    return base_convert($mac, 16, 10);
}


?>