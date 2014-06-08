<?php
$photo = json_decode(Input::get('photo'));
?>
<form id="photo" action="" method="POST">
    <div class="photo">
        <input type="text" name="title" maxlength="100" value="<?=$photo['title'];?>">
        <input type="textarea" name="photo_desc" value="<?=$photo['desc']?>">
        <input type="date" name="datetaken" value="<?=$photo['datetaken']?>">
        <input type="text" name="subjects" value="<?=$photo['subjects']?>">
        <input type="submit" name="update_photo" value="Update Photo">
    </div>
    <input type="hidden" name="action" value="updatePhoto">
</form>