<?php
/* Local Database*/

$servername = "srv1200.hstgr.io";
$username = "u210753955_w2";
$password = "#Vq2pd5z";
$dbname = "u210753955_w2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 