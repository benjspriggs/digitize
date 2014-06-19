$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$(document).ready(function(){
    var photoArray;
    var galleryArray;
    
    photoArray = <?php echo json_encode($ph_js); ?>;
    galleryArray = <?php echo json_encode($g); ?>;
    
    gallery = "gallery=" + JSON.stringify(galleryArray);
    
    $('#form').load('lib/content/galleryeditinputs.php', gallery, function(){ //Load the gallery inputs. If that's successful;
        $.each(photoArray, function( index, value ){ //For each photo, associate a photoInfo object with the photo's info
            
            var photoInfo = {index: value}; //index is the DB photo id, value is array associated with that photo
            photo = "photo=" + JSON.stringify(photoInfo);
            
            $('#form').load('lib/content/photoeditinputs.php', photo, function(){ //Pass string of JSON to PHP
                $('#photo').submit(function( event )
                {
                    event.preventDefault();
                    //Send the data to loading
                    var photodata = "photodata=" + JSON.stringify($('#photo').serializeObject());
                    $.load('lib/actions/updatePhoto.php', photodata, function(){
                        console.log('Updated file!');
                    });
                });
            });
        }); //End of each loop
    });

    
    
});