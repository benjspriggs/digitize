<?php
$STH = new StatementHandler($PDO);
$user = new User($STH);
$id = Session::get('uid');

if ($user->isAccepted($id)){
    $p = array();
    $g = array();
    //Foreach file[] name thing, insert a new row into the SQL server
    $files = Input::get('file');
    $postdate = date('Y-m-d H:i:s');
    $gallery = htmlspecialchars(Input::get('gallery'));
    $g['name'] = $gallery;
    //Compile an array of all the names and info that you'll need for editing
    foreach($files['name'] as $key => $name){
        if ($files['error'][$key] == 0){
            $data = array();
            $dir = Config::get('root/uploads') . $gallery;
            
            if (!file_exists($dir)){
                mkdir($dir);
            }
            
            if (move_uploaded_file($files['tmp_name'][$key], $dir .'/'. $name)){
                $p['filename'][] = $name;
                $n = explode(".", $name);
                $p['title'][] = $n[0];
                $data['photo_lookup'][] = array('user_id' => $id, 'filename' => $name);
                $data['photo_meta'][] = array('photo_id' => 'LAST_INSERT_ID()', 'title' => $n[0]);
                
                $STH->insert(array('photo_lookup' => array('user_id', 'filename'),
                           'photo_meta' => array('photo_id', 'title')), $data, 'photo_lookup', 'photo_id');
            } else {
                $errors[] = "File $name was not uploaded successfully.<br>";
            }
        }
    }
    
    //Now, for the gallery insert:
    $data = array();
    $data['gallery'] = array('name' => $gallery, 'postdate' => $postdate); //This table holds the main autoinc key
    //Retrieve all of the photo_ids that were inserted
    foreach($p['title'] as $index => $title){
        $res = $STH->get('photo_meta', array('photo_id'), array('title' => $title), array('title', '=', ':title'))->getResults();
        $p['id'][] = $res[0]['photo_id'];
        $data['gallery_lookup'][] = array('photo_id' => $res[0]['photo_id'], 'gallery_id' => 'LAST_INSERT_ID()');
    }
    
    $STH->insert(array('gallery' => array('name', 'postdate'),
                       'gallery_lookup' => array('photo_id', 'gallery_id')), $data, 'gallery', 'gallery_id');
    
    //Error handling
    if ($errors){
        foreach($errors as $key => $msg){
            echo $msg."<br>";
        }
    }
    $STH->getErrors();
    Session::put('p', $p);
    Session::put('g', $g);
    //Include the edit form
    echo "<a href=\"edit.php\">Edit gallery $gallery</a><br>";
} else {
    echo "Your user id has been blacklisted.<br>";
}

?>