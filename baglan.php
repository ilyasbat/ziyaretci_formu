<?php  
session_start();
include('ez_sql_core.php');
include('ez_sql_mysqli.php');
$db = new ezSQL_mysqli('root','','ziyaretci_formu','localhost');
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8" );
$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
define('sifre','ahuhasta123');
?>