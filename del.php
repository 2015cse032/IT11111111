<?php

$msg='';

	if(isset($_POST['upload']))
{   $dbc=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server');/*to cnnect to the database*/

	/*the path to store the uploaded image*/
	$target="uploaded_pdf_files/".basename($_FILES['pdf']['name']);
	$file=$_FILES['pdf']['name'];
	$cource=mysqli_real_escape_string($dbc,$_POST['cource']);
	$branch=mysqli_real_escape_string($dbc,$_POST['branch']);
	$year=mysqli_real_escape_string($dbc,$_POST['year']);
	$semester=mysqli_real_escape_string($dbc,$_POST['semester1']);
	$sql="insert into upload(branch,cource,year,file,semester)values('$branch','$cource','$year','$file','$semester')";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$sql)or die ("not executed".mysqli_error($dbc));
	/*move the stored image into the folder*/
echo "<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
if(move_uploaded_file($_FILES['pdf']['tmp_name'],$target))
{
 $msg="<center>"."<h1>"."<------FILE UPLOADED SUCCESSFULLY------>"."</h1>"."</center>";
echo $msg;
echo "<center>"."<b>"."<h3>"."File name:$file"."</b>"."</h3>"."</center>";
echo "<center>"."<b>"."<h3>"."course:$cource"."</b>"."</h3>"."</center>";
echo "<center>"."<b>"."<h3>"."branch:$branch"."</b>"."</h3>"."</center>";
}
else
{
$msg="<center>"."error while uploading the file"."</center>";
echo $msg;
}
}
?>

