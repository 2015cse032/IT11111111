<html>
<head><title>PRESI EDUCATIONS|LOG OUT PAGE</title></head>
<body>
<?php
session_start();
session_destroy();

header('location:first.html');
echo 'you have successfully logged out';
?>
</body>
</html>
