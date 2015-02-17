$(".blog-list img").unveil(200, function() {
  $(this).load(function() {
  	var _width = $(this).parents('.thumbnal').outerWidth();
  	var _height = $(this).parents('.thumbnal').outerHeight();
  	
  	var img_height = $(this).height();
  	var img_width = $(this).width();
  	
  	if(img_height > _height){
	  	var sub_height = (img_height-_height)/2;
	  	$(this).css({'top':-sub_height});		  
  	}else{

	  	$(this).css({'height':'100%','width':'auto','max-width':'none'});
  		var sub_width = ($(this).width() - _width)/2;
  		
  		$(this).css({'left':-sub_width});
  	}
  	
    this.style.opacity = 1;
  });
});