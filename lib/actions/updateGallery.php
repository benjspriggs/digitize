<?php
//This script submits changes for individual photos, handles responsibilities for renaming, re-meta-ing etc
//Available from the edit array:
//Filenames (with numeric key in order of upload), and gallery name
$STH = new StatementHandler($PDO);
$gallery = apc_fetch('g'); //Gallery info to be updated

//Take array of submitted values, add them to database, return TRUE
?>