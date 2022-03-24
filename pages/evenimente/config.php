<?php 

//$host    = 'localhost';
//$user    = 'root';
//$pass    = 'root';
//$db        = 'bridge';

$host	= 'sql1.fastweb.ro';
$user	= 'wwwdata';
$pass	= 'bridgesapte3%';
$db		= 'cupa_unirii_';
$tbl	= 'participanti';

if (! $dbc = @mysqli_connect($host, $user, $pass, $db)) { 
	echo 'no connection';
}


?>