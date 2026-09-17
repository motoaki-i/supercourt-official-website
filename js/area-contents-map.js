var pref_img_pc_array = new Array(6);
var pref_img_alt_pc = new Array(6);
var mapimg_sp = new Array(6);
var area_list = ["hyougo", "kyoto", "nara", "osaka-kita", "osaka-minami"];
var area_alt_list = ["兵庫", "京都", "奈良", "大阪北", "大阪南"];
var imageMap_text = "area-contents__map-img-text";
var pref_img_pc = $(".area-contents__pref-img");
var pref_img_sp = $(".area-contents__map-box-sp");
var to_detail_btn = $("#to-detail-btn");
var back_btn = $("#back-btn");
var detail_map = $(".area-contents__detail-map");
var detail_map_pref = $(".map-up__pref");
var top_area_map = $(".area-contents__map");
var facility_item_box = ".area-contents__facility-item";
var $brown = "#9f8039";
var $white = "#fff";

date = new Date();
var $update_time = date.getTime();

$.each(area_list, function (index, value) {
  pref_img_pc_array[
    index
  ] = `/img/top/${value}_area.png?${$update_time}`;
  mapimg_sp[
    index
  ] = `/img/top/${value}_area-sp.png?${$update_time}`;
});

$.each(area_alt_list, function (index, value) {
  pref_img_alt_pc[index] = value;
});

function imageMap_click_pc(click_scope, area_name, area_num) {
  $(click_scope).on("click", function () {
    after_map_click(area_name);
    pref_img_pc.attr("src", pref_img_pc_array[area_num]);
    pref_img_pc.attr("alt", pref_img_alt_pc[area_num]);
  });
}
$.each(area_list, function (index, value) {
  imageMap_click_pc(`.up.${value}`, value, index);
  imageMap_click_pc(`.${imageMap_text}.--pc.--${value}`, value, index);
});

function imageMap_click_sp(click_scope, area_name, area_num) {
  $(click_scope).on("click", function () {
    after_map_click(area_name);
    pref_img_sp.attr("src", mapimg_sp[area_num]);
    $(".area-contents__area-button").removeClass("--active");
    $(`.area-contents__area-button.--${area_name}`).addClass("--active");
  });
}
$.each(area_list, function (index, value) {
  imageMap_click_sp(`.area-contents__map-sp .${value}`, value, index);
  imageMap_click_sp(`.${imageMap_text}.--sp.--${value}`, value, index);
  imageMap_click_sp(`.area-contents__area-button.--${value}`, value, index);
});

function after_map_click(area_name) {
  $(`.${imageMap_text}`).css("color", $brown);
  $(`.${imageMap_text}.--${area_name}`).css("color", $white);
  to_detail_btn.attr("data-up-image", `#${area_name}`);
}

detail_map_pref.css("display", "none");

function area_list_display(area) {
  function map_click(triggar) {
    $(triggar).on("click", function (e) {
      $(facility_item_box).css("display", "none");
      $(`.area-contents__facility-item.--${area}`).css("display", "block");
      if (area != "osaka-kita") {
        $(".facility__osaka-kita").css("display", "none");
      }
    });
  }
  map_click(`.area-contents__map-pc .${area}`);
  map_click(`.${imageMap_text}.--${area}`);
  map_click(`.area-contents__map-sp .${area}`);
  map_click(`.area-contents__area-button.--${area}`);
}
$.each(area_list, function (index, value) {
  area_list_display(value);
});

to_detail_btn.on("click", function () {
  top_area_map.css("display", "none");
  detail_map_pref.css("display", "none");
  detail_map.css("display", "block");
  var up_area = $(this).attr("data-up-image");
  console.log(up_area);
  $(up_area).css("display", "block");
});

$(".area-contents__area-button").on("click", function () {
  detail_map_pref.css("display", "none");
  var up_area = $(this).attr("data-up-image");
  $(up_area).css("display", "block");
});

back_btn.on("click", function () {
  detail_map.css("display", "none");
  detail_map_pref.css("display", "none");
  top_area_map.css("display", "block");
});
