/*----------------------------------------------------
 for SP・TABLET Style
-----------------------------------------------------*/
var agent = navigator.userAgent;
if (
  agent.search(/iPhone/) != -1 ||
  agent.search(/iPad/) != -1 ||
  agent.search(/iPod/) != -1 ||
  agent.search(/Android/) != -1
) {
  document.write('<link href="/css/ua.css" rel="stylesheet">');
}

$(function () {
  /*-------------------------------
Load / Resize Event
	-------------------------------*/
  var timer = false;
  $(window).on("load resize", function () {
    if (timer !== false) {
      clearTimeout(timer);
    }
    timer = setTimeout(function () {
      var winWidth = window.innerWidth;
      if (winWidth <= 480) {
        $("header").prepend($(".head-logo"));
        $(".rwd").each(function () {
          $(this).attr("src", $(this).data("img").replace("_pc", "_sp"));
        });
      } else {
        $("nav .inner").prepend($(".head-logo"));
        $("body").removeClass("spMode").addClass("pcMode");
        $(".rwd").each(function () {
          $(this).attr("src", $(this).data("img"));
        });
      }
    }, 10);
  });
  $(window).trigger("resize");

  /*-------------------------------
Sticky Header
	-------------------------------*/
  var winWidth = window.innerWidth;
  $(window).scroll(function () {
    if (winWidth >= 481) {
      var navHeight = $(".nav-wrap").offset().top;

      if ($(this).scrollTop() > navHeight) {
        $("nav, h1").addClass("fixed");
      } else {
        $("nav, h1").removeClass("fixed");
      }
    }
  });
  $(window).trigger("scroll");

  /*-------------------------------
megamenu
	-------------------------------*/
  $(".open-m, .megamenu").hover(
    function () {
      $(".megamenu").addClass("open");
      var navHeight = $(".nav-wrap").offset().top;
      if ($(this).scrollTop() > navHeight) {
        $(".head-form").css("z-index", "99");
      } else {
        $(".head-form").css("z-index", "90");
      }
    },
    function () {
      $(".megamenu").removeClass("open");
      $(".head-form").css("z-index", "99");
    }
  );
  $(".open-m, .megamenu").hover(function () {});

  $(".sub-menu").css("display", "none");

    $(".open-m span").on("click", function () {
    console.log("click");
    var winWidth = window.innerWidth;
    if (winWidth <= 480) {
      $(this).toggleClass("open").next("ul").stop(true, true).slideToggle(600);
    }
  });

  /*-------------------------------
	megamenu2
		-------------------------------*/
  $(".open-m2, .megamenu2").hover(
    function () {
      $(".megamenu2").addClass("open");
      var navHeight = $(".nav-wrap").offset().top;
      if ($(this).scrollTop() > navHeight) {
        $(".head-form").css("z-index", "99");
      } else {
        $(".head-form").css("z-index", "90");
      }
    },
    function () {
      $(".megamenu2").removeClass("open");
      $(".head-form").css("z-index", "99");
    }
  );
  $(".open-m2, .megamenu2").hover(function () {});

  $(".sub-menu2").css("display", "none");
  
  $(".open-m2 span").on("click", function () {
    console.log("click");
    var winWidth = window.innerWidth;
    if (winWidth <= 480) {
      $(this).toggleClass("open").next("ul").stop(true, true).slideToggle(600);
    }
  });


    /*-------------------------------
  megamenu3
    -------------------------------*/
  $(".open-m3, .megamenu3").hover(
    function () {
      $(".megamenu3").addClass("open");
      var navHeight = $(".nav-wrap").offset().top;
      if ($(this).scrollTop() > navHeight) {
        $(".head-form").css("z-index", "99");
      } else {
        $(".head-form").css("z-index", "90");
      }
    },
    function () {
      $(".megamenu3").removeClass("open");
      $(".head-form").css("z-index", "99");
    }
  );
  $(".open-m3, .megamenu3").hover(function () {});

  $(".sub-menu3").css("display", "none");
  
  $(".open-m3 span").on("click", function () {
    console.log("click");
    var winWidth = window.innerWidth;
    if (winWidth <= 480) {
      $(this).toggleClass("open").next("ul").stop(true, true).slideToggle(600);
    }
  });


    /*-------------------------------
  megamenu3-2
    -------------------------------*/
  $(".open-m3-2, .megamenu3-2").hover(
    function () {
      $(".megamenu3-2").addClass("open");
      var navHeight = $(".nav-wrap").offset().top;
      if ($(this).scrollTop() > navHeight) {
        $(".head-form").css("z-index", "99");
      } else {
        $(".head-form").css("z-index", "90");
      }
    },
    function () {
      $(".megamenu3-2").removeClass("open");
      $(".head-form").css("z-index", "99");
    }
  );
  $(".open-m3-2, .megamenu3-2").hover(function () {});

  $(".sub-menu3-2").css("display", "none");
  
  $(".open-m3-2 span").on("click", function () {
    console.log("click");
    var winWidth = window.innerWidth;
    if (winWidth <= 480) {
      $(this).toggleClass("open").next("ul").stop(true, true).slideToggle(600);
    }
  });



  /*-------------------------------
Accordion
	-------------------------------*/
  $(".sec04-sp dd").css("display", "none");
  $(".sec04-sp dt").click(function () {
    $(this).toggleClass("open").nextAll().stop(true, true).slideToggle(200);
  });

  /*-------------------------------
Footer for SP
	-------------------------------*/
  $(".foot-nav01 dt").on("click", function () {
    var winWidth = window.innerWidth;
    if (winWidth <= 480) {
      $(this).toggleClass("open").nextAll().stop(true, true).slideToggle();
    } else {
      $(this).off("click");
    }
  });
  $(window).trigger("resize");

  /*-------------------------------
Pagetop Button
	-------------------------------*/
  var $btn = $(".btn-pagetop");
  var isHidden = true;
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      if (isHidden) {
        $btn.stop(true, true).fadeIn();
        isHidden = false;
      }
    } else {
      if (!isHidden) {
        $btn.stop(true, true).fadeOut();
        isHidden = true;
      }
    }
  });


  /*-------------------------------
Menu for SP
	-------------------------------*/
  $("body").after('<div id="menu-bg"><i id="close">CLOSE</i></div>');
  $(".menu a").on("click", function (e) {
    e.preventDefault();
    var winWidth = window.innerWidth;
    if (winWidth <= 480) {
      $("#menu-bg").fadeIn(300);
      $(".menu-wrap").addClass("open");
    } else {
      $(this).off("click");
    }
  });
  $("#close").on("click", function (e) {
    e.preventDefault();
    $(".menu-wrap").removeClass("open");
    $("#menu-bg").delay(200).fadeOut(600);
  });

  /*-------------------------------
Smooth Scroll
	-------------------------------*/
  $("a[href^=#]:not(.sp-menu a)").click(function () {
    var speed = 1000;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top;
    var SPposition = target.offset().top;
    var winWidth = window.innerWidth;
    if (winWidth >= 481) {
      $("html, body").animate(
        { scrollTop: position - 90 },
        speed,
        "easeOutCubic"
      );
    } else {
      $("html, body").animate(
        { scrollTop: SPposition - 54 },
        speed,
        "easeOutCubic"
      );
    }
    return false;
  });


  /*-------------------------------
    read more
  ------------------------------*/
  $(function () {
		const $readMoreBtn = $(".area-desc__btn");
		const minTextHeight = 230;

    if (window.innerWidth > 481) {
      return;
    }

		if ($readMoreBtn) {
			const textHeights = [];

			$readMoreBtn.each((idx, elm) => {
				$text = $(elm).closest(".area-desc__body");
				const height = $text.outerHeight();

				if (height >= minTextHeight) {
					textHeights[idx] = height;
					$text.addClass("is-hide");
					$text.css("height", 200);
				}
			});

			$readMoreBtn.on("click", function () {
				const idx = $(this).index(".area-desc__btn");
				const textHeight = textHeights[idx];
				$(this)
					.closest(".area-desc__body")
					.removeClass("is-hide")
					.animate({ height: textHeight }, 300, "swing", function () {
						$(this).css("height", "");
					});
			});
		}
	});
});

const swiperPc = new Swiper(".swiper-top-awards--pc", {
  loop: true,
  spaceBetween: 20,
  slidesPerView: 4,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

$(function () {
  function next_opacity() {
    $(".swiper-top-awards--pc .swiper-slide-next")
      .next()
      .next()
      .next()
      .css("opacity", "0.5");
  }
  next_opacity();

  function btn_click_opacity(btn) {
    $(btn).on("click", function () {
      $(".swiper-slide").css("opacity", "");
      next_opacity();
    });
  }
  btn_click_opacity(".swiper-button-next");
  btn_click_opacity(".swiper-button-prev");
});

const swiperSp = new Swiper(".swiper-top-awards--sp", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 15,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});