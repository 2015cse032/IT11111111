<html>
<head>
<title>PRESI EDUCATIONS|CONTACT US</title>
<meta htth-equiv="content-type" content="text/html:charset=utf-8"/>
<link rel="stylesheet" type="text/css"href="stylecont.css"/>
</head>
<body>
	<header>
			<nav>
				<h1><b>PRESI EDUCATIONS</b></h1>
				<ul id="nav">
					<li><b><a class="homeblack" href="first.html">HOME</a></b></li>
					<li><b><a class="homeblack" href="contact.html">CONTACT US</a></b></li><!---------for the header----->
					<li><b><a class="homeblack" href="index.html">LOG-IN</a></b></li>
					<li><b><a class="homeblack" href="service.html">SERVICES</a></b></li>
				</ul>
			</nav>
		</header>
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root@123";
$dbdatabase ="it";
if(isset($_POST['contact']))
{
$dbc=mysqli_connect('$dbhost','$dbuser','$dbpass','$dbdatabase') or die ('error connecting to Mysql server: mysqli_connect_error()');/*database connection*/
/*getting the values from the form through name and assigning values*/
	$name=$_POST['name'];
	$phonenumber=$_POST['phonenumber'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$feedback=$_POST['feedback'];
/*quering the database for inserting the values onto the tables like contact and contact_feedback*/
$res="insert into contact (name,phonenumber,email)values('$name','$phonenumber','$email')";/*problem in inserting the values to multiple tables in the database conected by the foreign key*/
	$query=mysqli_query($dbc,$res)or die('error inserting the values,try again');
$res1="insert into contact_feedback (subject,feedback)values('$subject','$feedback')";
	$query1=mysqli_query($dbc,$res1)or die('error inserting the values');
echo '<br>';
if($query==1)
{
if($query1==1)
	{
		echo '<center>'.'<b>'.'<----THANK YOU----->'.'</b>'.'</center>';
		echo '<center>'.'<b>'.'YOUR FEEDBACK IS VALUABLE TO US'.'</b>'.'</center>';
		echo '<center>'.'<b>'.'THANK YOU FOR YOUR FEEDBACK'.'</b>'.'</center>';
	}
else
	{
		echo '<center>'.'<---error occured while reording the details kindly fill the form again----->'.'</center>';
	}
}
mysqli_close($dbc);/*disconnect from the database(can no more query the database)*/
}
?>
<!----html code for the contact page--->
<div class="full_width_image">
 		<div class="container">
  		<form method="POST" action="contact.php">
			<h2>Hello!!!! Welcome to PRESI EDUCATIONS,Nice to meet you</h2>
    			<label for="fname"><b> Name</b></label>
				<b><input type="text" id="name" name="name" value="" placeholder="Your Name" required="required" /></b>
    			<label for="pnum"><b>Phone number(format:xxxx-xxx-xxx)</b></label>
    				<b><input type="tel" id="phone number" name="phonenumber" pattern="^\d{4}-\d{3}-\d{3}$"placeholder="Your phone number"/></b>

			<label for="email"><b>Email</b></label>
    				<b><input type="email" id="email" name="email" value="" placeholder="Please enter your Email-Id" style="width:400px"required="required" /></b><br>
   					
			<label for="subject"><b>Subject</b></label>
			      <input type="text" id="subject" name="subject" required="required"> 
				 <label for="country"><b>Place</b></label>  
   						 <select id="country" name="country">
      							  <option value="bangalore">Bangalore</option>
      							  <option value="mumbai">Mumbai</option>
       							  <option value="delhi">Delhi</option>
							  <option value="Tamil nadu">Chennai</option>
							  <option value="Andhra pradeash">Andhra Pradesh</option>
							  <option value="Gujrath">Gujrath</option>
							  <option value="Bihar">Bihar</option>
							 <option value="Bihar">Maharashtra</option>
							 <option value="non of above"none of above</option>
    						</select>

  	 		 <label for="subject"><b>FEEDBACK</b></label>
    				<textarea id="subject" name="feedback" placeholder="Feedback" style="height:500px"></textarea>

    			<center><input type="submit" name = contact value="Submit" style="width:400px"style="height=20px"></center>

  		</form>
		</div>
	</div>
</body>
</html>

