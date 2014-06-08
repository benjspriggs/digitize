<?php
$GLOBALS['config'] = array(
                'session' => array(
                                'session_name' => 'user',
                                'token_name' => 'csrf',
                                'username' => 'username'),
                'remember' => array(
                                'cookie_name' => 'key',
                                'cookie_expiry' => 608400),
                'hash' => array(
                                'pepper' => '64aasddk-0412f1db5ab1be9eb4yawehb8720'),
                'mail' => array(
                                'verify_from' => 'emailaddress@domain.com'),
                'root' => array(
                                'app' => $_SERVER['DOCUMENT_ROOT']. '/lib/',
                                'uploads' => $_SERVER['DOCUMENT_ROOT']. '/uploads/'));
?>