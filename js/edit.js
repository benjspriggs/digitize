function getPhoto ( id ){
    var dfd = new jQuery.Deferred();
}
    
function getGallery ( name ){
    
}

$(document).ready(function(){
    var gallery = $('div#gallery');
    var photo = $('div#photo');
    var g_json = $('#g_json').attr('data-json');
    g = jQuery.parseJSON(g_json);
    var p_json = $('#p_json').attr('data-json');
    p = jQuery.parseJSON(p_json);
    
    gallery.empty().load('lib/content/gallery_edit_form.php', function(){
        console.log('Gallery inputs loaded.');
        g_r = {"name":g.name,"action":"getGallery"};
        $.post('json.php', g_r, function( data ){
            console.log(data);
            gallInfo = jQuery.parseJSON(data);
            $('#name').html(gallInfo.name);
            $('input#name').val(gallInfo.name);
            $('input#gallery_desc').val(gallInfo.desc);
            gallery.submit( function( event ){
                event.preventDefault();
                alert('Gallery updated.');
            });
        });

        
        photo.empty().load('lib/content/photo_edit_form.php', function(){
            var c = 0;
            console.log('Photo input loaded.');
            p_r = {"id":p.id[c],"action":"getPhoto"};
            $.post('json.php', p_r, function( data ){
                var photoInfo = jQuery.parseJSON(data);
                $('#title').html(photoInfo.title);
                $('input#title').val(photoInfo.title);
                $('input#photo_desc').val(photoInfo.desc);
                $('input#datetaken').val(photoInfo.datetaken);
                $('input#subjects').val(photoInfo.subjects);
                $('#preview img').attr('src', g.name + "/" + p.filename);
            });
            //Begin ieteration
            //After a form has been sumitted, load the next photo, continue until done with the array
            photo.submit( function( event ){
                event.preventDefault();
                //Upload, go to next photo:
                var pod = $('form#photo').serialize();
                $.post('json.php', pod, function(data){
                    //The information was submitted
                    console.log(data);
                });
                c++;
                p_r = {"id":p.id[c],"action":"getPhoto"};
                $.post('json.php', p_r, function( data ){
                    var photoInfo = jQuery.parseJSON(data);
                    $('#title').html(photoInfo.title);
                    $('input#title').val(photoInfo.title);
                    $('input#photo_desc').val(photoInfo.desc);
                    $('input#datetaken').val(photoInfo.datetaken);
                    $('input#subjects').val(photoInfo.subjects);
                });
            });
        });
    });
    
});