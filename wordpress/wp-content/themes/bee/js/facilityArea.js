$(function(){
	var map = $('.facilityArea__map');
	map_all = map.find('map[name="MAP0"] area').on('click', function(){
		var x = $(this).attr('href').substr(1);
		map.find('.map_' + x).css('z-index','2').siblings().css('z-index','1');
		map.find('.map_close').show();
	});
	$('.map_close').on('click', function(){
		map.find('.map_all').css('z-index','2').siblings().css('z-index','1');
		$(this).hide();
	})
})