<?php
//Get gallery data based on name, and return JSON array
$name = $_POST['name'];
$STH = new StatementHandler($PDO);
$r = $STH->get('gallery', '*', array('name' => $name), array('name', '=', ':name'))->getResults();
echo json_encode($r[0]);
?>