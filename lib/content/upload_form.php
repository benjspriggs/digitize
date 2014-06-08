<h2>Upload photos</h2>
<form action="loading.php" method="POST" enctype="multipart/form-data">
    <div>
        <input type="text" maxlength="40" name="gallery" placeholder="Gallery name" required>
        <!--Add a thing to have the galleries that already have been made to drop down automatically - jQueryUI-->
    </div>
    <div>
        <label for="file[]">Gallery files:</label>
        <input type="file" name="file[]" multiple required>
    </div>
    <input type="submit" value="Upload gallery">
    <input type="hidden" name="action" value="addPhotos">
    <input type="hidden" name="token" value="<?=Token::csrf();?>">
</form>