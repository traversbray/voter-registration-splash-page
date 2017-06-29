

<?php

/* This is the mysql connection page for a backend database if you wanted to insert
   real data */

$_MYSQL['host']     = 'localhost'    ;
$_MYSQL['user']     = 'webadmin'         ;
$_MYSQL['password'] = '';

$_MYSQL['link']     = False          ;
$_MYSQL['database'] = 'nevada_voter' ;         ;

//functions for calling a database

function dbconnect(){
	global $_MYSQL;

	$_MYSQL['link'] = mysqli_connect($_MYSQL['host'], $_MYSQL['user'], $_MYSQL['password']);
	mysqli_select_db($_MYSQL['link'], $_MYSQL['database']);
}

function dbquery($query){
	global $_MYSQL;

	/* Add sanatization for SQL injection. */
	return mysqli_query($_MYSQL['link'], $query);
}

function dbrows($result){
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function dbrowsnum($result){
	return mysqli_fetch_all($result, MYSQLI_NUM);
}

function dbqueryfree($result){
	mysqli_free_result($result);
}

function dbclose(){
	global $_MYSQL;

	if($_MYSQL['link'] !== False){
		mysqli_close($_MYSQL['link']);
		$_MYSQL['link'] = False;
	}
}

?>
