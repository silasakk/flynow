
$(function(){
	$('.menu-mobile').on('click',function(){
		$('.menu').toggleClass('active');
	});

	$('.content .news-list li.col-4').each(function(){
		var h = $(this).innerHeight();
		$(this).find("img").css({"height":h});
	});

	$(".image-feature img").imgCentering({"forceWidth":true});
	

    $('.faq-list a').on('click',function(){
        $('.faq-list li').each(function(){
            $(this).find('.num-list').removeClass('active');
            
        });
        $('.list-well').hide();
        $(this).find('.num-list').addClass('active');
        $(this).parent().parent().find('.list-well').show();
    })
})
var app = angular.module('app',[]);

app.controller('TabController', ['$scope', function($scope) {
   
}]);

