<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="stylelog.css"></link>
	
</head>
<body>
	<header>
			<nav>
				<h1><b>PRESI EDUCATIONS</b></h1>
				<ul id="nav">
					<li><b><a class="homeblack" href="first.html">HOME</a></b></li>
					<li><b><a class="homeblack" href="contact.html">CONTACT US</a></b></li>
					<li><b><a class="homeblack" href="logout.php">LOG OUT</a></b></li>		
				</ul>
			</nav>
	</header> 
</head>
<!-----php for the login page--->
<?php
/*displaying as undefined index and problem in checking the role of the user*/
if(isset($_POST['login']))
{
	$con=mysqli_connect('localhost','root','root@123','it') or die ('error connecting to Mysql server: mysqli_connect_error()');/*database connection*/
	session_start();/*to start the session*/
		$email_form=$_POST['email'];
		$password_form=$_POST['password'];
	if($_SERVER["REQUEST_METHOD"] == "POST")/*the method through which the information is passed from the form*/
	{
		$email=mysqli_real_escape_string($con,$email_form); 
		$password=mysqli_real_escape_string($con,$password_form);
 	$sql="SELECT * FROM details WHERE email='$email' and password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);/*fetches the array of information */
$_SESSION['email']=$row['email'];/*email is fetched from the array*/
$_SESSION['password']=$row['password'];/*password is fetched from the array*/
$_SESSION['role']=$row['role'];/*role is fetched from the array*/
$count=mysqli_num_rows($result);
if($count==1)
	{
		if(isset($_SESSION['email']))/*checks if the  email is set*/
			{
			if(isset($_SESSION['password']))/*checks if the password is set*/
				{
				if ($_SESSION['role']=="admin")
					{ 				
			
                               			header ("location:adminfirst.php"); /*directs the user to admin page on checking the role=admin*/
                             
					}
				else if($_SESSION['role']=="user")
					{ 
 
                               			header ("location:welcomeuser.html"); /*directs the user to viewer page on chcking the role=viewer*/
                             
 
					}
				}
			}		
else 
	{
			echo "Your Login Name or Password is invalid";
	}
	}
}
/*<?php echo $php_self;?>*/
}
?>
<div class="container">
		
			<form method="post" action="securelogin.php">
				<p><b>Email</b></p>
				<input type="text" name=email placeholder=" Email" required>
				<p><b>Password</b></p>
				<input type="password" placeholder="Password" name="password" required pattern="^[A-Za-z0-9]+"required><!----does not accept any special characters-->
				<input type="submit" name="login" value="Log-in">
			</form>
			<p>
					Not a memeber?<a href="signup.php">   SIGN UP</a>
				</p>
</div>
</body>
</html>
