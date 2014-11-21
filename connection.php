<?php
$server = 'group03p2.swe3613.com';
$username = 'wapp03p2swe3613';
$password = 'ndgh678dfg45s';
$admin_username = 'dba03p2swe3613';
$admin_password = 'bdfa3245fj65';
$database = 'swe3613_db03p2';

if(!mysql_connect($server, $username, $password))
{
	exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
	exit('Error: could not select the database');
}
?>