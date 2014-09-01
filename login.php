<?php
ob_start();//打开缓冲区
require_once('common.inc.php');
$cookietime=time()+3600;//设置Cookie有效时间
if(isset($_POST['submit'])) 
{
$uname=$_POST['uname'];//接收传过来的用户名
$upwd=md5($_POST['upwd']);//接收传过来的密码并md5()
$sql="SELECT * FROM user WHERE name='$uname' AND password='$upwd'";//查询数据库
$rs=$DB->db_query($sql);
$num=$DB->db_num($rs);//获取查询结果的条数
if(!($num>0))//0就是木有匹配的记录
{
echo "<script>alert('用户名或密码错误，请重新输入。');location.href='index.php'</script>";//重新登录去～
}else{
setcookie('uname',$uname,$cookietime);//设置Cookie
setcookie('upwd',$upwd,$cookietime);
echo "<script>location.href='left.php'</script>";//跳转
exit;
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>登录</title>
</head>
<body>
<center>
<form action="login.php" method="post" name="myform" >
用户名<input type="text" name="uname" /><br/>
密  码<input type="password" name="upwd" /><br/>
<input type="submit" name="submit" value="登陆"/>
</form>
</body>
</html>
