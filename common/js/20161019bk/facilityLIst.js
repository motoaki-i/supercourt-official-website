$(function(){
	var fl = $('.facilityList');
	fl.find('h3').on('click', function(){
		$(this).next().slideToggle();
	})
})