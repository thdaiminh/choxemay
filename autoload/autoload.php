<?php
session_start();
require_once __DIR__ . "/../libraries/Database.php";
require_once __DIR__ . "/../libraries/Function.php";
$db = new Database;
define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");
$category = $db->fetchAll("category");

$sqlnew = "SELECT * FROM product WHERE 1 ORDER BY id ASC LIMIT 8";


$sqlhot = "SELECT * FROM product WHERE hotitem = 1 ORDER BY id ASC LIMIT 8";
$ProcHot = $db ->fetchsql($sqlhot);
$ProcNew = $db -> fetchsql($sqlnew);
$ProcAll = $db -> fetchAll("product");

?>