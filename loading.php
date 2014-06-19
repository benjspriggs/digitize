<?php
require_once 'lib/init.php';

if (Token::check(Input::get('token'))){
        if (Input::exists('post')){
            switch(Input::get('action')){
            case('addPhotos'):
                require_once('lib/actions/addPhotos.php');
                break;
            case('editPhotos'):
                require_once('lib/actions/editPhotos.php');
                break;
            case('logIn'):
                require_once('lib/actions/logIn.php');
                break;
            case('registerUser'):
                require_once('lib/actions/registerUser.php');
                break;
            }
            echo "<a href=\"index.php\">Index</a>";
            
        } elseif (Input::exists('get')) {
            switch(Input::get('action')){
                case('logOut'):
                    require_once('lib/actions/logOut.php');
                    break;
                case('sendVerification'):
                    require_once('lib/actions/sendVerification.php');
                    break;
            }
            echo "<a href=\"index.php\">Index</a>";
            
        } else {
            header("Location: index.php");
        }
} elseif (Token::check(Input::get('exittoken'))){
    if (Input::exists('get')){
        switch (Input::get('action')){
            case('logOut'):
                require_once('lib/actions/logOut.php');
                break;
        }
        echo "<a href=\"index.php\">Index</a>";
    }
} elseif (Input::get('action') == 'verifyEmail'){
    require_once('lib/actions/verifyEmail.php');
    echo "<a href=\"index.php\">Index</a>";
} else {
    echo "CSRF test failed - try submitting the form again.<br>";
    echo "<a href=\"index.php\">Index</a>";
    }
?>