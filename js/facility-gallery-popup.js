$(function () {
	const $gallery = $(".facility .facilityGallery");
	const $item = $(".facility .facilityGallery li");

	$gallery.prepend(
		'<link rel="stylesheet" href="/css/facility-gallery-popup.css" />'
	);

	const $modal = $(`
		<div class="facility-popup-modal">
			<div class="facility-popup-modal__container">
				<div class="facility-popup-modal__bg"></div>
				<div class="facility-popup-modal__content">
					<div class="facility-popup-modal__img">
						<img src="" alt="" loading="lazy">
					</div>
					<p class="facility-popup-modal__caption"></p>
					<button class="facility-popup-modal__close-button"></button>
				</div>
			</div>
		</div>
	`);

	const $modalContainer = $modal.find(".facility-popup-modal__container");
	const $modalBg = $modal.find(".facility-popup-modal__bg");
	const $modalImg = $modal.find(".facility-popup-modal__img img");
	const $modalCaption = $modal.find(".facility-popup-modal__caption");
	const $modalCloseButton = $modal.find(".facility-popup-modal__close-button");

	var scrollpos;

	function closeModal() {
		$("body").css({
			position: "",
			top: "",
			width: "",
			height: "",
			"overflow-x": "",
		});
		$(".sb-slide, #sb-site, .sb-site-container, .sb-slidebar").css({
			transform: "",
			transition: "",
		});
		window.scrollTo(0, scrollpos);
		$modalContainer.removeClass("is-open");
	}

	$modalBg.add($modalCloseButton).on("click", closeModal);

	$gallery.append($modal);

	$item.each(function (idx) {
		const $img = $(this).find("img");
		const $openButton = $('<button class="facility-popup__button"></button>');
		const $caption = $.trim($(this).text());

		$openButton.on("click", function () {
			scrollpos = $(window).scrollTop();
			$("body").css({
				position: "fixed",
				top: -scrollpos,
				width: "100%",
				height: "100%",
				"overflow-x": "initial",
			});
			$(".sb-slide, #sb-site, .sb-site-container, .sb-slidebar").css({
				transform: "none",
				transition: "none",
			});

			$modalImg.attr({ src: $img.attr("src"), alt: $img.attr("alt") });
			$modalCaption.text($caption);
			$modalContainer.addClass("is-open");
		});

		$img.after($openButton);
	});

	const media = window.matchMedia("(max-width: 639px)");

	function handleMedia(e) {
		if (!e.matches) {
			closeModal();
		}
	}

	media.addEventListener("change", handleMedia);

	handleMedia(media);
});
