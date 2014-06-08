<?php

//Call from the DB gallery and photo information
$photo = apc_fetch('p');
$gallery = apc_fetch('g');
$STH = new StatementHandler($PDO);

//PHOTO
//Select id based on filenames
foreach($photo['filename'] as $index => $filename){
    $dump = $STH->get('photo_lookup', array('photo_id'), array('filename' => $filename), array('filename', '=', ':filename'))->getResults()
    $ph_ids[] = $dump[0];
}
$dump = null;
//Select meta based on ids from previous query
foreach($ph_ids as $index => $id){
    $dump = $STH->get('photo_meta', '*', array('photo_id' => $id), array('photo_id', '=', 'photo_id'))->getResults();
    $ph_js[$id] = $dump[0]; //ph_js has all the data, including photo id
}
//GALLERY
//Select * based on gallery name
$dump = $STH->get('gallery', '*', array('name' => $gallery['gallery']), array('name', '=', ':name'))->getResults();
$g = $dump[0];
$dump = null;

require_once 'lib/init.php';
$t = new Template('Edit', array('main'), 'edit_form.html', array('edit'));
require_once 'lib/template/template.php'
?>