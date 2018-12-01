<?php
		$con=mysql_connect("localhost","root","");
		mysql_select_db("dbexample",$con);
		$sql="select depart,count(*) from comp where `processor`='$_POST[prtype]' group by `depart`";
		$res=mysql_query($sql,$con);
		echo "<table border=1>";
		echo "<tr><th>DEPARTMENT</th><th>COUNT OF PROCESSOR</th></tr>";
		while($row=mysql_fetch_array($res))
		{
			echo "<tr><td>".$row['depart']."</td><td>".$row['count(*)']."</td></tr>";
		}
		echo "</table>";
?>
