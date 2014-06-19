<form id="gallery" action="" method="POST">
    <h2 id="name"><?=$g['name']?></h2>
    <div class="gallery">
        <input type="text" name="gallery_name" maxlength="20" placeholder="Gallery name" value="<?=$g['name']?>">
        <input type="textarea" name="gallery_desc" placeholder="Gallery description" value="<?php if(isset($g['desc'])){echo $g['desc'];}?>">
        <input type="submit" value="Update Gallery">
    </div>
    <input type="hidden" name="action" value="updateGallery">
</form>

