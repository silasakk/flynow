(function( $ ) {
    'use strict';
	$('#add-spec').on("click",function(){
		var content = $('#tb-product-spec tr').eq(1).clone();
		$(content).find('.field').val("");
		$(content).find('.value').val("");

		$("#tb-product-spec.form-table").append(content);
	});
	$('body').on('click','.del-spec',function() {
			var index = $(".del-spec").index(this);
            var val_field = $(this).parent().parent().find('.field').val();
		    var val_value = $(this).parent().parent().find('.value').val();
		    var data =  {  key : val_field , value : val_value };
		    if(val_field=="" && val_value == "" && index == 0){
				return false;
			}
		    $.ajax({
		        url: ajaxurl,
		        data: {
		            'action':'del_spec',
		            'data' : data,
		            'post_id' : $("#product-gallery-image-container").attr("data-post-id")
		        },
		        success:function(data) {
		            // This outputs the result of the ajax request
		            
		            
		        },
		        error: function(errorThrown){
		            console.log(errorThrown);
		        }
		    });  

		    $(this).parent().parent().remove();

    });
})( jQuery );