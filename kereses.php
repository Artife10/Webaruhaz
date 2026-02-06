<html> 
<body>

<form action "kereses.php" method="GET">
<input id "search" type="text" placeholder="Type here">
<input id="submit" type="submit" value="Search">
</form>
</body>
</html>

<?php

$connection = mysql_connect("localhost", "root", "");

mysql_select_db("blog1") or die (mysql_error());

$safe_value = mysql_real_escape_string($_POST['search']);

$result
