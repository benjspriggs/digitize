<form id="photo" action="" method="POST">
    <h3 id="title"><?=$photo['title']?></h3>
    <div class="photo">
        <input type="text" name="title" id="title" maxlength="100" placeholder="Photo title" value="<?=$photo['title']?>">
        <input type="textarea" name="photo_desc" id="photo_desc" placeholder="Description" value="<?=$photo['desc']?>">
        <input type="date" name="datetaken" id="datetaken" placeholder="Date taken" value="<?=$photo['datetaken']?>">
        <input type="text" name="subjects" id="subjects" placeholder="People in the photo" value="<?=$photo['subjects']?>">
        <input type="submit" name="update_photo" id="update_photo" value="Update Photo">
    </div>
    <input type="hidden" name="action" value="updatePhoto">
    <div id="preview">
        <img src="<?='uploads/'.htmlspecialchars($g['name'])."/".$photo['filename']?>">
    </div>
</form>