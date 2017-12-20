<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DB Connection</title>
</head>
<body>
<h1>Marvel Movies</h1>
<?php
include ("connection.php");
$sql_query = "SELECT title FROM marvelmovies";
$result = $db->query($sql_query);
while($row = $result->fetch_array())
{
    echo "<p>" .$row["title"]. "</p>";
}
$db->close();
?>
</body>
</html>