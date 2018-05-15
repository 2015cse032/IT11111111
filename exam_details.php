<?php

$msg='';

	if(isset($_POST['upload']))
    {   $dbc=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server');/*to cnnect to the database*/

	/*the path to store the uploaded image*/
	$targetQ="uploaded_pdf_files/".basename($_FILES['Question_Paper']['name']);
	$Question_Paper=$_FILES['Question_Paper']['name'];
 	$targetA="uploaded_pdf_files/".basename($_FILES['Answer_Paper']['name']);
	$Answer_Paper=$_FILES['Answer_Paper']['name'];
	$Exam_Name=mysqli_real_escape_string($dbc,$_POST['Exam_Name']);
	$Exam_Code=mysqli_real_escape_string($dbc,$_POST['Exam_Code']);
 	$Department=mysqli_real_escape_string($dbc,$_POST['Department']);
	$Year=mysqli_real_escape_string($dbc,$_POST['year']);
	$tb1="insert into exam_details(Exam_Name, Exam_Code, Department)values('$Exam_Name','$Exam_Code','$Department')";
	mysqli_query($dbc,$tb1)or die ("not executed".mysqli_error($dbc));
 	$tb2="insert into exam_data(Exam_Code, Year, Question_Paper, Answer_Paper)values('$Exam_Code','$Year','$Question_Paper','$Answer_Paper')";
	mysqli_query($dbc,$tb2)or die ("not executed".mysqli_error($dbc));
echo "<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
if(move_uploaded_file($_FILES['Question_Paper']['tmp_name'],$targetQ))//for moving the file to the folder
{
echo "<center>"."<h2>"."Question Paper file uploaded successfully"."</h2>"."</center>";

}

 else
 {
	 echo "<center>"."<h2>"."error while uploading the Question Paper pdf"."</h2>"."</center>";
 }
	 
if(move_uploaded_file($_FILES['Answer_Paper']['tmp_name'],$targetA))//for moving the file to the folder
{
echo "<center>"."<h2>"."Answer Paper file uploaded successfully"."</h2>"."</center>";

}

 else
 {
	 echo "<center>"."<h2>"."error while uploading the Answer Paper pdf"."</h2>"."</center>";
 }
	 
	 
 mysqli_close($dbc);
}

?>

