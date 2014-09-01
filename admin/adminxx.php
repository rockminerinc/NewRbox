<?php
include "header.php";
require_once('../common.inc.php');

?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<b>产品型号列表</b><BR>
<?

function multLink($currentPage, $totalRecords, $url, $pageSize = 10)
{
	global $func_message;
		$func_message['prev']="上一页";
	$func_message['next']="下一页";
	if ($totalRecords <= $pageSize) return '';
	$mult = '';
	$totalPages = ceil($totalRecords / $pageSize);
	$mult .= '<div class="pages"><div class="nextprev">';
	if ($currentPage > 1)
	{
		$mult .= '<a href="'.$url.'page='.($currentPage - 1).'">'.$func_message['prev'].'</a>';
	}
	else
	{
		$mult .= '<span class="nextprev">'.$func_message['prev'].'</span>';	
	}
	if ($totalPages < 13)
	{
		for ($counter = 1; $counter <= $totalPages; $counter++)
		{
			if ($counter == $currentPage)
			{
				$mult .= '<span class="current">'.$counter.'</span>';	
			}
			else
			{
				$mult .= '<a href="'.$url.'page='.$counter.'">'.$counter.'</a>';
			}
		}
	}
	elseif ($totalPages > 11)
	{
		if($currentPage < 7)		
		{
			for ($counter = 1; $counter < 10; $counter++)
			{
				if ($counter == $currentPage)
				{
					$mult .= '<span class="current">'.$counter.'</span>';
				}
				else
				{
					$mult .= '<a href="'.$url.'page='.$counter.'">'.$counter.'</a>';
				}	
			}
			$mult .= '<span>&#8230;</span><a href="'.$url.'page='.($totalPages-1).'">'.($totalPages-1).'</a><a href="'.$url.'page='.$totalPages.'">'.$totalPages.'</a>';	
		}
		elseif($totalPages - 6 > $currentPage && $currentPage > 6)
		{
			$mult .= '<a href="'.$url.'page=1">1</a><a href="'.$url.'page=2">2</a><span>&#8230;</span>';
			for ($counter = $currentPage - 3; $counter <= $currentPage + 3; $counter++)
			{
				if ($counter == $currentPage)
				{
					$mult .= '<span class="current">'.$counter.'</span>';	
				}
				else
				{
					$mult .= '<a href="'.$url.'page='.$counter.'">'.$counter.'</a>';
				}					
			}
			$mult .= '<span>&#8230;</span><a href="'.$url.'page='.($totalPages-1).'">'.($totalPages-1).'</a><a href="'.$url.'page='.$totalPages.'">'.$totalPages.'</a>';		
		}
		else
		{
			$mult .= '<a href="'.$url.'page=1">1</a><a href="'.$url.'page=2">2</a><span>&#8230;</span>';
			for ($counter = $totalPages - 8; $counter <= $totalPages; $counter++)
			{
				if ($counter == $currentPage)
				{
					$mult .= '<span class="current">'.$counter.'</span>';	
				}
				else
				{
					$mult .= '<a href="'.$url.'page='.$counter.'">'.$counter.'</a>';
				}
			}
		}
	}
	if ($currentPage < $counter - 1)
	{
		$mult .= '<a href="'.$url.'page='.($currentPage + 1).'" class="nextprev">'.$func_message['next'].'</a>';
	}
	else
	{
		$mult .= '<span class="nextprev">'.$func_message['next'].'</span>';
	}
	$mult .= '</div></div>';
	return $mult;
}

function is_Page($page)
{
	return !empty($page) && preg_match ('/^([0-9]+)$/', $page);
}


$page =$_REQUEST['page'];

$pagesize = 15;
$page = !is_Page($page) ? 1 : $page;
$start_limit = ($page -1) * $pagesize;
$rs = $DB->db_fetch_one_array("SELECT COUNT(*) num FROM {$db_prefix}tag ");
$totalRecords = (int)$rs['num'];
$mult = multLink($page, $totalRecords, 'adminxx.php?', $pagesize);

echo $mult;
echo "<br><br>";

//echo $start_limit;


	//$name = $_POST[name];
	$pro_name=trim($_POST['pname']);
    $DB->db_query("SELECT * FROM {$db_prefix}tag  ORDER BY level DESC LIMIT ".$start_limit.", ".$pagesize);

//$DB->db_query('SELECT tagname, usenum FROM '.$db_prefix.'tags WHERE ifopen = 1 LIMIT '.$start_limit.', '.$pagesize);

echo "<table width=800 border=1><tbody>";
while ($rs = $DB->db_fetch_array())
{
	//var $n=0;
	//$n++;
	echo "<tr><td WIDTH=300 height=20>".$rs['name']."&nbsp;&nbsp;</td><td WIDTH=150><a href=admin_create.php?id=".$rs['id']." target=_blank >重新生成</a></td>";
	echo "<td WIDTH=150 ><a href=../go/go.php?id=".$rs['id']." target=_blank >查看</a></td>";
//				echo "<td WIDTH=150 ><a href=http://www.baidu.com/baidu?word=".$rs['name']." target=_blank >百度搜索</a></td>";
//	echo "<td WIDTH=150 ><a href=http://www.google.cn/search?forid=1&ie=utf-8&oe=UTF-8&hl=zh-CN&q=".$rs['name']." target=_blank >谷歌搜索</a></td>";

	echo "<td WIDTH=150 ><a href=edit_tag.php?id=".$rs['id']." target=_blank >编辑</a></td>";
	echo "<td WIDTH=150 ><a href=t.php?id=".$rs['id']." target=_blank >提前</a></td>";
	echo "<td WIDTH=150 ><a href=http://www.171biao.cn/yiqiyibiao/".$rs['name']." target=_blank >171biao</a></td>";
	echo "<td WIDTH=150><a href=del.php?id=".$rs['id']." target=_blank >删</a></td>";
	echo "<td WIDTH=150 ><a href=hot.php?id=".$rs['id']." target=_blank >标注热点</a></td>";
	echo "<td WIDTH=150 ><a href=http://www.baidu.com/baidu?word=".$rs['name']." target=_blank >百度搜索</a></td>";
	echo "<td WIDTH=150><a href=http://www.google.cn/search?forid=1&ie=utf-8&oe=UTF-8&hl=zh-CN&q=".$rs['name']." target=_blank >谷歌搜索</a></td></tr>";



	//if($rs['id']%5 == 0)
	//echo "<tr>";
	//$tags[] = array(rawurlencode($rs['tagname']), $rs['tagname'], $rs['usenum'], getTagStyle());
}

echo "</tbody></table>";
echo "<br>";
	
?>




</CENTER>
</body>
</html>