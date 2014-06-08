<?php
require 'lib/init.php';

if(Input::exists('post')){
    if(Token::check(Input::get('token'))){
        switch(Input::get('action')){
        case('addPhotos'):
            require_once('lib/actions/addPhotos.php');
            break;
        case('editPhotos'):
            require_once('lib/actions/editPhotos.php');
            break;
        case('logIn'):
            require_once('lib/action/logIn.php');
            break;
        case('registerUser'):
            require_once('lib/actions/registerUser.php');
            break;
        case('verifyUser'):
            require_once('lib/actions/verifyUser.php');
            break;
        }
        
        echo "<a href=\"index.php\">Index</a>";
    } else {
        echo "CSRF test failed - try refreshing and uploading again.<br>";
        echo "<a href=\"index.php\">Index</a>";
    }
} else {
    header("Location: index.php");
}

?>