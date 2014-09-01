<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];


			$DB->db_query("DELETE from ask where id = ".$tid);
			echo "删除成功!<BR>";

?>