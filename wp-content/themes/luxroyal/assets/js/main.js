
$(function(){
	$('.menu-mobile').on('click',function(){
		$('.menu').toggleClass('active');
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

