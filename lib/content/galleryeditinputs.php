<?php
$gallery = json_decode(Input::get('gallery'));
?>
<form id="gallery" action="loading" method="POST">
    <div class="gallery">
        <input type="text" name="gallery_name" maxlength="20" value="<?=Input::get('gallery')?>">
        <input type="textarea" name="gallery_desc" value="<?=Input::get('desc')?>">
        <input type="submit" value="Update Gallery">
    </div>
    <input type="hidden" name="action" value="updateGallery">
</form>

