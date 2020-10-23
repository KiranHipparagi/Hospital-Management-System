<html><h3><a href="index1.php">Home</a></h3>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>DOCTOR INFO</title>
<script language="javascript">
</script>
<link rel="stylesheet" type="text/css" href="doctor.css"/>
</head>

<body bgcolor="skyblue">
<h1 align="center"> DOCTOR INFORMATION</h1>
<center>
<form name="doctorform" action="http://localhost/hms/doctor.php" method="POST">
<p> Doctor_id:<input type="text" name="Doctor_id" id="Doctor_id" readonly=/> </p>
<p> ENTER Doctor_name:<input type="text" name="Doctor_name"/> </p>
<p> Enter ph_no:<input type="text" name="ph_no"/> </p>
<p> Enter Room_no:<input type="text" name="Room_no"/> </p>
<p> Enter Specialization:<input type="text" name="Specialization"> </p>
<p> <input type="submit" value="Insert"/> <input type="reset" value="clear"/> </p>
</form>
</center>
<?php
	error_reporting(0);
	$Doctor_id = $_POST["Doctor_id"];
	$Doctor_name = $_POST["Doctor_name"];
    $ph_no = $_POST["ph_no"];
	$Room_no =$_POST["Room_no"];
	$Specialization =$_POST["Specialization"];
	$mysql = mysql_connect("localhost","root");
	mysql_select_db("hospital");
	if($Doctor_id && $Doctor_name && $Specialization   )
	{
      $result1 = mysql_query("INSERT INTO doctorinformation VALUES('$Doctor_id','$Doctor_name','$ph_no','$Room_no','$Specialization')");
	   mysql_free_result($result1);
	 }
	   $result2=mysql_query("SELECT * FROM doctorinformation ORDER BY Doctor_id DESC");
	$num=mysql_num_rows($result2);
	$array=mysql_fetch_row($result2);
	if($num==0)
	{
		print"<script>document.getElementById('Doctor_id').value=1;</script>";
		print"<script>document.getElementById('Doctor_name').focus();</script>";
	}
	else
	{
		$num=$array[0]+1;
		print"<script>document.getElementById('Doctor_id').value=$num;</script>";
		print"<script>document.getElementById('Doctor_name').focus();</script>";
	}
	mysql_free_result($result2);
?>
<table border="1" cellspacing="5" cellpadding="5" align="center">
<caption> <strong> DOCTOR DETAILS </strong> </capti0on>
<tr><th>Doctor_id</th> <th>Doctor_name</th><th>Ph_no</th><th>Room_no</th><th>Specialization</th></tr>
<?php
$result2 = mysql_query("SELECT * FROM doctorinformation ORDER BY Doctor_id");
while($array = mysql_fetch_row($result2))
{
		print "<tr>";
		print "<td> $array[0] </td>"; 
		print "<td> $array[1] </td>";
		print "<td> $array[2] </td>";
		print "<td> $array[3] </td>";
		print "<td> $array[4] </td>";
		print "</tr>";
}
mysql_free_result($result2);
mysql_close($mysql); 
?>
</table> </body> </html>

