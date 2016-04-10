<?php
function db_open()
{
10
 try {
 $db = new PDO('sqlite:db/database.sqlite');
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
 die("Error: " . $e->getMessage());
 }
return $db;
}