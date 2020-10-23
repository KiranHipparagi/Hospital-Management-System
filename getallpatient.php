<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><h3><a href="index1.php">HOME</a></h3>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>All Patient Information</title>
</head>
<?php
	error_reporting(0);
    $mysql = mysql_connect("localhost","root");
    mysql_select_db("hospital");
	$sql = "CALL getallpatientinfo()";
?>
<body bgcolor="skyblue">
<table border="1" cellspacing="5" cellpadding="5" align="center">
	<caption><strong>PATIENT-DETAILS</strong></caption>
<tr><th>Patient_id</th> <th>Patient_name</th><th>Doctor_id</th><th>Gender</th><th>Admitted_date</th><th>Room_no</th><th>Ph_no</th><th>Address</th></tr>
<?php
	$result1=mysql_query($sql);
	while($array=mysql_fetch_row($result1))
	{
		print"<tr align='center'>";
		print"<td> $array[0]</td>";
		print"<td> $array[1]</td>";
		print"<td> $array[2]</td>";
		print"<td> $array[3]</td>";
		print"<td> $array[4]</td>";
		print"<td> $array[5]</td>";
		print"<td> $array[6]</td>";
		print"<td> $array[7]</td>";
		print"</tr>";
	}
	mysql_free_result($result1);
	
	
?>
</table>
</body>
</html>
