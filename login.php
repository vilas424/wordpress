
<?php
include('conn.php');
include('device_check.php');

 if (isset($_POST['submit'])) 
{
 $UserName=$_POST['UserName'];
 $Password=$_POST['Password'];
 $result=mysql_query("select * from members where UserName='$UserName' and Password='$Password'")or die (mysql_error());

 $count=mysql_num_rows($result);
 $row=mysql_fetch_array($result);


//USB SERIAL NUMBER START

$file = file_get_contents('serial.txt');


$result2=mysql_query("select device_no from members where UserName='$UserName' and Password='$Password'");



$row2=mysql_fetch_array($result2);

$ser_no = $row2['device_no'];


$position = strpos($file, $ser_no);

 //USB END
			if ($count > 0 && is_numeric($position))
             {
		session_start();
		$_SESSION['member_id']=$row['member_id'];
		header('location:/wordpress/index.php/file-upload');
	     }
             else
             {
              echo "<script>alert('Please insert the device !');
             window.location='/wordpress/index.php/owner-login';
              </script>";
		//header('location:/wordpress/index.php');
	     }
}
?>
