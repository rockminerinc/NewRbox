<?php
include "edit_header.php";
require_once('../common.inc.php');




if(isset($_POST['submit'])) 
{
	
	$did =$_REQUEST['did'];
	$beizhu   = trim($_POST['beizhu']);
 	$DB->db_query('UPDATE dingdan SET DD_BEIZHU="'.$beizhu.'"  WHERE DD_ID='.$did );
	echo "修改ok!<br>";
	fowor_reload();
	return false;

}

$did =$_REQUEST['did'];
$DB->db_query("SELECT DD_BEIZHU from dingdan where DD_ID=".$did);
$rs = $DB->db_fetch_array();


?>


<CENTER><b>修改备注</b>
</CENTER>

<form action="edit_beizhu.php?did=<?php echo $did; ?>" method="post" >
<table border=0>
 <tr> <td>备注信息: </td><td> <textarea name="beizhu" rows="10" cols="55" class="textarea">
 <?php echo $rs['DD_BEIZHU']; ?>
  </textarea>  </td></tr>
<TR><TD>  </TD><TD><input type=submit name=submit value=提交 ></TD></TR>
</table>
</form>


<?PHP
$DB->close();
$DB2->close();
?>
</body>
</html>