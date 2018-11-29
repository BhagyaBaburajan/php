<html>
<body>
<form action="" method="POST">
<table>
<tr><td>Admno &nbsp	:<td><input type="text" name="admno">
<tr><td>Name &nbsp;	:<td><input type="text" name="name">
<tr><td>class &nbsp;		:<td><input type="text" name="class">
<tr><td>place &nbsp;	:<td><input type="text" name="place">
<tr><td>dob &nbsp		:<td><input type="text" name="dob">
<tr><td><td><input type="submit" name="submit" value="insert">
</table>
</form>
</body>
</html>
<?php
if (isset($_POST['submit']))
{
$con=mysql_connect("localhost","root","");
mysql_select_db("dbexample",$con);
$sql="insert into admm values('$_POST[admno]','$_POST[name]','$_POST[class]','$_POST[place]','$_POST[dob]')";
mysql_query($sql,$con);
}
?>
