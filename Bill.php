<?php
	error_reporting(0);
	$mysql = mysql_connect("localhost","root");
	mysql_select_db("hospital");
	$result1 = mysql_query("SELECT * FROM patientinformation");
	$result2 = mysql_query("SELECT * FROM doctorinformation");
	$result3 = mysql_query("SELECT * FROM roominformation");
	$result4 = mysql_query("SELECT * FROM billinformation");
?>

<html><h3><a href="index1.php">Home</a></h3>
<head>
<title>BILL INFO</title>
<script language="javascript">
</script>
<link rel="stylesheet" type="text/css" href="bill.css"/>
</head>

<body bgcolor="skyblue">
<h1 align="center">
BILL INFORMATION</h1>
<center>
<form name="billform" action="http://localhost/hms/bill.php" method="POST">
 Date:<input type="text" name="Date" id="Date" value="<?php echo date("Y-m-d h:i:s"); ?>"/ >
<p>Bill_no <input type="text" name="Bill_no" id="Bill_no" size="20" maxlength="20" readonly/>
    </p>
<p> Select Patient_id:<select name="patient_id">
				<?php
				while($array = mysql_fetch_row($result1)) 
				{ 
					print "<option>".$array[0]."</option>"; 
				}
        			mysql_free_result($result1);
		
		?></select> </p>
<p> Select Doctor_id:<select name="doctor_id">
					<?php
				while($array = mysql_fetch_row($result2)) 
				{ 
					print "<option>".$array[0]."</option>"; 
				}
        			mysql_free_result($result2);
		
		?> </select></p>
<p>Select Room_no:<select name="room_no">
					<?php
				while($array = mysql_fetch_row($result3)) 
				{ 
					print "<option>".$array[0]."</option>"; 
				}
        			mysql_free_result($result3);
		
		?> </select> </p>
		
		
<script type="text/javascript">
	function calculate(no_days,room_rent,medicin_fees,doctor_fees)
	{
		var amount= +no_days.value * +room_rent.value + +medicin_fees.value + +doctor_fees.value;
		alert(amount);
	}
</script>		
<p> No_days:<input type="text" name="no_days"/> </p>
<p> Room_rent:<input type="text" name="room_rent"/> </p>
<p> Medicin_fees:<input type="text" name="medicin_fees"/> </p>
<p> Doctor_fees:<input type="text" name="doctor_fees"/> </p>
 </p>
<p> <input type ="button" value="Total Amount" onclick="calculate(no_days,room_rent,medicin_fees,doctor_fees)"/> <input type="submit" value="Insert"/> <input type="reset" value="clear" /> </p>
</form>
</center>
<?php
	error_reporting(0);
	$Date =$_POST["Date"];
	$Bill_no = $_POST["Bill_no"];
	$Patient_id =$_POST["patient_id"];
	$Doctor_id =$_POST["doctor_id"];
	$Room_no = $_POST["room_no"];
	$No_days = $_POST["no_days"];
	$Room_rent = $_POST["room_rent"];	
	$Medicin_fees = $_POST["medicin_fees"];
	$Doctor_fees = $_POST["doctor_fees"];
	$A=$No_days * $Room_rent + $Medicin_fees + $Doctor_fees;
    $Amount = $A;
	$mysql = mysql_connect("localhost","root");
	mysql_select_db("hospital");
	if($Patient_id && $Doctor_id)
	{
      $result4 = mysql_query("INSERT INTO billinformation VALUES( '$Date','$Bill_no','$Patient_id','$Doctor_id','$Room_no','$No_days','$Room_rent','$Medicin_fees','$Doctor_fees','$Amount')");
	   mysql_free_result($result4);
	   }
	   	$result5=mysql_query("SELECT * FROM billinformation ORDER BY Bill_no DESC");
	$num=mysql_num_rows($result5);
	$array=mysql_fetch_row($result5);
	if($num==0)
	{
		print"<script>document.getElementById('Bill_no').value=1;</script>";
		print"<script>document.getElementById('Patient_id').focus();</script>";
	}
	else
	{
		$num=$array[1]+1;
		print"<script>document.getElementById('Bill_no').value=$num;</script>";
		print"<script>document.getElementById('Patient_id').focus();</script>";
	}
	mysql_free_result($result5);
?>
<table border="1" cellspacing="5" cellpadding="5" align="center">
<caption> <strong> BILL DETAILS </strong> <td height="12"></capti0on>
<tr><th>Date</th><th>Bill_no</th> 
<th>Patient_id</th>
<th>Doctor_id</th><th>Room_no</th><th>No_days</th><th>Room_rent</th><th>Medicin_fees</th><th>Doctor_fees</th><th>Amount</th></tr>
<?php
$result6 = mysql_query("SELECT * FROM billinformation ORDER BY Bill_no");
while($array = mysql_fetch_row($result6))
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
		print "<td> $array[8] </td>";
		print "<td> $array[9] </td>";
		print "</tr>";
}
mysql_free_result($result6);
mysql_close($mysql); 
?>
</body> </html>

