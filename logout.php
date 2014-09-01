<?php
header("Content-Type: text/html; charset=utf-8");//不加这个，JS里的文字会乱码～
setcookie('uname',time()-1);
setcookie('upwd',time()-1);
echo "退出成功";
?>
