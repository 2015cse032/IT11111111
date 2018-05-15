<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root@123"; // Mysql password
$db_name="it"; // Database name
if(isset(submit))
{
// Connect to server and select database.
$db=mysqli_connect($host,$username,$password,$db_name)or die("cannot connect to the database");
{
// get data that sent from form
$topic=mysqli_real_escape_string($_POST['topic']);
$detail=mysqli_real_escape_string($_POST['detail']);
$name=mysqli_real_escape_string($_POST['name']);
$email=mysqli_real_escape_string($_POST['email']);

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO forum_question (topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($db,$sql);

if($result)
{
echo "Successfully created the topic"."<br>";
echo "<a href=main_forum.php>View your topic</a>";
}
else {
echo "ERROR";
}
mysqli_close($db);
}
}
?>
