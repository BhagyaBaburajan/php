<html>
<body>
PIZZA ORDER
<form action="" method=POST>
<table>
<tr><td>name<td><input type="text" name="pname">
<tr><td>address<td><input type="textarea" name="add">

<tr><td>type of order<td><input type="radio" name="ht" value="ht">home delivery
		<td><input type="radio" name="ht" value="ht">take away
</br>

<tr><td>pizza size<td><select name="s1">
<option  value="small">small</option>
<option  value="medium" > medium</option>
<option  value="large">large</option>
</select>
</br>
</br>
<tr><td>additional toppings:<td><input type="checkbox" name="pep" value="pep">pepper
		<td><input type="checkbox" name="chilli" value="chilli"> chillisause
		<td><input type="checkbox" name="sc" value="sc">sweet corn
<tr><td><td><input type="submit" name="submit" value="submit">
</body>
</html>
<?php
	$pp=0;
	$chi=0;
	$sw=0;
	$hamt=0;
	$tamt=0;
	$samt=0;
	$mamt=0;
	$lamt=0;
	$pamt=0;
	$chamt=0;
	$scamt=0;
	$bill=0;
	if(isset($_POST["pep"]))
	{
		$pp=1;
	}
	else
	{
		$pp=0;
	}
	if(isset($_POST["chilli"]))
	{
		$chi=1;
	}
	else
	{
		$chi=0;
	}
	if(isset($_POST["sc"]))
	{
		$sw=1;
	}
	else
	{
		$sw=0;
	}		
	if (isset($_POST["submit"]))
	{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dbexample",$con);
	$sql="insert into pizzaa values('$_POST[pname]','$_POST[add]','$_POST[ht]','$_POST[s1]','$pp','$chi','$sw')";
	mysql_query($sql,$con);
	
	$sql1="select * from pizza";
	$res=mysql_query($sql1,$con);
	while($row=mysql_fetch_array($res))
	{
		$hamt=$row['home'];
		$tamt=$row['take'];
		$samt=$row['small'];
		$mamt=$row['medium'];
		$lamt=$row['large'];
		$pamt=$row['pepper'];
		$chamt=$row['chilli'];
		$scamt=$row['sweet'];
	}
	if($_POST['ht']=="home")
	{
		$bill=$bill+$hamt;
	}
	if($_POST['ht']=="take")
	{
		$bill=$bill+$tamt;
	}
	if($_POST['s1']=="small")
	{
		$bill=$bill+$samt;
	}
	if($_POST['s1']=="medium")
	{
		$bill=$bill+$mamt;
	}
	if($_POST['s1']=="large")
	{
		$bill=$bill+$lamt;
	}
	if($pp==1)
	{
		$bill=$bill+$pamt;
	}
	if($chi==1)
	{
		$bill=$bill+$chamt;
	}	
	if($sw==1)
	{
		$bill=$bill+$scamt;
	}
	echo "YOUR BILL IS..";
	echo "<table border=2>";
	echo "<tr><td>NAME</td><td>$_POST[pname]</td></tr>";
	echo "<tr><td>ADDRESS</td><td>$_POST[add]</td></tr>";
	echo "<tr><td>DELIVERY</td><td>$_POST[ht]</td></tr>";
	echo "<tr><td>SIZE</td><td>$_POST[s1]</td></tr>";
	echo "<tr><td>TOPPINGS</td></tr>";
	echo "<tr><td></td><td>PEPPER</td><td>$pp</td></tr>";
	echo "<tr><td></td><td>CHILLY</td><td>$chi</td></tr>";
	echo "<tr><td></td><td>SWEET CORN</td><td>$sw</td></tr>";
	echo "<tr><td>AMOUNT</td><td>$bill</td></tr>";
	echo "</table>";
	echo "</center>";	
}
?>
