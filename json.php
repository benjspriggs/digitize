<?php
require_once 'lib/init.php';
if(Input::exists('post')){
    switch(Input::get('action')){
        case('getPhoto'):
            require_once 'lib/actions/getPhoto.json.php';
            break;
        case('getGallery'):
            require_once 'lib/actions/getGallery.json.php';
            break;
        case('updatePhoto'):
            require_once 'lib/actions/updatePhoto.json.php';
            break;
    }
} elseif (Input::exists('get')){
    
}
//header("Location: index.php");
?>