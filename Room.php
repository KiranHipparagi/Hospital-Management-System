<?php
	error_reporting(0);
	$mysql = mysql_connect("localhost","root");
	mysql_select_db("hospital");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><h3><a href="index1.php">Home</a></h3>
<head>
</head>

<body bgcolor="skyblue">
<h1 align="center"> ROOM INFORMATION</h1>
<center>
<form name="roomform" action="http://localhost/hms/room.php" method="POST">
<p> Enter Room_no:<input type="text" name="room_no"/> </p>
<p> Enter Patient_id:<input type="text" name="patient_id">
<p> Room type:<select name="room"> <option selected> Normal</option> <option>Deluxe</option>
</select> </p>
  </p>
<p> <input type="submit" value="Insert"/> <input type="reset" value="clear"/> </p>
</form>
</center>
<?php
	$Room_no = $_POST["room_no"];
  	$Patient_id =$_POST["patient_id"];
	$rtype=$_POST["room"];
	if($Room_no )
	{
	    $result1 = mysql_query("INSERT INTO roominformation VALUES('$Room_no', '$Patient_id','$rtype')");
	    mysql_free_result($result1);
	}
?>
<table border="1" cellspacing="5" cellpadding="5" align="center">
<caption> <strong> ROOM DETAILS </strong> </capti0on>
<tr> <th>Room_no</th> <th>Patient_no</th><th>Room type</th></tr>
<?php
$result2 = mysql_query("SELECT * FROM roominformation ORDER BY room_no");
while($array = mysql_fetch_row($result2))
{
		print "<tr>";
		print "<td> $array[0] </td>"; 
		print "<td> $array[1] </td>";
		print "<td> $array[2] </td>";

		print "</tr>";
}
mysql_free_result($result2);
mysql_close($mysql); 
?>
</table> </body> </html>

