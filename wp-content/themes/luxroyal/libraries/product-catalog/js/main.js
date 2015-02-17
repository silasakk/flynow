var tgm_media_frame;

$(function(){
    $('.upload-images').click(function() {

        if ( tgm_media_frame ) {
            tgm_media_frame.open();
            return;
        }

        tgm_media_frame = wp.media.frames.tgm_media_frame = wp.media({
            multiple: true,
            title:      'Insert Product Gallery',
            library: {
                type: 'image'
            },
        });

        tgm_media_frame.on('select', function(){
            var selection = tgm_media_frame.state().get('selection');
            selection.map( function( attachment ) {

                attachment = attachment.toJSON();

                $(attachment).each(function( index,data ) {  
                    $('.content-gallery-admin').append('<li style="height:150px;width:150px;"><img width="50" src="'+data.url+'"   /></li>');

                });
                $('.content-gallery-admin img').centerImage();

            });
        });

        tgm_media_frame.open();


    });
})