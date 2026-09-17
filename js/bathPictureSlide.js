/**
 * お風呂・温泉ページ スライドショー
 */
$(function(){
    $('.bath-slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true,
        arrows: false,
    });
});