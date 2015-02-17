var scripts = document.getElementsByTagName("script");
var url = scripts[scripts.length - 1].src.split("/");
url.pop();
var base = url.join("/");
var head = document.getElementsByTagName("head")[0];

function u_require(url){
	"use strict";
	
	var s_url = url.split(".");
	var length_url = s_url.length-1;
	
	if(s_url[length_url] == 'js'){
		document.write('<' + 'script');
		//document.write(' language="javascript"');
		//document.write(' type="text/javascript"');
		document.write(' src="'+ base + '/' + url + '">');
		document.write('</' + 'script' + '>');
	}else if(s_url[length_url] == 'css'){
		document.write('<' + 'link');
		document.write(' rel="stylesheet"');
		document.write(' href="'+ base + '/' + url + '">');
	}		
	
}


//LOAD PLUGIN
u_require('bootstrap/bootstrap.css');
u_require('font-awesome/font-awesome.min.css');
u_require('flexslider/flexslider.css');
u_require('perfect-scrollbar/perfect-scrollbar.css');

u_require('jquery/jquery.min.js');
u_require('bootstrap/bootstrap.min.js');
u_require('flexslider/flexslider.js');
u_require('perfect-scrollbar/perfect-scrollbar.js');

