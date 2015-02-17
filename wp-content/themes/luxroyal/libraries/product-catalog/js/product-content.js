(function( $ ) {
    'use strict';

    function renderMediaUploader(ele) {

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
                
                $(ele).parent().find('img').remove();
                $(ele).parent().find('input').remove(); 
                
                var img = $('<img  height="70"/>').attr({ src: this.url, alt: this.caption , title :  this.title });
                var t_src = $('<input/>').attr({ type: 'hidden', name: 'product_hl_src[]' , value : this.url });
                var t_alt = $('<input/>').attr({ type: 'hidden', name: 'product_hl_alt[]' , value : this.caption });
                var t_title = $('<input/>').attr({ type: 'hidden', name: 'product_hl_title[]' , value : this.title });
                
                $(ele).parent().find("img").remove();
                $(ele).parent().append(
                   
                    $(img).prop('outerHTML')+
                    $(t_src).prop('outerHTML')+
                    $(t_alt).prop('outerHTML')+
                    $(t_title).prop('outerHTML'));

            });
           

        });


        file_frame.open();

    }


	$('#add_hl').on("click",function(){
		var content = $('#tb-product-hl tr').eq(1).clone();
		$(content).find('input').val("");
		$(content).find('textarea').val("");
        $(content).find('img').remove();
        $(content).find('hidden').remove();
		$("#tb-product-hl.form-table").append(content);
	});
	$("body").on("click",".del-hl",function(){
		

		if($('#tb-product-hl tr').length > 2){
			$(this).parent().parent().remove();

		}else{
			$(this).parent().parent().find('input').val("");
			$(this).parent().parent().find('textarea').val("");
		}

        var data =  $('#tb-product-hl input,#tb-product-hl textarea').serialize();

        $.ajax({
            url: ajaxurl,
            data: {
                'action':'del_hl',
                'data' : data,
                'post_id' : $("#product-gallery-image-container").attr("data-post-id")
            },
            success:function(data) {
                // This outputs the result of the ajax request
                console.log(data);
                
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        }) ;
	});
    var mouseX = 0, mouseY = 0;
    

    $(document).mousemove(function(e){
        mouseX = e.pageX;
        mouseY = e.pageY;    
    });

    $("#tb-product-hl").tableDnD({
        onDragClass: "mydrag"
    });
	$( 'body' ).on( 'click','.set-imgage-hl', function( evt ) {

        evt.preventDefault();

        renderMediaUploader($(this));

    });

})( jQuery );