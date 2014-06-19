<?php
//Get photo data based on ID, and return JSON array
$photo_id = $_POST['id'];
$STH = new StatementHandler($PDO);
$r = $STH->get('photo_meta', '*',
               array('photo_id' => $photo_id),
               array('photo_id', '=', ':photo_id'))->getResults();
echo json_encode($r[0]);
?>