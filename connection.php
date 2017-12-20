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
define('DB_SERVER', $connectstr_dbhost);
define('DB_DATABASE', $connectstr_dbname);
define('DB_USER', $connectstr_dbusername);
define('DB_PASSWORD', $connectstr_dbpassword);

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);


if (!$db)
{
    echo "Error connecting to the database.\n";
    exit;
}
?>
