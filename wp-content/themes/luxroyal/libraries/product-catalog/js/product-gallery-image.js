


(function( $ ) {
    'use strict';
    
    function renderMediaUploader() {
        'use strict';

        var file_frame, image_data;

        if ( undefined !== file_frame ) {

            file_frame.open();
            return;

        }

        file_frame = wp.media.frames.file_frame = wp.media({
            frame:    'post',
            state:    'insert',
            multiple: true
        });


        file_frame.on( 'insert', function() {

            // Read the JSON data returned from the Media Uploader
            var result = file_frame.state().get( 'selection' ).toJSON();    
            
            $(result).each(function(){
                // First, make sure that we have the URL of an image to display
                if ( 0 > $.trim( this.url.length ) ) {
                    return;
                }
                
                
                var img = $('<img />').attr({ src: this.url, alt: this.caption , title :  this.title });
                var t_src = $('<input/>').attr({ type: 'hidden', name: 'product_gallery_src[]' , value : this.url });
                var t_alt = $('<input/>').attr({ type: 'hidden', name: 'product_gallery_alt[]' , value : this.caption });
                var t_title = $('<input/>').attr({ type: 'hidden', name: 'product_gallery_title[]' , value : this.title });
                
                $( '#product-gallery-image-container').append(
                    '<li>'+
                    '<a href="javascript:;" class="rm-thumbnail">Delete</a>'+
                    $(img).prop('outerHTML')+
                    $(t_src).prop('outerHTML')+
                    $(t_alt).prop('outerHTML')+
                    $(t_title).prop('outerHTML')+
                    '</li>');

            })
            
            $('#product-gallery-image-container img').centerImage();
            $('#product-gallery-image-container').removeClass( 'hidden' );
            
            

        });


        file_frame.open();

    }
    
    function resetUploadForm( t ) {
        'use strict';
        var val_src = $(t).parent().find('input').eq(0).val();
        var val_alt = $(t).parent().find('input').eq(1).val();
        var val_title = $(t).parent().find('input').eq(2).val();
        //$(t).parent().remove();
        
        var data =  {  key : ['src','alt','title'] , value : [val_src,val_alt,val_title] };
        
        // We'll pass this variable to the PHP function example_ajax_request
        //var fruit = 'Banana';

        // This does the ajax request
        $.ajax({
            url: ajaxurl,
            data: {
                'action':'example_ajax_request',
                'data' : data,
                'post_id' : $("#product-gallery-image-container").attr("data-post-id")
            },
            success:function(data) {
                // This outputs the result of the ajax request
                console.log(data);
                $(t).parent().remove();
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });  
        

    }

    $(function() {
        
        $('#product-gallery-image-container img').centerImage();
        $('#product-gallery-image-container').removeClass("hidden");
        $( '#set-product-gallery-image' ).on( 'click', function( evt ) {

            
            evt.preventDefault();

            renderMediaUploader();

        });
        $( 'body' ).on( 'click', '.rm-thumbnail' , function( evt ) {

            // Stop the anchor's default behavior
            evt.preventDefault();

            // Remove the image, toggle the anchors
            resetUploadForm(  $(this) );

        });

    });
    

})( jQuery );