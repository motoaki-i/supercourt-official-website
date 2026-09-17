var mapimg_pc = new Array(6);
var mapimg_sp = new Array(6);
var area_list = ["hyougo", "kyoto", "nara", "osaka-kita", "osaka-minami"];
var imageMap_text = $(".up-img__area-text");
var map_img = $(".up-img img");
var to_detail_btn = $("#to-detail-btn");
var back_btn = $("#back-btn");
var detail_map = $(".map-up");
var detail_map_pref = $(".map-up__pref");
var top_area_map = $(".top-area-map");
var $brown = "#9f8039";
var $white = "#fff";

date = new Date();
var $update_time = date.getTime();

$.each(area_list, function (index, value) {
  mapimg_pc[index] = `img/top/${value}_area.png?${$update_time}`;
  mapimg_sp[index] = `img/top/${value}_area-sp.png?${$update_time}`;
});

function imageMap_click_pc(click_scope, area_name, area_num) {
  $(click_scope).on("click", function () {
    imageMap_click_common(area_name);
    map_img.attr("src", mapimg_pc[area_num]);
  });
}
$.each(area_list, function (index, value) {
  imageMap_click_pc(`.top-area-img-pc .${value}`, value, index);
  imageMap_click_pc(`.up-img__area-text.--pc.--${value}`, value, index);
});

function imageMap_click_sp(click_scope, area_name, area_num) {
  $(click_scope).on("click", function () {
    imageMap_click_common(area_name);
    map_img.attr("src", mapimg_sp[area_num]);
  });
}
$.each(area_list, function (index, value) {
  imageMap_click_sp(`.top-area-img-sp .${value}`, value, index);
  imageMap_click_sp(`.up-img__area-text.--sp.--${value}`, value, index);
});

function imageMap_click_common(area_name) {
  $(".up-img__area-text").css("color", $brown);
  $(`.up-img__area-text.--${area_name}`).css("color", $white);
  to_detail_btn.attr("data-up-image", `#${area_name}`);
}

$(".map-up li").css("display", "none");

function area_list_display(area) {
  function map_click(triggar) {
    $(triggar).on("click", function (e) {
      $(`.facility__item`).css("display", "none");
      $(`.facility__${area}`).css("display", "block");
      if (area != "osaka-kita") {
        $(".facility__osaka-kita").css("display", "none");
      }
    });
  }
  map_click(`.map .${area}`);
  map_click(`.up-img__area-text.--${area}`);
}
$.each(area_list, function (index, value) {
  area_list_display(value);
});

to_detail_btn.on("click", function () {
  top_area_map.css("display", "none");
  detail_map.css("display", "block");
  var up_area = $(this).attr("data-up-image");
  console.log(up_area);
  $(up_area).css("display", "block");
});

back_btn.on("click", function () {
  detail_map.css("display", "none");
  detail_map_pref.css("display", "none");
  top_area_map.css("display", "block");
});
