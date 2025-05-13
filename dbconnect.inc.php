<?php


// Main Information
// Database Name:	autodsp2_guitar
// Database Server:	db157.pair.com
// Full Access Username
// This username has full access to database. It is the only username allowed to create new tables in the database, or to delete or change tables.
// Username:	autodsp2_3
// Password:	V4chM4Vjm6pqh7bR
// Read/Write Username
// This username has access to read and write to the database, but can't create or drop tables.
// Username:	autodsp2_3_w
// Password:	rafmVNXrrbJ65TvZ
// Read Only Username
// This username has read only access to the database.
// Username:	autodsp2_3_r
// Password:	4ReZjF8kWFDwAkQk




$servername = "localhost";
$username = "root";
$password = "root"; 
$dbname = "guitar"; 

if ($_SERVER['HTTP_HOST'] == "autodsp2.pairserver.com" ) {
    $servername = 'db157.pair.com';
    $dbname = 'autodsp2_guitar';
    $username = 'autodsp2_3_w';
    $password = 'rafmVNXrrbJ65TvZ';
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

