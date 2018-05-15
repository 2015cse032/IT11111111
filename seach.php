<?php
$db=mysqli_connect("localhost","root","root@123","it")or die("error connecting to the databse:".mysql_error());
/*mysql_select_db("it")or die(mysql_error());*/
?>
<html>
<head>
<title> search results</title>
<meta htth-equiv="content-type" content="text/html:charset=utf-8"/>
<link rel="stylesheet" type="text/css"href="styleupload.css"/>
</head>
<body>
<?php
$query=$_POST['tosearch'];/*gets the value from the form through get function(from uptable)*/
$min_length=1;/*minimum length of the search*/
if(strlen($query)>=$min_length)
{
$query=htmlspecialchars($query);

$query1=("select * from upload WHERE file LIKE '%$query%'") or die(mysql_error());
/*$query=mysqli_real_escape_string($query);/*makes sure noone uses the sql injection*/
/*$raw_results=mysql_query("select * from upload WHERE('file' LIKE '%".$query."%') OR ('file' LIKE '%".$query."%')") or die(mysql_error());*/
echo "<center>"."<h1>"."<b>"."<-------SEARCH REASULTS------>"."</b>"."</h1>"."</center>";
$result=mysqli_query($db,$query1);
if(mysqli_num_rows($result)>0)
{
while($results=mysqli_fetch_array($result))
{
echo "<center><h2>".'BRANCH:'."</h3>".$results['branch']."</h2>"."</center>";
echo "<center><h2>".'COURCE:'."</h3>".$results['cource']."</h2>"."</center>";
echo "<center><h2>".'YEAR:'."</h3>".$results['year']."</h2>"."</center>";
}
}
?>
<!----doubt(to display view pdf when the search results are shown)--->
<?php
$query2="select * file from upload where file LIKE='%$query%'";
$res=mysqli_query($db,$query2);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_array($res))
{
?>
<td><a href ="uploaded_pdf_files/<?php echo $row['file']?>">view the pdf</a></td>
<?php
}
}
}
?>
<?php
else
{
echo "<center>"."<h1>"."<b>"."no results found"."</h1>"."</b>"."</center>";
}
/*else
{
echo "<center>"."<h2>"."$min_length:is the minimum character length to be entered in search"."</b>"."</center>";
}*/
?>
</body>
</html>
