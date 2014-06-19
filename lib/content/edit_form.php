<div id="gallery">
    <?php
    $g = Session::get('g');
    require_once('lib/content/gallery_edit_form.php');
    ?>
</div>
<div id="photo">
    <?php
    $p = Session::get('p');
    var_dump($p);
    $STH = new StatementHandler($PDO);
    foreach($p['id'] as $index => $id){
        $r = $STH->get('photo_meta', '*', array('photo_id' => $id), array('photo_id', '=', ':photo_id'))->getResults();
        $photo['filename'] = $p['filename'][$index];
        $photo['title'] = $r[0]['title'];
        $photo['desc'] = $r[0]['desc'];
        $photo['datetaken'] = $r[0]['datetaken'];
        $photo['subjects'] = $r[0]['subjects'];
        include_once('lib/content/photo_edit_form.php');
    }
    
    ?>
</div>
<div id="remaining">
    <?php
    echo "Editing photos:";
    foreach($p['filename'] as $index => $name){
        echo "$name with ID of ". $p['id'][$index] ." ";
    }
    echo ".<br>";
    echo "<div id=\"p_json\" style=\"display: none\" data-json=\"";
    echo htmlspecialchars(json_encode($p));
    //echo the p json
    echo "\"></div>";
    echo "<div id=\"g_json\" style=\"display: none\" data-json=\"";
    echo htmlspecialchars(json_encode($g));
    //echo the g json
    echo "\"></div>";
    ?>
</div><!--Destroy the session data once it's been dealt with, in the updatePhoto or updateGallery file-->