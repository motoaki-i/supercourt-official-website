var view = function(){
var innerWidth = window.innerWidth;
    if(innerWidth > 767){
		return 'pc';
	}else{
		return 'sp';
	}
}



/* -----------------------------------
　電話番号の制御
----------------------------------- */
$(window).load(function(){
	 $('a[href^="tel:"]').on('click', function(e) {
		if(view() == 'pc'){
			e.preventDefault();
		}
	});
});


/* -----------------------------------
　object-fitのIE11対応
----------------------------------- */
$(function(){
	if($('.ofi').length > 0){
		objectFitImages('.ofi');
	}
});


/* -----------------------------------
　初回ロード時のtransition効果を切る
----------------------------------- */
$(window).ready(function(){
    $("body").addClass("preload");
});

$(window).on('load' , function() {
    $("body").removeClass("preload");
});


/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　■ANCHOR
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
$(window).load(function(){
  //URLのハッシュ値を取得
  var urlHash = location.hash;
  //ハッシュ値があればページ内スクロール
  if(urlHash) {
    //スクロールを0に戻す
    $('body,html').stop().scrollTop(0);
    setTimeout(function () {
      //ロード時の処理を待ち、時間差でスクロール実行
      scrollToAnker(urlHash) ;
    }, 100);
  }

  //通常のクリック時
    $('a:not(".fancybox")').click(function() {
    //ページ内リンク先を取得
    var href= $(this).attr("href");
		if(href.indexOf('#') > -1){
			href = '#' + href.split('#').pop();
			//スクロール実行
            //scrollToAnker(href, $(this).parents('nav').attr('class'));
            scrollToAnker(href, $('.anchor').attr('class'));
			//リンク無効化
			return false;
		}
  });

  // 関数：スムーススクロール
  // 指定したアンカー(#ID)へアニメーションでスクロール
  function scrollToAnker(hash, obj) {
    var target = $(hash);
		var position = target.offset().top;
		var gap = 0;

		if(obj == 'anchor'){
			if(view() == 'sp'){
				if($('#nav_wrap').hasClass('fix')){
					gap = $('#nav_wrap .hd').innerHeight();
				}else{
					gap = $('#nav_wrap').innerHeight();
				}
			}
		}
		position = position - gap;
    
    $('body,html').stop().animate({scrollTop:position}, 500);
  }
    
})