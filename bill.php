<html>
<body>
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dbexample",$con);
	$sql="select custid from meter";
	$res=mysql_query($sql,$con);
?>
<form method=POST action="">
<table>
<tr><td>customer id:<td><select name="cusid">
<?php
	while($row=mysql_fetch_array($res))
	{?>
<option> <?php echo $row['custid'] ?> </option>
<?php
	}?>
</tr>
<tr><td>Meter Reading  <td><input type="text" name="mt">
<tr><td><td><input type="submit" name="bill" value="bill">
</table>
</form>
<?php
if(isset($_POST["bill"]))
{
	$sql="select * from meter where custid='$_POST[cusid]'";
	$temp=mysql_query($sql,$con);
	while($row=mysql_fetch_array($temp))
	{
		$av=$row['group'];
		if($av==1)
		{
			$bamt=50+$_POST['mt'];
			echo "you are to pay Rs".$bamt;
			$sql2="insert into meterr values('$_POST[cusid]','$_POST[mt]')";
			mysql_query($sql2,$con);
		}
		else if($av==2)
		{
			$bamt=100+($_POST['mt']*2);
			echo "you are to pay Rs".$bamt;
			$sql2="insert into meterr values('$_POST[cusid]','$_POST[mt]')";
			mysql_query($sql2,$con);
		}
		else if($av==3)
		{
			$bamt=200+($_POST['mt']*3);
			echo "you are to pay Rs".$bamt;
			$sql2="insert into meterr values('$_POST[cusid]','$_POST[mt]')";
			mysql_query($sql2,$con);
		}
	}
	$sql1="select * from meterr where custid='$_POST[cusid]'";
	$res=mysql_query($sql1,$con);
	echo "<table border=2>";
	echo "<tr><th>CUSTOMER ID</th><th>METER READING</th><th>BILL AMOUNT</th></tr>";
	while($row=mysql_fetch_array($res))
	{
		echo "<tr><td>".$row['custid']."</td><td>".$_POST['mt']."</td><td>".$bamt."</td></tr>";
	}
	echo "</table>";
}
?>
</body>
         </html>
