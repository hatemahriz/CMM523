<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DB Connection</title>
</head>
<body>
<?php
$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value)
{
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0)
    {
        continue;
    }
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}
$db = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword, $connectstr_dbname);

if (!$db)
{
    echo "Error connecting to the database." . PHP_EOL;
    exit;
}

echo "connection successful. \n";

$sql_query = "SELECT title FROM marvelmovies";
$result = $db->query($sql_query);
while($row = $result->fetch_array())
{
    echo "<p>" .$row["title"]. "</p>";
}

$db->close();
?>
<h1>Marvel Movies</h1>
</body>
</html>