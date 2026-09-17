

//Logicad cv tag
(function(s,m,n,l,o,g,i,c,a,d){c=(s[o]||(s[o]={}))[g]||(s[o][g]={});if(c[i])return;c[i]=function(){(c[i+"_queue"]||(c[i+"_queue"]=[])).push(arguments)};a=m.createElement(n);a.charset="utf-8";a.async=true;a.src=l;d=m.getElementsByTagName(n)[0];d.parentNode.insertBefore(a,d)})(window,document,"script","https://cd.ladsp.com/script/conv2.js","Smn","Logicad","conv");

$(function(){
	var subMenu = $('.global--sub');
	var dropMenu = $('.global--service, .global--sub .container')
	dropMenu.on('mouseover', function(){
		subMenu.stop(true,false).slideDown();
		dropMenu.on('mouseleave', function(){
			subMenu.stop(true,false).slideUp();
		})
	})
	var sidemenu = $('.side--menu');
	var current = $('body').data('current');
	sidemenu.find('h3').on('click', function(){
		$(this).next().toggleClass('side--menu--open');
	})
	sidemenu.find('#side--' + current).addClass('current');

	//スクロール時ヘッダーサイズ変更と、ページトップへ戻るボタン出現
	var elScroll = 0;
	var closeLine = 300;
	var header = $('.fixed__header');
	var go2top = $('.go2top');
	$(window).on('scroll', function(){
		elScroll = $(window).scrollTop();
		if(closeLine < elScroll) {
			header.addClass('fixed__header--min');
			go2top.fadeIn();
		} else {
			header.removeClass('fixed__header--min');
			go2top.fadeOut();
		}
	})
})

$(function(){
	var device = navigator.userAgent;
	if((device.indexOf('iPhone') > 0 && device.indexOf('iPad') == -1) || device.indexOf('iPod') > 0 || device.indexOf('Android') > 0){
		$(".tel").wrap('<a href="tel:0120784850"></a>');
	}
});


function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}

function faviconizeFavilist() { 
  if (!document.getElementsByTagName) return false;
  if (!document.createElement) return false;
  var ul = document.getElementsByTagName("ul");
  for (var i=0; i<ul.length; i++) {
  	if (ul[i].className == "favilist") {
  		var links = ul[i].getElementsByTagName("a");
  		for (var j=0; j<links.length; j++) {
  			var hoststring = /^https:/;
  			var hrefvalue = links[j].getAttribute("href",2);
			if (hrefvalue.search(hoststring) != -1) {
				var domain = hrefvalue.match(/(\w+):\/\/([^/:]+)(:\d*)?([^# ]*)/);
				domain = RegExp.$2;
				var cue = document.createElement("img");
				cue.className = "faviconimg";
				var cuesrc = "https://"+domain+"/favicon.ico";
				cue.setAttribute("src",cuesrc);
				cue.onerror = function () {
					this.src = "https://www.supercourt.jp/favicon.ico";
					}
				links[j].parentNode.insertBefore(cue,links[j]);
			}
		}
  	}
  }
}
addLoadEvent(faviconizeFavilist);