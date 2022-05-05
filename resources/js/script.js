let toggle = false;
let expanded = false;
const menu = $(".menu-btn");
const overlayMenu = $(".overlay-menu");
const overlayArea = $(".overlay-menu__area");
const toggler = $(".toggler");
const hostName = window.location.origin;
let siteName = hostName;

if (hostName.includes("localhost")) {
  siteName += "/pienamammas";
}

$(document).ready(function () {
  // CHANGE BACKGROUND SIZE IF CURRENT PAGE NAVBAR LINK IS LESS THAN 118
  if ($('.topmenu a[aria-current="page"]').width() <= 118) {
    $("head").append(
      '<style>.topmenu a[aria-current="page"]:not(a.pm-btn):before{background-size:contain !important}</style>'
    );
  }

  if ($('.overlay-menu a[aria-current="page"]').width() <= 118) {
    $("head").append(
      '<style>.overlay-menu a[aria-current="page"]:not(a.pm-btn):before{background-size:contain !important}</style>'
    );
  }

if($( ".um-field-time-interval select" ).length) {
  $( ".um-field-time-interval select" ).on( "change", function() {
    if($(this).val() !== 'Regulārs') {
      $('.um-time-interval > label').css('display', 'none');
    }else {
      $('.um-time-interval > label').css('display', '');
    }
  });
}

  $(window).load(() => {
    if ($(".properties .dot .point").length) {
      $(".properties .dot .point").each(function (index) {
        let pointWidth = $(this).width();
        pointWidth = +pointWidth + 10;
        console.log(index + ": " + pointWidth);
        $(this).css("width", pointWidth);
      });
    }
  });

  // PROPERTY DESCRIPTION HOVER
  $(".property-description").hover(
    function () {
      $(this).parent("div.body-small").addClass("is-hover");
      // check if block is fully in view horyzontally
      if ($(this).offset().left + 204 > $(window).width()) {
        $(this).find(".description-area").css({ left: "-13.3rem" });
        $(this).find("p").css("margin-left", "0");
        $(this).find(".background-blob").css({ transform: "scaleX(-1)" });
      } else {
        $(this).find(".description-area").css({ left: "" });
        $(this).find(".background-blob").css({ transform: "" });
        $(this).find("p").css("margin-left", "");
      }
    },
    function () {
      console.log($(".property-description").parent("div.body-small").width());
      $(this).parent("div.body-small").removeClass("is-hover");
    }
  );

  $(".reviews")
    .find(".additional-info")
    .prev(".review")
    .css("margin-bottom", "0");

  // $(".fep-label label").html('Ziņa <span class="required">*</span>');
  $(
    ".advertisements-block .advertisements-block-form .fep-button"
  ).html("Sūtīt ziņu");

  $(document).on("click", ".advertisements-block .show-email", function () {
    $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .find(".advertisements-block-form")
      .removeClass("d-none");
  });

  $(document).on(
    "click",
    ".advertisements-block .close-email-btn",
    function () {
      $(this).parent().addClass("d-none");
    }
  );
  /**
   * Front page navbar change class on scroll
   */
  $(window).bind("scroll", function () {
    var navHeight = $(window).height() - 70;
    if ($(window).scrollTop() > 70) {
      $("#front-end-menu").removeClass("front-page-topmenu");
      $("#front-end-menu").addClass("not-front-page");
    } else {
      $("#front-end-menu").removeClass("not-front-page");
      $("#front-end-menu").addClass("front-page-topmenu");
    }
  });

  $(".breast-milk .dots li").addClass("dot");
  // WRAP INNER
  $(".breast-milk .dots li").wrapInner("<p class='body-small'></p>");
  $(".orange-list li, .grey-list li").wrapInner("<p class='body-small'></p>");
  $(".security-page table td").wrapInner("<p class='body-smaller'></p>");

  //ADD CLASS
  $(
    ".expert-opinion-page .col-lg-8 p, .experience-stories-page .col-lg-8 p, .useful-single .col-lg-8 p, .reviews .additional-info p, .world-experience-info .col-lg-9 p, .breast-milk-page p, .security-page .content p:not(.orange-list > p) "
  ).addClass("body-small");

  $(".world-experience-info .col-lg-9 a").addClass("orange-link");

  // ULTIMATE MEMBER
  $("#um-submit-btn, .um-editing input[type='submit'], .um-editing a.um-alt")
    .removeClass("um-button")
    .addClass("btn pm-btn pm-btn__blue");
  $(
    '.um .um-form input[type="text"], .um .um-form input[type="password"]'
  ).addClass("body-small");

  $(".um-field-checkbox-option, .before-benefits-description p").addClass(
    "body-smaller"
  );
  $(
    ".before-benefits p:not(.before-benefits-description p), .before-benefits li"
  ).addClass("body-small");
  $(".before-benefits a:not(.before-benefits-description a)").addClass(
    "orange-link"
  );

  $(
    "#um_field_548_only-donate .um-field-label label, .join .um-field-checkbox label"
  ).wrapInner("<p class='body-smaller'></p>");

  $('.join .um-field-checkbox .um-field-label label p').each(function() {
      let checkboxText = $(this).text();
      console.log(checkboxText);
      let checkboxNewText = checkboxText.replace(
        "pienamammas.lv",
        '<a href="' +
          siteName +
          '" class="orange-link">pienamammas.lv</a>'
      );
    
      $(this).html(checkboxNewText);
  })

  // CHECKBOXES

  // privacy policy checkbox
  let privacyPolicyElement = $(
    "#um_field_548_privacy-policy-1 .um-field-area .um-field-checkbox .um-field-checkbox-option"
  );
  let privacyPolicyText = privacyPolicyElement.text();

  let privacyPolicyNewText = privacyPolicyText.replace(
    "šeit",
    '<a href="' +
      siteName +
      '/drosiba/" class="orange-link">šeit</a>'
  );

  privacyPolicyElement.html(privacyPolicyNewText);

  // only donate milk
  let donateMilkFirstCheckboxElement = $(
    "#um_field_548_donate-checkbox-1 .um-field-area .um-field-checkbox .um-field-checkbox-option"
  );
  let donateMilkSecondCheckboxElement = $(
    "#um_field_548_donate-checkbox-2 .um-field-area .um-field-checkbox .um-field-checkbox-option"
  );
  let donateMilkThirdCheckboxElement = $(
    "#um_field_548_donate-checkbox-3 .um-field-area .um-field-checkbox .um-field-checkbox-option"
  );

  // donateMilkFirstCheckboxElement.html(`Veselības apsvērumi krūts piena atslaukšanas laikā:</br>
  // - Man nav garīgo slimību;</br>
  // - Man netika apstiprināti pozitīvi HIV, cilvēka T-šūnu leikēmijas vīrusa, B un C hepatīta testa rezultāti;</br>
  // - Man nav HIV nodošanas risks (tostarp, ja slimība konstatēta donora mātes partnerim);</br>
  // - Man nav herpes vai sifilisa akūts periods;</br>
  // - Man nav atklātu čūlu, asiņošanas, pūslīšu, plaisu klātbūtne krūts vai sprauslu ādā;</br>
  // - Man netika veikta ķīmijterapija;</br>
  // - Man netika veikts staru terapijas kursa vai izmeklēšana ar radioaktīvo izotopu palīdzību;</br>
  // - Es nelietoju medikamentus, kas nav saderīgi ar zīdīšanu (medikamentu saderību iespējams pārbaudīt datu bāzē <a href="www.e-lactancia.org" class="orange-link">www.e-lactancia.org</a>);</br>
  // - Es neesmu slima ar vējbakām vai jostas rozi.
  // `);

  donateMilkFirstCheckboxElement.html(`Krūts piena ziedošana un saņemšana ir iespējama tikai tad, ja piena atslaukšanas laikā mammai nav bijuši sekojoši veselības stāvokļi, dzīvesveida izvēles un sociālie faktori:</br>
- Garīgas saslimšanas;</br>
- pozitīvi HIV, cilvēka T-šūnu leikēmijas vīrusa, B un C hepatīta testa rezultāti;</br>
- HIV nodošanas risks (tostarp, ja slimība konstatēta donora mātes partnerim);</br>
- herpes vai sifilisa akūts periods;</br>
- atklātas čūlas, asiņošana, pūslīši, plaisu klātbūtne krūts vai sprauslu ādā;</br>
- netiek veikta ķīmijterapija;</br>
- netiek veikts staru terapijas kurss vai izmeklēšana ar radioaktīvo izotopu palīdzību;</br>
- netiek lietoti medikamenti, kas nav saderīgi ar zīdīšanu (medikamentu saderību iespējams pārbaudīt datu bāzē www.e-lactancia.org);</br>
- nav saslimšanas ar vējbakām vai jostas rozi;</br>
- netiek lietotas narkotiskas vielas;</br>
- netiek lietoti alkoholiskie dzērieni;</br>
- piena donore nesmēķē;</br>
- krūts piens tiek ziedots brīvprātīgi, un tas netiek veikts piespiedu kārtā. `);

  donateMilkSecondCheckboxElement.html(`Dzīvesveids:</br>
  - Es nelietoju narkotiskas vielas;</br>
  - Es nelietoju alkoholiskos dzērienus piena atslaukšanas laikā;</br>
  - Es nesmēķēju;
  `);

  donateMilkThirdCheckboxElement.html(`Sociālie faktori:</br>
  - Ziedoju pienu brīvprātīgi un tā netiek veikta piespiedu kārtā;
  `);

  let getMilkCheckboxElement = $(
    "#um_field_548_get-checkbox-1 .um-field-area .um-field-checkbox .um-field-checkbox-option"
  );
//   getMilkCheckboxElement.html(`- Ar šo es apliecinu, ka saņemtais piens tiks izmantots tikai bērna, līdz 1gada vecumam, uztura vajadzībām;</br>
// - Saņemtais krūts piens netiks pārdots vai nodots trešajām personām;
// `);


  if (window.location.href.indexOf("?mother_type=donate") > -1) {
    $("#um_field_548_privacy-policy-1").after(
      `<label class="mt-4"><p class="body-smaller">! Ziedojot pienu priekšlaicīgi dzimušiem un novājinātiem bērniem, dažu augu izcelsmes preparātu lietošana un vitamīnu kompleksu lietošana ir iespējama tikai pēc konsultēšanās ar bērna ārstējošo ārstu.</p></label>`
    );
    // $("#um_field_548_get-checkbox-1 input").prop("checked", true);
  }

  if (window.location.href.indexOf("?mother_type=get") > -1) {
    $("#um_field_548_privacy-policy-1").after(
      `<label class="mt-4"><p class="body-smaller">! Par krūts piena nodošanu trešajām personām vai izmantosanu jebkādām citām vajadzībām izņemot zīdaiņa uzturu, profils tiks dzēsts neatgriezeniski.</p></label>`
    );
    // $("#um_field_548_donate-checkbox-1 input").prop("checked", true);
    // $("#um_field_548_donate-checkbox-2 input").prop("checked", true);
    // $("#um_field_548_donate-checkbox-3 input").prop("checked", true);
  }

  // $('.um-field-image').append('<div id="uploaded-photo" class="img-block" style="background-image: url(./assets/img/upload-default-photo.svg);background-repeat: no-repeat;background-position: center;"></div>')
  $(".um-field-image").append('<div class="img-upload-block"></div>');
  $(".um-field-image .img-upload-block").append(
    '<div id="uploaded-photo" class="img-block" style="background-image: url(' +
      siteName +
      '/wp-content/themes/pienamammas/assets/img/upload-default-photo.svg);background-repeat: no-repeat;background-position: center;"></div>'
  );
  $(".um-field-image .img-upload-block").append(
    '<div class="img-options d-block"></div>'
  );
  $(".um-field-image .img-upload-block .img-options")
    .append(
      '<a href="javascript:void(0);" data-modal="um_upload_single" data-modal-size="normal" data-modal-copy="1" class="body-small">Pievienot bildi</a>'
    )
    .append(
      '<div class="um-single-image-preview " data-crop="0" data-key="user-avatar"><a href="javascript:void(0);" class="body-small cancel d-block">Dzēst bildi</a></div>'
    );

  $(".um-field-volume")
    .parent()
    .parent()
    .prepend(
      '<label class="body-small">Piena apjoms (atstāt tukšu, ja apjoms nav zināms)</label>'
    );

  $(".um-554 .um-field-user_password")
    .parent()
    .parent()
    .prepend('<label class="body-small">Mainīt paroli</label>');

  $(".um-field-child-age").before(
    '<label class="body-small">Bērna vecums (ir jāievada mēnesi)</label>'
  );
  $(".um-field-from")
    .parent()
    .parent()
    .prepend(
      '<label class="w-100 body-small">Esmu gatava dalīties ar pienu</label>'
    );

  $("#time-interval").change(function () {
    $(".um-time-interval label").removeClass("d-none");
    if (!$("#time-interval").val()) {
      $(".um-time-interval label").addClass("d-none");
    }
  });
  // if (!$("#time-interval").val()) {
  //   $(".um-time-interval label").addClass("d-none");
  // }

  // if ($("input[name=user-current-photo]").length) {
  //   $(".img-upload-block #uploaded-photo").css({
  //     "background-image":
  //       "url(" + $("input[name=user-current-photo]").val() + ")",
  //     "background-size": "cover",
  //   });
  // }

  if ($(".um-single-image-preview img").length) {
    var img = document.querySelector(".um-single-image-preview img"),
      observer = new MutationObserver((changes) => {
        changes.forEach((change) => {
          if (change.attributeName.includes("src")) {
            console.log(img.src);
            $("#uploaded-photo").css({
              "background-image": "url(" + img.src + ")",
              "background-size": "cover",
            });
          }

          if (img.getAttribute("src") == "") {
            console.log("no src");
            $("#uploaded-photo").css({
              "background-image":
                "url(" +
                siteName +
                "/wp-content/themes/pienamammas/assets/img/upload-default-photo.svg)",
              "background-size": "auto",
            });
          }
        });
      });
    observer.observe(img, { attributes: true });
  }

  // IF PROFILE EDIT PAGE
  if ($(".um-profile").length) {
    $(".img-options .um-single-image-preview .cancel").on("click", function () {
      $(".img-upload-block #uploaded-photo").css({
        "background-image":
          "url(" +
          siteName +
          "/wp-content/themes/pienamammas/assets/img/upload-default-photo.svg)",
        "background-size": "auto",
      });

      $(
        '.um-field-image .img-upload-block .img-options a[data-modal="um_upload_single"]'
      ).text("Pievienot bildi");
    });

    $(".um-single-image-preview img").on("load", function () {
      $(".img-upload-block #uploaded-photo").css({
        "background-image": "url(" + $(this).attr("src") + ")",
        "background-size": "cover",
      });

      $(
        '.um-field-image .img-upload-block .img-options a[data-modal="um_upload_single"]'
      ).text("Mainīt bildi");
      if ($(".remove-current-photo").length) {
        $(".remove-current-photo").remove();
      }
    });
  }

  $(".join.edit-profile a.remove-profile, .remove-overlay a").click(() => {
    $(".remove-overlay").toggleClass("d-flex");
  });

  // TIME INTERVAL FORMAT
  // let dateFromNew = dateFrom[2] + '.' + dateFrom[1] + '.' + dateFrom[0];
  // $(window).load(function () {
  $("#from-554, #to-554").change(function () {
    if (!($("#um_field_554_from > p").length > 0)) {
      $("#um_field_554_from").append(
        '<p class="from-format body-small position-absolute"></p>'
      );
    }
    if (!($("#um_field_554_to > p").length > 0)) {
      $("#um_field_554_to").append(
        '<p class="from-format body-small position-absolute"></p>'
      );
    }
    setTimeout(() => {
      if ($(this).parent().parent().find('input[type="hidden"]').val() != "") {
        let dateFrom = $(this)
          .parent()
          .parent()
          .find('input[type="hidden"]')
          .val()
          .split("/");
        let dateFromNew = dateFrom[2] + "." + dateFrom[1] + "." + dateFrom[0];
        $(this).parent().parent().find("p.body-small").text(dateFromNew);
        $(this).css("color", "transparent");
      }
    }, 500);
  });
  // });

  // PIEREDZES STĀSTI, EKSPERTI READ MORE TEXT BTN

  if ($(".experience-stories-page").length) {
    $(
      ".experience-stories-page .col-lg-8:not(.col-lg-8:nth-child(2)), .experience-stories-page .col-lg-9"
    ).addClass("d-none");
  }

  if ($(".expert-opinion-page").length) {
    $(
      ".expert-opinion-page .col-lg-8:not(.col-lg-8:nth-child(2)), .expert-opinion-page .col-lg-9"
    ).addClass("d-none");
  }

  $(".experience-stories-page .read-more, .expert-opinion-page .read-more").on(
    "click",
    () => {
      if ($(".experience-stories-page").length) {
        $(".experience-stories-page .col-lg-8").removeAttr("style");
        $(
          ".experience-stories-page .fade-bottom, .experience-stories-page .read-more"
        ).remove();
        $(
          ".experience-stories-page .col-lg-8:not(.col-lg-8:nth-child(2)), .experience-stories-page .col-lg-9"
        ).removeClass("d-none");
      }

      if ($(".expert-opinion-page").length) {
        $(".expert-opinion-page .col-lg-8").removeAttr("style");
        $(
          ".expert-opinion-page .fade-bottom, .expert-opinion-page .read-more"
        ).remove();
        $(
          ".expert-opinion-page .col-lg-8:not(.col-lg-8:nth-child(2)), .expert-opinion-page .col-lg-9"
        ).removeClass("d-none");
      }
    }
  );

  /**
   * Tablet, mobile menu
   */
  menu.click(function () {
    toggle = !toggle;

    if (toggle) {
      overlayMenu.addClass("open");
      toggler.addClass("open");
      overlayArea.addClass("open");
    } else {
      overlayMenu.removeClass("open");
      toggler.removeClass("open");
      overlayArea.removeClass("open");
    }
  });

  // $('.um-field-location input').on("input",() => {
  //   console.log($(this).val());
  // })

  if($("#um_field_548_location select, #um_field_554_location select").length) {
    $("#um_field_548_location select, #um_field_554_location select")
    .select2()
    .on("select2:open", function () {
      $(".select2-results__options").niceScroll({
        cursorcolor: "#6381C4",
        cursorborderradius: "4px",
        cursorwidth: "4px",
        railoffset: { left: "10px" },
        autohidemode: false,
      });

      $('.um-field-location input').on("input",() => {
        if($('.um-field-location input').val() == "") {
          setTimeout(() => {
            if ($(".select2-results__option:first-child").length) {
              $(".select2-results__option:first-child").before(
                '<label class="w-100 mb-0"><p class="body-small">Pilsētas</p></label>'
              );
            }
            if (
              $(
                '.select2-results__options .select2-results__option[id*="Aizkraukles novads"]'
              ).length
            ) {
              $(
                '.select2-results__options .select2-results__option[id*="Aizkraukles novads"]'
              ).before(
                '<label class="w-100 mb-0"><p class="body-small">Novadi</p></label>'
              );
            }
          }, 100);

        }
      })

      setTimeout(() => {
        if ($(".select2-results__option:first-child").length) {
          $(".select2-results__option:first-child").before(
            '<label class="w-100 mb-0"><p class="body-small">Pilsētas</p></label>'
          );
        }
        if (
          $(
            '.select2-results__options .select2-results__option[id*="Aizkraukles novads"]'
          ).length
        ) {
          $(
            '.select2-results__options .select2-results__option[id*="Aizkraukles novads"]'
          ).before(
            '<label class="w-100 mb-0"><p class="body-small">Novadi</p></label>'
          );
        }
      }, 100);
    });
  }


  // TABLE SCROLLING
  $("#scroll-right").on("click", function () {
    let leftPos = $(this).next("#table-wrapper").scrollLeft();
    let scrollToLeft = 150;

    if ($(window).width() < 768) {
      scrollToLeft = 120;
    }

    $("#table-wrapper").animate(
      {
        scrollLeft: leftPos + scrollToLeft,
      },
      500
    );
  });

  $("#table-wrapper")
    .scroll(function (e) {
      var _this = this;
      $(this)
        .prev()
        .prev(".right-gradient")
        .css({
          opacity:
            _this.scrollWidth === _this.scrollLeft + _this.clientWidth
              ? "0"
              : "1",
        });
    })
    .scroll();

  $(".selectBox").click(function () {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
      $(this).find("select").css("background-color", "#E0E5F2");
      $(this).addClass("open");
      checkboxes.style.display = "block";
      expanded = true;
    } else {
      $(this).find("select").css("background-color", "");
      $(this).removeClass("open");
      checkboxes.style.display = "none";
      expanded = false;
    }
  });

  $(".data-loader").hide();

  $(".load-more-posts").click(function () {
    $("#true_loadmore").text("Ielādēšana..."); // изменяем текст кнопки

    var data = {
      action: "loadmore",
      query: true_posts,
      page: current_page,
    };

    $.ajax({
      url: ajaxurl, // обработчик
      data: data, // данные
      type: "POST", // тип запроса

      success: function (data) {
        if (data) {
          if ($(".useful-posts .posts").length) {
            $(".useful-posts .posts").append(data);
          }
          if ($(".expert-opinion-more .posts").length) {
            $(".expert-opinion-more .posts").append(data);
          }
          if ($(".experience-stories .posts").length) {
            $(".experience-stories .posts").append(data);
          }

          $("#true_loadmore").text("Ielādēt vēl");

          current_page++; // увеличиваем номер страницы на единицу

          if (current_page == max_pages) $(".load-more-posts").remove(); // если последняя страница, удаляем кнопку

        } else {
          $(".load-more-posts").remove(); // если мы дошли до последней страницы постов, скроем кнопку
        }
      },
    });
  });

  // RESET PASSWORD

  if($(".member-reset-password").length) {
    $(".member-reset-password input[type=text]").attr("placeholder", "E-pasts");
    $(".member-reset-password input[type=text], .member-reset-password p").addClass("body-small");
  }

  // TERMS
  var termsCheckbox = $("#wptp-form .checkbox input");

  if(termsCheckbox.length) {
    if ($(termsCheckbox).is(":checked")) {
      $("#wptp-form input.termsagree").removeAttr("disabled");
  } else {
      $("#wptp-form input.termsagree").attr("disabled", "disabled");
  }
  }

  termsCheckbox.click(function() {
      if ($(this).is(":checked")) {
          $("#wptp-form input.termsagree").removeAttr("disabled");
      } else {
          $("#wptp-form input.termsagree").attr("disabled", "disabled");
      }
  });
});

if ($("#facts").length) {
  $("#facts")
    .on("init", function (event, slick) {
      for (var i = 0; i < slick.$slides.length; i++) {
        var $slide = $(slick.$slides[i]);
        if ($slide.hasClass("slick-current")) {
          // update DOM siblings
          $slide.prev().addClass("prev-slider");
          $slide.next().addClass("next-slider");
          break;
        }
      }
    })
    .slick({
      slidesToShow: 1,
      autoplaySpeed: 50,
      autoplay: false,
      rtl: false,
      slidesToScroll: 1,
      arrows: true,
      infinite: true,
      centerMode: true,
      variableWidth: true,
      focusOnSelect: true,
      // touchMove: true,
      draggable: false,
      prevArrow: '<span class="prev-arrow"><h1><</h1></span>',
      nextArrow: '<span class="next-arrow"><h1>></h1></span>',
    })
    .on("beforeChange", function (event, slick, currentSlide, nextSlide) {
      slick.$slides.removeClass("prev-slider").removeClass("next-slider");
      for (var i = 0; i < slick.$slides.length; i++) {
        var $slide = $(slick.$slides[i]);
        if ($slide.hasClass("slick-current")) {
          $slide.next().removeClass("next-slider");
          break;
        }
      }
    });

  $("#facts").on("afterChange", function (event, slick, direction) {
    console.log("afterChange/init", event, slick, slick.$slides);
    // remove all prev/next
    slick.$slides.removeClass("prev-slider").removeClass("next-slider");
    for (var i = 0; i < slick.$slides.length; i++) {
      var $slide = $(slick.$slides[i]);
      if ($slide.hasClass("slick-current")) {
        $slide.prev().addClass("prev-slider");
        $slide.prev().prev().removeClass("prev-slider");
        $slide.next().addClass("next-slider");
        break;
      }
    }
  });
  
}
