$(function(){
	var zoom_gal = $('.popup-zoom').magnificPopup({ 
	  type: 'image',
	  preloader: true,
	  gallery: {
        enabled: true,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        navigateByImgClick: false,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      zoom: {
        enabled: true,
        duration: 300, // don't foget to change the duration also in CSS
        opener: function(element) {
          return element.find('img');
        }
      }
	});
	
	var popup = $('.popup').magnificPopup({ 
	  type: 'image',
	  preloader: true,
	});
	
	var popup = $('.popup-gallery').magnificPopup({ 
	  type: 'image',
	  preloader: true,
	  gallery: {
        enabled: true,        
        navigateByImgClick: false,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      }
	});
	
	
	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
     	 disableOn: 700,
     	 type: 'iframe',
     	 mainClass: 'mfp-fade',
     	 removalDelay: 160,
     	 preloader: false,
     	 fixedContentPos: false
    });

});

