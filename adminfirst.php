
<html>
	<head>
		<title>PRESI|ADMIN PAGE</title>
		<link rel="stylesheet" href="styleadminfirst.css"></link>
	</head>
<body>
<header>
			<nav>
				<h1><b>PRESI EDUCATIONS</b></h1>
				<ul id="nav">
					<li><b><a class="homeblack" href="first.html">HOME</a></b></li>
					<li><b><a class="homeblack" href="contact.html">CONTACT US</a></b></li><!---------for the header----->				
					<li><b><a class="homeblack" href="inforpage.html">UPLOAD DETAILS</a></b></li>
                                        <li><b><a class="homeblack" href="uptable.html">UPLOADED TABLE</a></b></li>
  <li><b><a class="homeblack" href="exam_details.php">EXAMMODULE</a></b></li>

					<li><b><a class="homeblack" href="logout.php">LOG OUT</a></b></li>		
				</ul>
			</nav>
</header>
<!----give previlages like uploading,downloading,removing the user,delete the uploaded file--->
<center><h1>WELCOME ADMIN!!</h1></center>
<div class="container">

	<form  method='POST' action='detail.php' enctype="multipart/form-data">
				<center><h3>UPLOAD FILES HERE IN PDF FORMAT!!</h3></center>
				<p><b>cource</b></p>
				<input type="text" name="cource" id="Cource" placeholder="Cource" required>
				<p><b>Semester</b></p>
				<input type="number" placeholder="semester" name="semester1" required>
				<p><b>year</b></p>
				<input type="number" placeholder="year" name="year" required>
				<p><b>Branch</b></p>
				<input type="text" placeholder="Branch" name="branch" required>
				<input type="hidden" name" MAX FILE SIZE" value="200000"><br>
				
				<input type="File" name="pdf" required="" accept=".pdf"> <br>
				<!--<input type="text" name="choose a file" accept=".pdf"><br>--->
				<input type="submit" name="upload" value="upload">
				
				
</form>
</div>
<?php

	if(isset($_POST['upload']))
{   $dbc=mysqli_connect('localhost','root','ashika1301','lamp_project') or die ('error connecting to Mysql server');/*to cnnect to the database*/

	/*the path to store the uploaded image*/
	$target="uploaded_pdf_files/".basename($_FILES['pdf']['name']);
	$file=$_FILES['pdf']['name'];
	$cource=mysqli_real_escape_string($dbc,$_POST['cource']);//for fetching the string fro  the database (from one row)
	$branch=mysqli_real_escape_string($dbc,$_POST['branch']);
	$year=mysqli_real_escape_string($dbc,$_POST['year']);
	$semester=mysqli_real_escape_string($dbc,$_POST['semester1']);//avoids sql injections
	$sql="insert into upload(branch,cource,year,file,semester)values('$branch','$cource','$year','$file','$semester')";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$sql)or die ("not executed".mysqli_error($dbc));
	/*move the stored image into the folder*/
	if(move_uploaded_file($_FILES['pdf']['tmp_name'],$target))//for moving the file to the folder
{
echo "<center>"."<h2>"."file uploaded successfully"."</h2>"."</center>";

}
else
{
echo "<center>"."<h2>"."error while uploading the image"."</h2>"."</center>";
}
mysqli_close($dbc);
}

?>

<div class="container1">
	
	<form  method='POST' action='adminfirst.php'>
				<center><h3>DELETE FILE HERE!!</h3></center>
				<p><b>enter the id number of the file</b></p>
				<br>
				<button><center><a href="uptable.php">view the uploaded table</a></center></button>
				<br>
				<br>
				<input type="number" name="id_number" id="id_number" placeholder="id number of the file" required>
				<input type="submit" name="delete" value="delete">
				
				
</form>
</div>
<?php

if(isset($_POST['delete']))
{	 
	 $dbc=mysqli_connect('localhost','root','ashika1301','lamp_project') or die ('error connecting to Mysql server');/*to cnnect to the database*/
	$id=mysqli_real_escape_string($dbc,$_POST['id']);//for fetching the string for the database (from one row)
	$sql="delete from upload where id ='$id'";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$sql)or die ("could connect with the".mysqli_error($dbc));
mysqli_close($dbc);
}
?>
<div class="container2">
	<center><p><h3>BLOCK USERS</h3></p></center>
	<form method="POST" action="adminfirst.php"> 
	<p><b>Name</b></p>
	<input type ="text" name="name" placeholder="please enter the name" required>
	<p><b>Email</b></p>
	<input type="text" name="email" placeholder="enter the email address" required>
	<input type="submit" name="block" value="block">
</form>
</div>
<?php
if(isset($_POST['block']))
{
	 $dbc=mysqli_connect('localhost','root','ashika1301','lamp_project') or die ('error connecting to Mysql server');/*to cnnect to the database*/
	$email=mysqli_real_escape_string($_POST['email']);//for fetching the string fro  the database (from one row)
	$sql="insert into block_user(email) values('$email')";
	mysqli_query($dbc,$sql) or die("could not connect with the database".mysqli_error($dbc));
	$res="delete from upload where email ='$email'";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$sql)or die ("could connect with the".mysqli_error($dbc));
mysqli_close($dbc);
}
?>
</body>
</html>
