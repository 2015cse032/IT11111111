<?php
$msg='';

	if(isset($_POST['upload']))
{   $dbc=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server');/*to cnnect to the database*/

	/*the path to store the uploaded image*/
	$target="uploaded_pdf_files/".basename($_FILES['pdf']['name']);
	$file=$_FILES['pdf']['name'];
	$cource=mysqli_real_escape_string($dbc,$_POST['cource']);//for fetching the string fro  the database (from one row)
	$branch=mysqli_real_escape_string($dbc,$_POST['branch']);
	$year=mysqli_real_escape_string($dbc,$_POST['year']);
	$semester=mysqli_real_escape_string($dbc,$_POST['semester']);//avoids sql injections
	$sql="insert into upload(branch,cource,year,file,semester)values('$branch','$cource','$year','$file','$semester')";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$sql)or die ("not executed".mysqli_error($dbc));
echo "hello";
	/*move the stored image into the folder*/
	if(move_uploaded_file($_FILES['pdf']['tmp_name'],$target))//for moving the file to the folder
{
 $msg="<center>"."file uploaded successfully"."</center>";
echo $msg;
}
else
{
$msg="<center>"."file not uploaded successfully"."</center>";
echo $msg;
}
}
?>
<html>
	<head>
			<title>upload page</title>
			<link rel="stylesheet" href="styleupload.css"></link>
	</head>
<body>
<div class="container">

	<form  method='POST' action='detail.php' enctype="multipart/form-data">
				
				<p><b>cource</b></p>
				<input type="text" name="cource" id="Cource" placeholder="Cource" required>
				<p><b>Semester</b></p>
				<input type="number" placeholder="semester" name="semester" required>
				<p><b>year</b></p>
				<input type="number" placeholder="year" name="year" required>
				<p><b>Branch</b></p>
				<input type="text" placeholder="Branch" name="branch" required>
				<input type="hidden" name" MAX FILE SIZE" value="200000">
				<input type="File" name="pdf" required="" accept=".pdf"> <br>
				<input type="text" name="choose a file" accept=".pdf"><br>
				<input type="submit" name="upload" value="upload">
				
</form>
</div>
</body>
</html>

