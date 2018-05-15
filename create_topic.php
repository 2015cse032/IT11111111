<html>
<head><title>PRESI EDUCATIONS</title>

	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="style_create_topic.css"></link>
	
</head>
<body>
<header>
			<nav>
				<h1><b>PRESI EDUCATIONS</b></h1>
				<ul id="nav">
					<li><b><a class="homeblack" href="first.html">HOME</a></b></li>
					<li><b><a class="homeblack" href="contact.html">CONTACT US</a></b></li><!---------for the header----->
					<li><b><a class="homeblack" href="logout.php">LOG OUT</a></b></li>
				</ul>
			</nav>
		</header>
			<table  heignt="500" width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
			<form method="post" action="add_topic.php">
			<td>
				<td>
				<table width="100%" border="4" cellpadding="3" cellspacing="5" bgcolor="#FFFFFF">
				<tr>
				<td colspan="3" bgcolor="#E6E6E6"><strong>Create New Topic</strong> </td>
				</tr>
				<tr>
				<td width="50%"><strong>Topic</strong></td>
				<td width="2%">:</td>
				<td width="84%"><input type="text" name="topic" id="topic" size="50" /></td>
				</tr>
				<tr>
				<td valign="top"><strong>Detail</strong></td>
				<td valign="top">:</td>
				<td><textarea name="detail" cols="200" rows="20"></textarea></td>
				</tr>
				<tr>
				<td><strong>Name</strong></td>
				<td>:</td>
				<td><input type="text" name="name"  id="name" size="100" /></td>
				</tr>
				<tr>
				<td><strong>Email</strong></td>
				<td>:</td>
				<td><input type="text" name="email" id="email" size="100" /></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
				</tr>
				</table>
				</td>					
			</form>

				
</tr>
</body>
</html>
