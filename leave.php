<html>
<body>
<form method=POST action="">
<table>
<tr><td>Empid	<td>:<input type="text" name="eid">
<tr><td>Casual <input type="radio" name="leav" value="cll"/>
	<td>Medical <input type="radio" name="leav" value="mll"/>
<tr><td>No. of leave	<td>:<input type="text" name="enol">
<tr><td><td><input type="submit" name="orsub" value="ok">
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['orsub']))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("mca4",$con);
	$sql="SELECT * FROM  `leave`  WHERE  `empid` ='$_POST[eid]'";
	$temp=mysql_query($sql,$con);
	while($row=mysql_fetch_array($temp))
	{
		if($_POST['leav']=="cll")
		{
			$tot_cl=$row['cl']+$_POST['enol'];
			echo $tot_cl; 
			if($tot_cl<=15)
			{
				$sql="update `leave` set `cl`=$tot_cl where `empid`='$_POST[eid]'";
				mysql_query($sql,$con);
				echo "granted";
			}
			else
				echo "Not granted";	
		}
		if($_POST['leav']=="mll"){
			$tot_ml=$row['ml']+$_POST['enol'];
			echo $tot_ml;
			if($tot_ml<=20)
			{
				$sql="update `leave` set `ml`=$tot_ml where `empid`='$_POST[eid]'";
				mysql_query($sql,$con);
				echo $sql;	
				echo "granted";
			}
			else
				echo "Not granted";	
		}	
	}
}
 
