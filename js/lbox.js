/*------------------------------------------
	ライトボックス
-------------------------------------------*/
$(function(){

	//開く処理
	$('.lbox').on('click',function(e) {
		e.preventDefault();
			$('#lbox').fadeIn().find('.lbox-inr').prepend('<div class="lbox-movie"><iframe src="' + this.href + '" scrolling="no"></iframe></div>');
			$('#clickable, #close_btn').fadeIn(800);
			$('.lbox-inr').fadeIn(function(){
				$('#lbox-close').animate({'opacity':'1'},1000);
			})
	});

	//閉じる処理
	$('#clickable, #lbox-close').on('click',function(e) {
		e.preventDefault();
		$('#lbox').fadeOut('normal', function() {
			$('#lbox-close').animate({'opacity':'0'},600);
			$('#clickable').fadeOut(800);
			$('.lbox-movie').remove();
		});
	});
});
