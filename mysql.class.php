<?php
/**
 * @version $Id: mysql.class.php v2.0 $
 * @package PBDigg
 * @copyright Copyright (C) 2007 - 2008 PBDigg.com. All Rights Reserved.
 * @license PBDigg is free software and use is subject to license terms
 */

class MySQL
{
	/**
	 * 数据库地址
	 */
	var $dbhost;
	/**
	 * 数据库名称
	 */
	var $dbname;
	/**
	 * 用户名
	 */
	var $username;
	/**
	 * 密码
	 */
	var $password;
	/**
	 * 是否持久连接
	 */
	var $pconnect;
	/**
	 * 连接
	 */
	var $dblink = null;
	/**
	 * 资源
	 */
	var $resource = null;
	/**
	 * 记录
	 */
	var $records = null;
	/**
	 * 返回记录类型，类型包括MYSQL_ASSOC，MYSQL_NUM 和 MYSQL_BOTH
	 */
	var $resultType = MYSQL_ASSOC;
	/**
	 * 查询次数
	 */
	var $queries = 0;

	/**
	 * 构造函数
	 */
	function MySQL($db_host, $db_username, $db_password, $db_name, $db_pconnect = 0)
	{
		global $db_charset;
		$this->dbhost = $db_host;
		$this->dbname = $db_name;
		$this->username = $db_username;
		$this->password = $db_password;
		$this->pconnect = $db_pconnect;

		if ($this->pconnect)
		{
			$this->dblink = @ mysql_pconnect($this->dbhost, $this->username, $this->password);
			if (!$this->dblink)
			{
				$this->db_halt();
			}
		}
		else
		{
			$this->dblink = @ mysql_connect($this->dbhost, $this->username, $this->password);
			if (!$this->dblink) {
				$this->db_halt();
			}
		}
		if ($this->db_version() > '4.1')
		{
			$db_charset = strtolower($db_charset);
			if ($db_charset && in_array($db_charset, array ('gbk', 'big5', 'utf-8')))
			{
				if (strpos($db_charset, '-') !== false)
				{
					$db_charset = str_replace('-', '', $db_charset);
				}
				mysql_query("SET character_set_client = 'binary', character_set_connection = '".$db_charset."', character_set_results = '".$db_charset."'", $this->dblink);
			}
		}
		if ($this->db_version() > '5.0.1')
		{
			mysql_query("SET sql_mode = ''", $this->dblink);
		}
		if ($this->dbname)
		{
			$this->db_select();
		}
	}

	/**
	 * 执行查询语句
	 */
	function db_query($sql, $mod = 1)
	{
		if ($mod)
		{
			$this->resource = mysql_query($sql, $this->dblink);
		}
		elseif ($mod == 0 && function_exists('mysql_unbuffered_query'))
		{
			$this->resource = mysql_unbuffered_query($sql, $this->dblink);
		}
		$this->queries ++;
		if (!$this->resource)
		{
			$this->db_halt($sql);
		}
	}

	/**
	 * 取得关联数据集
	 * 
	 * @return Array() 记录集
	 */
	function db_fetch_array()
	{
		return mysql_fetch_array($this->resource, $this->resultType);
	}

	/**
	 * 取得数字数据集
	 */
	function db_fetch_row()
	{
		return mysql_fetch_row($this->resource);
	}

	/**
	 * 取得一行记录
	 * 
	 * @return Array() 返回一条记录
	 */
	function db_fetch_one_array($sql)
	{
		$this->db_query($sql);
		return $this->db_fetch_array();
	}

	/**
	 * 取得select语句查询结果的数目
	 */
	function db_num()
	{
		return mysql_num_rows($this->resource);
	}

	/**
	 * 取得 INSERT，UPDATE，DELETE 语句查询结果的数目
	 */
	function db_affected()
	{
		return mysql_affected_rows($this->dblink);
	}

	/**
	 * 取得结果集中字段的数目
	 */
	function db_fieldNum()
	{
		return mysql_num_fields($this->resource);
	}

	/**
	 * 取得上一步 INSERT 操作产生的 ID
	 */
	function db_insertID()
	{
		return mysql_insert_id($this->dblink);
	}

	/**
	 * 选择数据库
	 */
	function db_select()
	{
		if (!mysql_select_db($this->dbname, $this->dblink))
		{
			$this->db_halt();
		}
	}

	/**
	 * 释放资源
	 */
	function db_free()
	{
		return mysql_free_result($this->resource);
	}

	/**
	 * 关闭连接
	 */
	function db_close()
	{
		return mysql_close($this->dblink);
	}

	function close()
	{
		return mysql_close($this->dblink);
	}

	/**
	 * 数据库版本
	 */
	function db_version()
	{
		return mysql_get_server_info($this->dblink);
	}

	/**
	 * 返回 MySQL 操作产生的文本错误信息
	 */
	function db_errorMsg()
	{
		return mysql_error($this->dblink);
	}

	/**
	 * 返回 MySQL 操作中的错误信息的数字编码
	 */
	function db_errorNo()
	{
		return mysql_errno($this->dblink);
	}

	/**
	 * 设置查询返回类型
	 */
	function setResultType($resultType)
	{
		$this->resultType = $resultType;
	}

	/**
	 * 返回资源
	 */
	function getResource()
	{
		return $this->resource;
	}
	/**
	 * 设置资源
	 */
	function setResource($resource)
	{
		if (is_resource($resource))
		{
			$this->resource = $resource;
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	/**
	 * 返回查询次数
	 */
	function getQueries() {
		return $this->queries;
	}
	/**
	 * 数据库错误提示显示页面
	 */
	function db_halt($sql = '') {
		global $_PBDEV;
		echo $sql;
		echo mysql_error();exit;
		if ($_PBDEV['logDataFile'])
		{
			$this->logDataFile($sql);
		}
		if ($_PBDEV['logDebugFile'])
		{
			$this->logDebugFile($sql);
		}
		$this->showError($sql);
	}

	/**
	 * 记录数据库错误到调试文件
	 */
	function logDebugFile($sql = '')
	{
		global $timestamp, $_PBDEV;
		$queryString = $suffix = $path = $content = '';
		$suffix = date('Ymd', $timestamp);
		$path = PBDIGG_ROOT.'debug/DB_'.$suffix.'.php';
		$content .= "<?php exit('Access Denied');?>";
		$content .= "\r\nTime：".date( 'Y-m-d @ H:i', $timestamp);
		$content .= "\r\nScript：http://".$_SERVER['HTTP_HOST'].$_PBDEV['REQUEST_URL'];
		$content .= "\r\nDescription：".$this->db_errorMsg();
		$content .= "\r\nError Number：".$this->db_errorNo();
		$content .= "\r\nError SQL:".$sql;
		$content .= "\r\n======= PBDigg End =======\r\n";
		PWriteFile($path, $content);
	}

	/**
	 * 将错误格式化保存到文件
	 */
	function logDataFile($sql = '')
	{
		global $timestamp, $_PBDEV;
		$content = '<?php exit(\'Access Denied!\');?>|';
		$content .= basename($_PBDEV['PHP_SELF']).'|'.$_SERVER['QUERY_STRING'].'|'.$this->db_errorNo().'|'.$this->db_errorMsg().'|'.$sql.'|'.$timestamp."{!--dberror--}";
		PWriteFile(PBDIGG_ROOT.'data/log/dberror.php', $content);
	}

	/**
	 * 显示错误信息页面
	 */
	 function showError($sql = '')
	 {
		global $db_charset, $timestamp, $_PBDEV;
		require_once(loadLang('db'));
		$msg = $d_message['db_errno_'.$this->db_errorNo()];
		if (!$msg)
		{
			$msg = $d_message['unknowError'];
		}
		$message = "<html>\n<head>\n";
		$message .= "<meta content=\"text/html; charset=$db_charset\" http-equiv=\"Content-Type\">\n";
		$message .= "</head>\n";
		$message .= "<body>\n";
		$message .= "<p style=\"font-family: Verdana, Tahoma; font-size: 11px; background: #fff;\">\n";
		if ($_PBDEV['debug'])
		{
			$message .= "<strong>PBDigg Info：</strong>" . $msg . "\n<br />";
			$message .= "<strong>Time：</strong>" . gdate($timestamp, 'Y-m-d @ H:i') . "\n<br />";
			$message .= "<strong>Script：</strong>http://" . $_SERVER['HTTP_HOST'] . $_PBDEV['REQUEST_URL'] . "\n<br />";
			if ($sql)
			{
				$message .= "<strong>SQL：</strong><code>" . $sql . "</code>\n<br />";
			}
			$message .= "<strong>MySQL Error Description：</strong>" . $this->db_errorMsg() . "\n<br />";
			$message .= "<strong>MySQL Error Number：</strong>" . $this->db_errorNo() . "\n<br />";
		}
		else
		{
			$message .= "<strong>PBDigg Info：</strong>" . $msg . "\n<br />";
		}
		$message .= "</p>\n";
		$message .= "</body>\n</html>";
		echo $message;
		exit;
	 }
}
?>