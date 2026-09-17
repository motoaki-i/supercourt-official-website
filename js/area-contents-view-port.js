$(function () {
  $(window).on("load", function () {
    var w = $(window).width();
    if (w <= 375) {
      $("meta[name=viewport]").attr("content", "width=375");
    } else {
      $("meta[name=viewport]").attr("content", "width=device-width");
    }
  });
});
