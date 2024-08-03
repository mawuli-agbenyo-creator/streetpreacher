<?php 
// DB credentials.
define('DB_HOST','srv1200.hstgr.io');
define('DB_USER','u210753955_w2');
define('DB_PASS','#Vq2pd5z');
define('DB_NAME','u210753955_w2');

try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>