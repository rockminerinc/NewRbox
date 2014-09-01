<?php
include "header.php";
//require_once('../common.inc.php');
$tid =$_REQUEST['id'];



?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>删除产品</b>
<?php
echo '<a href=del_note2.php?id='.$tid.'>确认删除</a>';


?>

</body>
</html>