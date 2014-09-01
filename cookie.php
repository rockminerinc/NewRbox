<?php
ob_start();
require_once('common.inc.php');
$uname=$_COOKIE["uname"];//获取Cookie值
$upwd=$_COOKIE["upwd"];
$sql="SELECT * FROM user WHERE name='$uname' AND password='$upwd'";//查询Cookie中保存的用户名密码是否在数据库中有记录
$rs=$DB->db_query($sql);
$num=$DB->db_num($rs);
if(!($num>0))
{
echo "<script>location.href='login.php'</script>";

}
?>
