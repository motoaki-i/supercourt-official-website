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

//google analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-25011421-1', 'auto');
  ga('send', 'pageview');

