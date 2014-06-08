<?php
$STH = new StatementHandler($PDO);
$user = new User($STH);
$id = $user->getUserID(Session::get(Config::get('session/session_name')));
if($user->isAccepted($id)){
    //Foreach file[] name thing, insert a new row into the SQL server
    $files = Input::get('file');
    $date = date('Y-m-d H:i:s');
    $gallery = htmlspecialchars(Input::get('gallery'));
    $g['gallery'] = $gallery;
    //Compile an array of all the names and info that you'll need for editing
    foreach($files['name'] as $key => $name){
        if($files['error'][$key] == 0){
            if(!scandir(Config::get('root/uploads').$gallery)){
                mkdir(Config::get('root/uploads').$gallery);
            }
            
            if(move_uploaded_file($files['tmp_name'][$key], Config::get('root/uploads').$gallery)){
                $p['filename'][] = $name;
            } else {
                $errors[] = "File $name was not uploaded successfully.<br>";
            }
            
            $n = explode(".", $name);
            
            $data['photo_lookup'][] = array('filename' => $name);
            $data['photo_meta'][] = array('user_id' => $id, 'photo_id' => 'LAST_INSERT_ID()', 'title' => $n[0]);
            $data['gallery_lookup'][] = array('photo_id' => 'LAST_INSERT_ID()');
        }
    }
    $STH->insert(array('photo_lookup', 'photo_meta', 'gallery_lookup'), $data, 'photo_lookup', 'photo_id');
    //Now, for the gallery insert:
    $data = array();
    $data['gallery_lookup'] = array('gallery_id' => 'LAST_INSERT_ID()');
    $data['gallery'] = array('name' => $gallery, 'date' => $date);
    $STH->insert(array('gallery', 'gallery_lookup'), $data, 'gallery', 'gallery_id');
    if($errors){
        foreach($errors as $key => $msg){
            echo $msg."<br>";
        }
    }
    $STH->getErrors();
    apc_store('p', $p);
    apc_store('g', $g);
    //Include the edit form
    echo "<a href=\"edit.php\">Edit gallery $gallery</a>";
} else {
    echo "Your user id has been blacklisted.<br>";
    echo "<a href=\"index.php\">Index</a>";
}

?>