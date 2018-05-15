<?php
/*this php code is for signup*/
$errors=array();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root@123";
$dbdatabase ="it";
if(isset($_POST['signup']))
{

	$dbc=mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase) or die ('error connecting to Mysql server');/*database connection*/
		$firstname=$_POST['FirstName'];
		$middlename=$_POST['MiddleName'];
		$lastname=$_POST['LastName'];
		$countrycode=$_POST['Countrycode'];
		$phonenumber=$_POST['phonenumber'];
		$age=$_POST['age'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$confirmpassword=$_POST['confirmpassword'];
		$educationalqualification=$_POST['educationalqualification'];
		$user="user";
	if($password != $confirmpassword)
	{
		array_push($error,"the two passwords entered  do not match");
	}
	$sql="select email from details where email= $email ";/*to check if the mail id that has been entered  is already registered or not*/
	$select=mysqli_query($dbc,$sql);
	/*$row=mysqli_fetch_array($select);*/
if(mysqli_num_rows($select)>0)
	{
		echo 'the entered mail id already registered';/*if the mail id is appearing more then once then the user has already registered*/
	}
else
	{
	$res="insert into details 		(firstname,middlename,lastname,countrycode,phonenumber,age,email,password,educationalqualification,role)values						  ('$firstname','$middlename','$lastname',$countrycode,'$phonenumber',$age,'$email','$password','$educationalqualification','$user')";
	$query=mysqli_query($dbc,$res)or die('error inserting the values');
           if($query==1)
	{ 
		echo '<center>'.'<b>'.'user details have been inserted successfully'.'</b>'.'</center>';
		echo'<center>'.'<b>'. 'THANK YOU for regestering'.'</b>'.'</center>';
?>
		<center><b><a href="securelogin.php">LOG-IN</a></b></center>
<?php
	}
else
	{
		echo'<center>'.'<b>'. 'the details could not be inserted please try again'.'</b>'.'</center>';
?>
		<center><b><a href="signup.php">SIGNUP</a></b></center>
<?php
	}
}
mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="stylesign.css">
	<title></title>

</head>
<body>
	<header>
			<nav>
				<h1><b>PRESI EDUCATIONS</b></h1>
				<ul id="nav">
					<li><b><a class="homeblack" href="first.html">HOME</a></b></li>
					<li><b><a class="homeblack" href="contact.html">CONTACT US</a></b></li><!---------for the header----->
					<li><b><a class="homeblack" href="index.html">LOG-IN</a></b></li>
				</ul>
			</nav>

		</header>



<div class="container">

	<center><h2>Sign-Up Here</h2></center>
			<form method="post" action="signup.php">
				<p>FIRST NAME</p>
				<input type="text" id="first_name" placeholder="First name" name="FirstName" required>
				<br>
				<br>
				<p>MIDDLE NAME</p>
				<input type="text" id="middle_name" placeholder="Middle name" name="MiddleName" required>
				<br>
				<br>
				<p>LAST NAME</p>
				<input type="text" id ="last_name" placeholder="Last name" name="LastName" required>
				<br>
				<br>
				<p>COUNTRY CODE</p>
				<input type="number" id ="country_code" placeholder="Country code" name="Countrycode" required>
				<br>
				<br>
				<p>Phone number</p>
    				<b><input type="text" id="phone number" name="phonenumber" placeholder="Your phone number" required></b>
				<br>
				<br>
				<p>AGE</p>
				<input type="number" id ="age" placeholder="please enter your age" name="age" required>
				<br>
				<br>
				<p>educational qualification</p>
				<label for="educational qualification"></label>  
   						 <select id="edu qualification" name="educationalqualification">
      							  <option value="school">school</option>
      							  <option value="pre-university">pre-university</option>
       							  <option value="under graduate">Under graduate</option>
							  <option value="post graduate">post graduate</option>
							  <option value="others">others</option>
					</select>
				<br>
				<br>	
				<p>E-MAIL ADDRESS</p>
				<input type="text" placeholder="EMAIL" name="email" required>
				<br>
				<br>
				<p>PASSWORD</p>
				<input type="Password" placeholder="Password" name="password" required>
				<br>
				<br>
				<p>CONFIRM PASSWORD</p>
				<input type="Password" placeholder="Password" name="confirmpassword" required>
			<br>
				<input type="submit" name="signup" value="Register">
				
			</form>
				<p>
					Already a member?<a href="securelogin.php">   SIGN IN</a>
				</p>
				
    </div>
    </body>
</html>
