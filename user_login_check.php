<?php
include('conn.php');//para sa connection sang database

include('device_check.php');

if (isset($_POST['submit'])) {//condition kun e click ang button
$UserName=$_POST['UserName'];//variable ang $Username kag ang $_POST['UserName'] ay value sang textbox nga UserName
$Password=$_POST['Password'];//variable ang $Username kag ang $_POST['Password'] ay value sang textbox nga Password
$result=mysql_query("select * from user_registration where UserName='$UserName' and Passwd='$Password'")or die (mysql_error());//query sang database

$count=mysql_num_rows($result);//isipon kn may tyakto sa query
$row=mysql_fetch_array($result);//ma return row sa database


$file = file_get_contents('serial.txt');


$result2=mysql_query("select serial_no from device_no");


$row2=mysql_fetch_array($result2);

$ser_no = $row2['serial_no'];

$position = strpos($file, $ser_no);


		if ($count > 0 && is_numeric($position)){//kun may tyakto sa query e execute yah ang code sa dalom
		session_start();//para mag start ang session
		$_SESSION['username']=$row['username'];//kwaon ang id sang may tyakto nga username kag password ang ibotang sa $_SESSION['member_id']
		header('location:/wordpress/index.php/user-page');
		}
                else
                {
                  echo "<script>alert('Please insert the device !');
              window.location='/wordpress/index.php/user-login';
              </script>";
		//header('location:/wordpress/index.php');
		}
}
?>

