<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
		error_reporting(0);
		$mysql = mysql_connect("localhost","root");
    	mysql_select_db("kiran");

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body bgcolor="#33FFCC">
<h1> LOGIN FORM </h1>
<form action="http://localhost/login.php" method="post">
<p>USER NAME:<input type="text" name="user"/></p>
<p> PASSWORD:<input type="password" name="password"/></p>
<p> <input type="submit" value="LOGIN"/> <input type="reset" value="CLEAR"/></p>
</form>
</body>
<?php
$user = $_POST["user"];
$password = $_POST["password"];
	$mysql = mysql_connect("localhost","root");
	mysql_select_db("kiran");
	if($user && $password) 
	{
      $result1 = mysql_query("SELECT * FROM login WHERE user='$user' and password='$password'");
      $count=mysql_num_rows($result1);
	  mysql_free_result($result1);
	  if($count==1)
	  {
		header("location:index1.php");
	  }
	  else 
	  {
          echo "Wrong Username or Password";
	  }
	}
?>
</html>
