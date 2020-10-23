<?php
	error_reporting(0);
	$mysql = mysql_connect("localhost","root");
	mysql_select_db("hospital");
	$result3 = mysql_query("SELECT * FROM roominformation");
?>
<html><h3><a href="index1.php">Home</a></h3>
<head>
<title>PATIENT INFO</title>
<script language="javascript">
</script>
<link rel="stylesheet" type="text/css" href="patient.css"/>
</head>

<body bgcolor="skyblue">
<h1 align="center"> PATIENT INFORMATION</h1>
<center>
<form name="patientform" action="Patient.php" method="POST">
<p>patient_id <input type="text" name="patient_id" id="patient_id" size="20" maxlength="20" readonly/>
</p>
<p> Enter patient_name:<input type="text" name="patient_name"/> </p>
<p> Select doctor_id :<select name="doctor_id">
<option value="pick">select</option>
<?php
$mysql = mysql_connect("localhost","root");
	mysql_select_db("hospital");
$sql = mysql_query("SELECT doctor_id ,doctor_name From doctorinformation");
$row = mysql_num_rows($sql);
while ($row = mysql_fetch_array($sql)){
echo "<option value='". $row['doctor_id'],$row['doctor_name'] ."'>" .$row['doctor_id'],$row['doctor_name'] ."</option>" ;
}
?>
</select>
 </p>
<p> Select gender: <input type="radio" name="gender" value="Male"> Male <input type="radio" name="gender" value="Female"> Female </p>
<tr>
		<td> Date and time:<input type="text" name="admitted_date" id="datetime" value="<?php echo date("Y-m-d h-m-s"); ?>"/ ></td>
		</tr>
<p> Select Room_no:<select name="room_no">
					<?php
				while($array = mysql_fetch_row($result3)) 
				{ 
					print "<option>".$array[0]."</option>"; 
				}
        			mysql_free_result($result3);
		
		?> </select> </p>
<p> Enter ph_no:<input type="text" name="ph_no"/> </p>
<p> Enter address:
  <textarea name="address"></textarea> 
  </p>
<p> <input type="submit" value="Insert"/> <input type="reset" value="clear"/> </p>
</form>
</center>
<?php
	error_reporting(0);
	$patient_id = $_POST["patient_id"];
	$patient_name = $_POST["patient_name"];
	$doctor_id =$_POST["doctor_id"];
	$gender = $_POST["gender"];
	$admitted_date = $_POST["admitted_date"];
	$room_no =$_POST["room_no"];
	$ph_no = $_POST["ph_no"];
	$address = $_POST["address"];
	$mysql = mysql_connect("localhost","root");
	mysql_select_db("hospital");
	if($patient_name )
	{
      $result1 = mysql_query("INSERT INTO patientinformation VALUES('$patient_id','$patient_name','$doctor_id','$gender','$admitted_date','$room_no','$ph_no','$address')");
	   mysql_free_result($result1);
	   }
	   $result5=mysql_query("SELECT * FROM patientinformation ORDER BY patient_id DESC");
	$num=mysql_num_rows($result5);
	$array=mysql_fetch_row($result5);
	if($num==0)
	{
		print"<script>document.getElementById('patient_id').value=1;</script>";
		print"<script>document.getElementById('Patient_name').focus();</script>";
	}
	else
	{
		$num=$array[0]+1;
		print"<script>document.getElementById('patient_id').value=$num;</script>";
		print"<script>document.getElementById('patient_name').focus();</script>";
	}
	mysql_free_result($result5);

?>
<table border="1" cellspacing="5" cellpadding="5" align="center">
<caption> <strong> PATIENT DETAILS </strong> </capti0on>
<tr><th>Patient_id</th> <th>Patient_name</th><th>Doctor_id</th><th>Gender</th><th>Admitted_date</th><th>Room_no</th><th>Ph_no</th><th>Address</th></tr>
<?php
$result2 = mysql_query("SELECT * FROM patientinformation ORDER BY patient_id");
while($array = mysql_fetch_row($result2))
{
		print "<tr>";
		print "<td> $array[0] </td>"; 
		print "<td> $array[1] </td>";
		print "<td> $array[2] </td>";
		print "<td> $array[3] </td>";
		print "<td> $array[4] </td>";
		print "<td> $array[5] </td>";
		print "<td> $array[6] </td>";
		print "<td> $array[7] </td>";
		print "</tr>";
}
mysql_free_result($result2);
mysql_close($mysql); 
?>
</table> </body> </html>

