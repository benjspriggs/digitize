<?php
require_once 'lib/init.php';
if (Session::exists(Config::get('session/session_name')) && Session::get('username')){
    $t = new Template('Home', array('main'), 'upload_form.php');
    require_once 'lib/template/template.php';
} else {
    $t = new Template('Sign In', array('main', 'form'), 'login_form.php');
    require_once 'lib/template/template.php';
}

?>