<html>
<head>
<center>
VIEW DETAILS
</head>
<body>
<form action="" method=POST>
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dbexample",$con);
	$sql1="select distinct(processor) from comp ";
	$result=mysql_query($sql1,$con);
	$sql2="select distinct(speed) from comp ";
	$result2=mysql_query($sql2,$con);
?>
<table>
<tr><td>Processor type</td><td><input type="radio" name=ck value=r1></td><td>Speed</td><td><input type="radio" name=ck value=r2></td><td>Both</td><td><input type="radio" name=ck value=r3></td></tr>
<tr><tr><td></td><td><input type="submit" value="OK" name="btnsubmit"></td></tr></tr>
</table>
</form>
<?php
	if(isset($_POST["btnsubmit"]))
	{
		if($_POST['ck']=="r1")
		{
?>
		<form action="processor.php" method=POST>
				<table>
				<tr><td>Processor Type </td><td>
				<select name="prtype">
				<?php
				while($row=mysql_fetch_array($result))
				{
				?>
					<option> <?php echo $row['processor'] ?> </option>
				<?php
				}
				?>
				</select></td></tr>
				<tr><td><input type="submit" value="view" name="bt1nsubmit"></td></tr>
				</table>
				</form>
		     <?php
		}
		?>
		<?php
		if($_POST['ck']=='r2')
		{
		?>
			<form action="speed.php" method=POST>
			<table>
			<tr><td>Speed </td><td>
			<select name="spd">
			<?php
			while($row=mysql_fetch_array($result2))
			{
			?>
			<option> <?php echo $row['speed'] ?> </option>
			<?php
			}
			?>
			</select></td></tr>
				<tr><td><input type="submit" value="view" name="bt1nsubmit"></td></tr>
				</table>
				</form>
			<?php
		}
			?>
		<?php
		if($_POST['ck']=='r3')
		{
		?>
			<form action="both.php" method=POST>
	    	<table>
			<tr><td>Processor Type </td><td>
			<select name="prtype">
			<?php
			while($row=mysql_fetch_array($result))
			{
			?>
			<option> <?php echo $row['processor'] ?> </option>
			<?php
			}
			?>
			</select>
			<tr><td>Speed </td><td>
			<select name="spd">
			<?php
			while($row=mysql_fetch_array($result2))
			{
			?>
			<option> <?php echo $row['speed'] ?> </option>
			<?php
			}
			?>
			</select></td></tr>
				<tr><td><input type="submit" value="view" name="bt1nsubmit"></td></tr>
				</table>
				</form>
			<?php
		}
	}
	?>
</form>
</body>
</html>
