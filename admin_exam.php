
<html>
	<head>
		<title>ADMIN PAGE</title>
		<link rel="stylesheet" href="styleadmin_exam.css"></link>
	</head>
<body>
<header>
			<nav>
				<h1><b>PRESI EDUCATIONS</b></h1>
				<ul id="nav">
					<li><b><a class="homeblack" href="contact.html">CONTACT US</a></b></li><!---------for the header----->				
					<li><b><a class="homeblack" href="uptable_exam.php">UPLOADED TABLE</a></b></li>
					<li><b><a class="homeblack" href="adminfirst.php">QUESTION BANK</a></b></li>
					<li><b><a class="homeblack" href="logout.php">LOG OUT</a></b></li>		
				</ul>
			</nav>
</header>
<!----give previlages like uploading,downloading,removing the user,delete the uploaded file--->
<center><h1>WELCOME ADMIN!!</h1></center>
<div class="container">

	<form  method='POST' action='exam_details.php' enctype="multipart/form-data">
				<center><h3>UPLOAD FILES HERE IN PDF FORMAT!!</h3></center>
				<p><b>Exam Name</b></p>
				<input type="text" name="Exam_Name" id="Exam_Name" placeholder="Exam Name" required>

				<p><b>Exam Code</b></p>
				<input type="text" placeholder="Exam_Code" name="Exam_Code" required>
				<p><b>Department</b></p>
				<input type="text" placeholder="Department" name="Department" required>
				<p><b>year</b></p>
				<input type="number" placeholder="year" name="year" required>
				<input type="hidden" name" MAX FILE SIZE" value="200000"><br>
				<p>Question paper</p>
				<input type="File" name="Question_Paper"  accept=".pdf"> <br>
				<p>Answer key</p>
				<input type="File" name="Answer_Paper" accept=".pdf"> <br>
				<!--<input type="text" name="choose a file" accept=".pdf"><br>--->
				<input type="submit" name="upload" value="upload">
				
</form>
</div>
<?php

	if(isset($_POST['upload']))
{   $dbc=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server');/*to cnnect to the database*/

	/*the path to store the uploaded image*/
	$targetQ="uploaded_pdf_files/". basename($_FILES['Question_Paper']['name']);
 	$targetA="uploaded_pdf_files/". basename($_FILES['Answer_Paper']['name']);
	$Question_Paper=$_FILES['Question_Paper']['name'];
 	$Answer_Paper=$_FILES['Answer_Paper']['name'];
	$Exam_Name=mysqli_real_escape_string($dbc,$_POST['Exam_Name']);//for fetching the string fro  the database (from one row)
	$Exam_Code=mysqli_real_escape_string($dbc,$_POST['Exam_Code']);
 	$Department=mysqli_real_escape_string($dbc,$_POST['Department']);
 	$Year=mysqli_real_escape_string($dbc,$_POST['year']);
	$tb1="insert into exam_details (Exam_Name, Exam_Code, Department)values('$Exam_Name','$Exam_Code','$Department')";
	mysqli_query($dbc,$tb1)or die ("could not insert the values to exam_details table".mysqli_error($dbc));
 	$tb2="insert into exam_data(Exam_Code, Year, Question_Paper, Answer_Paper)values('$Exam_Code','$Year','$Question_Paper','$Answer_Paper')";
 	mysqli_query($dbc,$tb2)or die ("could not insert the values to exam_data table".mysqli_error($dbc));
 /*stores the submitted data into the databse*/
	if(move_uploaded_file($_FILES['Question_Paper']['tmp_name'],$targetQ))//for moving the file to the folder
	{
	echo "<center>"."<h2>"."file uploaded successfully"."</h2>"."</center>";
	}
 else
 	{
	 echo "<center>"."<h2>"."error while uploading the question paper"."</h2>"."</center>";
 	}
 if(move_uploaded_file($_FILES['Answer_Paper']['tmp_name'],$targetA))
	 {
	echo "<center>"."<h2>"."file uploaded successfully"."</h2>"."</center>";

	}
 else
 	{
	 echo "<center>"."<h2>"."error while uploading the answer key"."</h2>"."</center>";
	 }
 mysqli_close($dbc);
}
?>
<div class="container1">
	
	<form  method='POST' action='admin_exams.php'>
				<center><h3>DELETE FILE HERE!!</h3></center>
				<center><a href="view_exam.php">view the uploaded table</a></button>
				<br>
				<br>
				<p><b>Exam Code</b></p>
				<input type="text" name="Exam_Code" id="Exam_Code" placeholder="Exam Code" required>
				<p><b>year</b></p>
				<input type="number" name="Year" id="Year" placeholder="Year" required>
				<input type="submit" name="delete" value="delete">
				
				
</form>
</div>
<?php

if(isset($_POST['delete']))
{	 
	 $dbc=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server');/*to cnnect to the database*/
	$Exam_Code=mysqli_real_escape_string($dbc,$_POST['Exam_code']);
	$Year=mysqli_real_escape_string($dbc,$_POST['Year']);
	//for fetching the string for the database (from one row)
	$del="delete from exam_data where Exam_Code ='$Exam_Code' and Year = '$Year'";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$sql)or die ("could not connect with the".mysqli_error($dbc));
mysqli_close($dbc);
}
?>
<div class="container2">
	<center><p><h3>BLOCK USERS</h3></p></center>
	<form method="POST" action="admin_exams.php"> 
	<p><b>Email</b></p>
	<input type="text" name="email" placeholder="enter the email address" required>
	<input type="submit" name="block" value="block">
	</form>
	<center><p><h3>UNBLOCK USERS</h3></p></center>
	<form method="POST" action="adminfirst.php"> 
	<p><b>Email</b></p>
	<input type="text" name="email" placeholder="enter the email address" required>
	<input type="submit" name="unblock" value="unblock">
	</form>
</div>
<?php
if(isset($_POST['block']))
{
	  $dbc=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server');/*to cnnect to the database*/
	$email=mysqli_real_escape_string($dbc,$_POST['email']);//for fetching the string fro  the database (from one row)
	$sql="insert into block_user(email) values('$email')";
	mysqli_query($dbc,$sql) or die("could not connect with the database".mysqli_error($dbc));
	echo '<center>'.'the email id successfully blocked the user cannot signup'.'</center>>'.'<br>';
	$res="delete from details where email ='$email'";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$res)or die ("could connect with the".mysqli_error($dbc));
	echo '<center>'.'email id successfuly deleated from the signed up table'.'</center>>';
mysqli_close($dbc);
}
?>
<!--<div class="container3">
	<center><p><h3>UNBLOCK USERS</h3></p></center>
	<form method="POST" action="adminfirst.php"> 
	<p><b>Email</b></p>
	<input type="text" name="email" placeholder="enter the email address" required>
	<input type="submit" name="unblock" value="unblock">
</form>
</div>-->
<?php
if(isset($_POST['unblock']))
{
	 $dbc=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server');/*to cnnect to the database*/
	$email=mysqli_real_escape_string($dbc,$_POST['email']);//for fetching the string fro  the database (from one row)
	$res="delete from block_user where email ='$email'";/*stores the submitted data into the databse*/
	mysqli_query($dbc,$res)or die ("could connect with the".mysqli_error($dbc));
	echo '<center>'.'email id successfuly unblocked'.'</center>>';
	$sql="insert into details (email) values('$email')";
	mysqli_query($dbc,$sql) or die("could not connect with the database".mysqli_error($dbc));
	echo '<center>'.'the mail id is successfully inserted into the signup table'.'</center>>'.'<br>';
	
mysqli_close($dbc);
}
?>
</body>
</html>
