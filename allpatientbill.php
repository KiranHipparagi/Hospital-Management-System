<h3><a href="index1.php">HOME</a></h3>
<?php
		error_reporting(0);
		$mysql = mysql_connect("localhost","root");
    	mysql_select_db("hospital");

?>
<html>
<head> <title> PRINT BILL PAYMENT </title> </head>
<body bgcolor="skyblue">
<center>
<form action="allpatientbill.php" method="post">
<p> From Date: <input type="text" name="fromdate" id="fromdate"/>
	To Date: <input type="text" name="todate" id="todate"/>
	<input type="submit" name="submit" value="Generate"/>
</p>
</center>
</form>
<center>

<table border="border" cellspacing="1" cellpadding="1" align="center"> 
<tr> <th>BILL NO</th> <th>PATIENT ID</th> <th>PATIENT NAME</th> <th>DOCTOR_ID</th> <th>TOTAL RUPEES</th>  
</tr>
<?php
$fromdate = $_POST["fromdate"];
$todate = $_POST["todate"];

echo '<h2 align="center">Bill Payent From '.$fromdate.' To '.$todate.'</h2>';

if($fromdate && $todate)
{
	$presult = mysql_query("SELECT Bill_no,patient_id,patient_name,doctor_id,Amount FROM viewbillj WHERE date BETWEEN '".$fromdate."' AND '".$todate."' GROUP BY Bill_no");
	$n=1;
	$grandtotal=0;
}

while($array = mysql_fetch_row($presult))
{
		print "<tr>";
		//print "<td align='center'> $n </td>";
		print "<td align='center'> $array[0] </td>";
		print "<td align='center'> $array[1] </td>";
		print "<td align='center'> $array[2] </td>";
		print "<td align='center'> $array[3] </td>";
		print "<td align='center'> $array[4] </td>";
		print "</tr>";
	
		$n=$n+1;
		$grandtotal=$grandtotal + $array[4];

}
mysql_free_result($presult);
mysql_close($mysql);
?>
<tr> <td colspan="4" align="right"> Grand Total Rupees </td> <td align="center"> <?php echo("$grandtotal") ?> </tr>
</table>
<br/>
<!-- <center> <a href="javascript:window.print()" title="Print"> <b> Print </b> </a></center> -->
</body>
</html>