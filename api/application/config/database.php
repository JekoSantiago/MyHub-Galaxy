<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'dbATPIDeliver';
$query_builder = TRUE;

$db['dbATPIDeliver'] = array(
	'dsn'	=> '',
	'hostname' => '10.13.188.163',
	'username' => 'Melvin',
	'password' => 'Melvin123', 
	'database' => 'ATPI_Deliver',
	'dbdriver' => 'sqlsrv',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['dbUserMgt'] = array(
	'dsn'	=> '',
	'hostname' => '10.13.188.163',
	'username' => 'Melvin',
	'password' => 'Melvin123', 
	'database' => 'UserMgt',
	'dbdriver' => 'sqlsrv',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt'  => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
); 
