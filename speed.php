<?php
		$con=mysql_connect("localhost","root","");
		mysql_select_db("dbexample",$con);
		$sql="select depart,count(*) from comp where `speed`='$_POST[spd]' group by `depart`";
		$res=mysql_query($sql,$con);
		echo "<table border=1>";
		echo "<tr><th>DEPARTMENT</th><th> SPEED COUNT </th></tr>";

		while($row=mysql_fetch_array($res))
		{
			echo "<tr><td>".$row['depart']."</td><td>".$row['count(*)']."</td></tr>";
		}
		echo "</table>";
?>
