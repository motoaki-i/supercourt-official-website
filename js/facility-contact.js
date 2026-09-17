$(function () {
  var $path = "../../../";
  var $contact_radio = $('[name="contact-option-radio"]:radio'),
    $inspection_radio = $("[id=01-D]"),
    $data_request_radio = $("[id=01-E]"),
    $inquirys_radio = $("[id=01-F]");
  var $contact_tab = $(".contact-option__item"),
    $inspection_tab = $(".contact-option__item.--inspection"),
    $data_request_tab = $(".contact-option__item.--data-request"),
    $inquirys_tab = $(".contact-option__item.--inquirys");
  var $inspection_icon = $(".inspection-icon"),
    $data_request_icon = $(".data-request-icon"),
    $inquirys_icon = $(".inquirys-icon");

  $inspection_tab.addClass("--active");
  $inspection_icon.attr(
    "src",
    `${$path}img/top/facility/inspection-icon--active.svg?20220831`
  );

  $contact_radio.change(function () {
    if ($inspection_radio.prop("checked")) {
      radio_change_common("inspection");
      data_request_label_change();
      inqurys_label_change();
      $inspection_tab.addClass("--active");
      icon_change("inspection", "data-request", "inquirys");
    } else if ($data_request_radio.prop("checked")) {
      radio_change_common("data_request");
      data_inspection_label_change();
      inqurys_label_change();
      $data_request_tab.addClass("--active");
      icon_change("data-request", "inspection", "inquirys");
    } else if ($inquirys_radio.prop("checked")) {
      radio_change_common("inquirys");
      data_inspection_label_change();
      data_request_label_change();
      $inquirys_tab.addClass("--active");
      icon_change("inquirys", "inspection", "data-request");
    }
  });

  function icon_change(active, not_active, not_active2) {
    $(`.${active}-icon`).attr(
      "src",
      `${$path}img/top/facility/${active}-icon--active.svg?20220831`
    );
    $(`.${not_active}-icon`).attr(
      "src",
      `${$path}img/top/facility/${not_active}-icon.svg?20220831`
    );
    $(`.${not_active2}-icon`).attr(
      "src",
      `${$path}img/top/facility/${not_active2}-icon.svg?20220831`
    );
  }

  function inqurys_label_change() {
    change_label_html(
      ".label-inquirys",
      "<span class='contact-option__radio-text'>お問い合わせフォームを<br>選択する</span>"
    );
  }
  function data_request_label_change() {
    change_label_html(
      ".label-data_request",
      "<span class='contact-option__radio-text'>資料請求フォームを<br>選択する</span>"
    );
  }
  function data_inspection_label_change() {
    change_label_html(
      ".label-inspection",
      "<span class='contact-option__radio-text'>見学申込フォームを<br>選択する</span>"
    );
  }

  function radio_change_common(current_radio) {
    $(".mailform__inner").css("display", "none");
    $(`.contact-${current_radio}`).css("display", "block");
    change_label_html(
      `.label-${current_radio}`,
      "<span class='contact-option__radio-text'>こちらのフォームが<br>選択されています</span>"
    );
    $contact_tab.removeClass("--active");
  }

  function change_label_html(label, html) {
    $(label).html(html);
  }

  $(window).on("load", function () {
    var w = $(window).width();
    if (w <= 375) {
      $("meta[name=viewport]").attr("content", "width=375");
    } else {
      $("meta[name=viewport]").attr("content", "width=device-width");
    }
  });

    function facility_contact_tab_change(
    hissu_radio,
    tel_input,
    tel_hissu_label,
    mail_input,
    mail_hissu_label,
    sonota_radio,
    sonota_input,
    sonotanaiyou_input,
    sonotanaiyou_hissyu_label,
  ) {
    $(hissu_radio).change(function () {
      var radioval = $(this).val();
      if (radioval == "メール") {
        mail_input.attr("name", "email(必須)");
        // tel_input.removeAttr("name");
        mail_hissu_label.removeClass("dispnone");
        // tel_hissu_label.addClass("dispnone");
      } else {
        tel_input.attr("name", "電話番号(必須)");
        mail_input.removeAttr("name");
        mail_hissu_label.addClass("dispnone");
        tel_hissu_label.removeClass("dispnone");
      }
    });


        $(sonota_radio).change(function () {
          var radioval = $(this).val();
          if (radioval == 'その他') {
            sonotanaiyou_input.attr('name', 'その他内容(必須)');
            sonotanaiyou_hissyu_label.removeClass('dispnone');
          } else {
            sonotanaiyou_input.removeAttr('name');
            sonotanaiyou_hissyu_label.addClass('dispnone');
          }
        });




  }

  const form_type_array = [
    "contact-inspection",
    "contact-data_request",
    "contact-inquirys",
  ];
  form_type_array.forEach((form_type) => {
    var hissu_radio = $(`.${form_type} input[name="希望連絡先(必須)"]:radio`);
    var tel_input = $(`.${form_type} .facility-contact__tel`);
    var tel_hissu_label = $(`.${form_type} .area-contact-hissu--tel`);
    var mail_input = $(`.${form_type} .facility-contact__mail`);
    var mail_hissu_label = $(`.${form_type} .area-contact-hissu--mail`);
    var sonota_radio = $(`.${form_type} input[name="きっかけ(必須)"]:radio`);
    var sonota_input = $(`.${form_type} #kikkake_sonota_id`);
    var sonotanaiyou_input = $(`.${form_type} #kikkake_sonotanaiyou_id`);
    var sonotanaiyou_hissyu_label = $(`.${form_type} .hissusonota`);
    facility_contact_tab_change(
      hissu_radio,
      tel_input,
      tel_hissu_label,
      mail_input,
      mail_hissu_label,
      sonota_radio,
    sonota_input,
    sonotanaiyou_input,
    sonotanaiyou_hissyu_label,
    );
  });

});
