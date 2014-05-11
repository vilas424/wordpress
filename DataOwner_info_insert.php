
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

 <style type="text/css">
 <!--
 .style1
 {
     color: #FF0000
 }
 -->
 </style>
 </head>
 <?php
  $user_name=$_POST['UserName'];
 $passwd=$_POST['Password'];
 $owner_fname=$_POST['FirstName'];
 $owner_lname=$_POST['LastName'];
 $email=$_POST['email'];
 $mob_no=$_POST['mob_no'];
fopen("serial.txt");
include 'device_check.php';
require 'conn.php';
$file = fopen("serial.txt", "r");
while(!feof($file)){
    $line[] = fgets($file);
    # do same stuff with the $line
}

echo $line[14];
if($line[14]!=NULL)
{
	$query1 = "INSERT INTO members VALUES 	('','$user_name','$passwd','$owner_fname','$owner_lname','$m	ob_no','$email','$line[2]');";
	$result1=mysql_query($query1);
	fclose($file);
	
	if($result1)
	{
	echo "<script>
	window.location='index.php';
	</script>";
	}
	else
	{
   	echo "<script>
	alert('ERROR in Registration TRY Again !!');

	window.location='DataOwner_Registration.php';
	</script>";
   	echo mysqli_error($this->db_link);
	}
}
else
{
alert('Insert Device Please!!');
}


?>
 <body >


 </body >

 </html>
