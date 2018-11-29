<html>
<body>
<form action="" method="POST">
<table>
<tr><td>admno &nbsp;	:<td><input type="text" name="admno">
<tr><td><td><input type="submit" name="submit" value="accept">
</table>
</form>
</body>
</html>
<?php
if (isset($_POST['submit']))
{
$con=mysql_connect("localhost","root","");
mysql_select_db("dbexample",$con);
$sql="select * from admm where admno='$_POST[admno]'";
echo "<table border=2>";
$result=mysql_query($sql,$con);
echo "<tr><th>admno<th>name<th>class<th>place<th>dob";
while($row=mysql_fetch_array($result))
{
echo "<tr><td>".$row['admno']."<td>".$row['name']."<td>".$row['class']."<td>".$row['place']."<td>".$row['dob'];
}
echo "</table>";
}
?>
