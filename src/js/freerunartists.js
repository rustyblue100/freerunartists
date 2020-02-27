(function($) {
  //TRANSITION AFTER PAGE LOAD

  $("body").addClass("fade-in");
  $("body").removeClass("preload");

  //Refresh page on resize
  /*   $(window).resize(function() {
    location.reload();
  }); */

  //LOGO MOVE
  if (window.innerWidth > 600) {
    $(document).scroll(function() {
      if ($(this).scrollTop() > 1) {
        $(".custom-logo").addClass("active-logo");
        $(".site-content").addClass("active-logo");
      } else {
        $(".custom-logo").removeClass("active-logo");
        $(".site-content").removeClass("active-logo");
      }
    });
  }

  //MOVING EYES
  if ($(".home").length) {
    $("body").mousemove(function(event) {
      var eye = $(".bird__eye--left,.bird__eye--right ");
      var x = eye.offset().left + eye.width() / 2;
      var y = eye.offset().top + eye.height() / 2;
      var rad = Math.atan2(event.pageX - x, event.pageY - y);
      var rot = rad * (180 / Math.PI) * -1 + 180;
      eye.css({
        "-webkit-transform": "rotate(" + rot + "deg)",
        "-moz-transform": "rotate(" + rot + "deg)",
        "-ms-transform": "rotate(" + rot + "deg)",
        transform: "rotate(" + rot + "deg)"
      });
    });
  }

  //BIG MENU TOGGLE
  var btnToggle = $("#menu-toggle");
  var bodyToggle = $(".main-navigation");

  /*   bodyToggle.on("click", function() {
    $(".main-navigation").removeClass("active");
    $(".menu-toggle").toggleClass("btn-active");
  }); */

  //Big search
  $(".search__btn").on("click", function() {
    $(".search__form").toggleClass("search-active");
    $(".search__form input")
      .focus()
      .val("");
  });

  btnToggle.on("click", function() {
    $(".main-navigation").toggleClass("active");
    $(".main-navigation ul a ").toggleClass("active");
    $(".menu-toggle").toggleClass("btn-active");
  });

  //Place credits at top on mobile
  if ($(window).width() < 600) {
    $(".credits").appendTo(".artist__external-links");
  }

  //FULLPAGE
  if ($(window).width() > 767) {
    $("#fullpage").fullpage({
      //Navigation
      menu: "#menu",
      lockAnchors: false,
      anchors: [],
      navigation: false,
      navigationPosition: "right",
      navigationTooltips: ["firstSlide", "secondSlide"],
      showActiveTooltip: false,
      slidesNavigation: false,
      slidesNavPosition: "bottom",

      //Scrolling
      css3: true,
      scrollingSpeed: 900,
      autoScrolling: true,
      fitToSection: true,
      fitToSectionDelay: 1000,
      scrollBar: true,
      easing: "easeInOutCubic",
      easingcss3: "ease",
      loopBottom: false,
      loopTop: false,
      loopHorizontal: true,
      continuousVertical: false,
      continuousHorizontal: false,
      scrollHorizontally: false,
      interlockedSlides: false,
      dragAndMove: false,
      offsetSections: false,
      resetSliders: false,
      fadingEffect: false,
      //normalScrollElements: ".normal-scroll",
      scrollOverflow: false,
      scrollOverflowReset: false,
      scrollOverflowOptions: null,
      touchSensitivity: 15,
      normalScrollElementTouchThreshold: 5,
      bigSectionsDestination: null,

      //Accessibility
      keyboardScrolling: true,
      animateAnchor: true,
      recordHistory: true,

      //Design
      controlArrows: true,
      verticalCentered: false,
      sectionsColor: "#000, #fff",
      paddingTop: "0em",
      paddingBottom: "4rem",
      fixedElements: "#header, .footer",
      responsiveWidth: 600,
      responsiveHeight: 600,
      responsiveSlides: false,
      parallax: false,
      parallaxOptions: {
        type: "reveal",
        percentage: 62,
        property: "translate"
      },

      //Custom selectors
      sectionSelector: ".section",
      slideSelector: ".slide",

      lazyLoading: true
    });
  }

  $(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav"
  });
  $(".slider-nav").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    arrows: true,
    autoplay: false
  });

  //SLICK CAROUSEL
  //big menu
  $(".slick-carousel").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    draggable: false,
    autoplaySpeed: 2500,
    centerMode: true,
    variableWidth: false,
    arrows: true,
    prevArrow: $(".arrow-show-previous"),
    nextArrow: $(".arrow-show-next"),
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          variableWidth: true
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  //Showreel
  $(".artist__slick-showreel").slick({
    slidesToShow: 2,
    autoplay: true,
    draggable: false,
    autoplaySpeed: 3000,
    centerMode: true,
    variableWidth: true,
    arrows: true,
    prevArrow: $(".arrow-showreel-previous"),
    nextArrow: $(".arrow-showreel-next")
  });

  //Photos
  $(".artist__slick-carousel").slick({
    slidesToShow: 4,
    autoplay: true,
    autoplaySpeed: 3000,
    draggable: false,
    adaptiveHeight: true,
    centerMode: true,
    variableWidth: true,
    arrows: true,
    prevArrow: $(".arrow-photos-previous"),
    nextArrow: $(".arrow-photos-next")
  });
  /*   var slider = $(".artist__slick-carousel");
  var scrollCount = null;
  var scroll = null;

  slider.on("wheel", function(e) {
    e.preventDefault();

    scroll = setTimeout(function() {
      scrollCount = 0;
    }, 200);
    if (scrollCount) return 0;
    scrollCount = 1;

    if (e.originalEvent.deltaY < 0) {
      $(this).slick("slickPrev");
    } else {
      $(this).slick("slickNext");
    }
  }); */

  //Projects
  $(".artist__slick-carousel-projects").slick({
    slidesToShow: 1,
    draggable: false,
    adaptiveHeight: true,
    centerMode: true,
    variableWidth: true,
    arrows: true,
    prevArrow: $(".arrow--previous"),
    nextArrow: $(".arrow--next")
  });

  /*     var slider = $(".artist__slick-carousel-projects");
    var scrollCount = null;
    var scroll = null;

    slider.on("wheel", function(e) {
      e.preventDefault();

      scroll = setTimeout(function() {
        scrollCount = 0;
      }, 200);
      if (scrollCount) return 0;
      scrollCount = 1;

      if (e.originalEvent.deltaY < 0) {
        $(this).slick("slickPrev");
      } else {
        $(this).slick("slickNext");
      }
    });
   */

  //MASONRY

  $(".masonry").masonry({
    fitWidth: true,
    percentPosition: true,
    columnWidth: 260,
    gutter: 20,
    itemSelector: ".masonry-item"
  });

  //MODALS
  $(document).on("click", ".modalBtn", function(e) {
    var btn = e.currentTarget.innerText;

    $(".artist__picture").css({ filter: "blur(5px)" });
    $(".artist__text").css({ filter: "blur(5px)" });

    //Audio
    if (btn === "Audio") {
      $(".modal").addClass("is_open");
      $(".modal__content--audio").addClass("is_open");
    }

    //Credits
    else if (btn === "Credits") {
      $(".modal").addClass("is_open");
      $(".modal__content--projects").addClass("is_open");
    }

    //Showreel
    else if (btn === "Showreels" || btn === "Videos") {
      $(".modal").addClass("is_open");
      $(".modal__content--showreel").addClass("is_open");
    }

    //Press
    else if (btn === "Press") {
      $(".modal").addClass("is_open");
      $(".modal__content--press").addClass("is_open");
    }

    //Pictures
    else if (btn === "Pictures") {
      $(".modal").addClass("is_open");
      $(".modal__content--photos").addClass("is_open");
    }

    //Gallery
    else if (btn === "Gallery") {
      $(".modal").addClass("is_open");
      $(".modal__content--gallery").addClass("is_open");
    }
  });

  $(".close-modal").on("click", function() {
    $(".modal.is_open").removeClass("is_open");
    $(".modal__content").removeClass("is_open");
    $(".modal.is_open").removeClass("is_open");
    $(".artist__picture").css({ filter: "unset" });
    $(".artist__text").css({ filter: "unset" });

    //stop players on closing modal
    /*     $(".modal iframe").attr("src", $(".modal iframe").attr("src"));
    location.reload(); */
  });

  //GSAP ANIMATIONS
  if (window.innerWidth > 600) {
    var t0 = new TimelineMax({ paused: true });

    //Start
    t0.set(".bird__eye--left, .bird__eye--right", {
      visibility: "visible"
    })
      .from(".bird", 1.2, {
        visibility: "visible",
        x: "40%",
        autoAlpha: 0,
        ease: Expo.easeOut
      })

      .from(
        ".bird__eye--left, .bird__eye--right",
        0.4,
        { visibility: "visible", rotation: -125 },
        "-=.6"
      )
      .from(
        ".home .custom-logo",
        1,
        {
          rotation: 0.01,
          autoAlpha: 0,
          x: -100,
          ease: Expo.easeOut
        },
        "-=1.3"
      )
      .from(
        ".circle__image, .circle__text",
        0.6,
        {
          visibility: "visible",
          autoAlpha: 0,
          scale: 0.95
        },
        "-=1"
      )
      .from(
        ".down-arrow",
        2,
        {
          autoAlpha: 0
        },
        "-=1.6"
      )
      .from(
        ".email-cta",
        1,
        {
          autoAlpha: 0,
          y: -35,
          ease: Expo.easeInOut
        },
        "-=1"
      )
      .from(
        ".home #menu-toggle",
        0.1,
        {
          autoAlpha: 0,
          y: -65,
          ease: Expo.easeInOut
        },
        "-=.6"
      );

    window.onload = function() {
      t0.play();
    };

    var tphotosLeft = new TimelineMax();

    tphotosLeft
      .from(".header-page__image.right-image", 0.4, {
        x: "20%",
        autoAlpha: 0,
        ease: Expo.easeOut
      })
      .from(".header-page__photo.right-image", 0.8, {
        x: 106,
        //autoAlpha: 0,
        ease: Expo.easeOut
      })
      .from(
        ".description__text",
        2,
        {
          autoAlpha: 0,
          y: -20,
          ease: Expo.easeOut
        },
        "-=.5"
      )
      .from(
        ".read-more__text",
        3,
        {
          autoAlpha: 0,
          x: -40,
          ease: Expo.easeOut
        },
        "-=1.7"
      );

    // init controller
    var controller = new ScrollMagic.Controller();

    //TO LEFT
    $(".header-page__overlay:not(.header-page__overlay.right-image)").each(
      function() {
        var tphotosRighOverlay = TweenMax.from($(this), 0.4, {
          scale: 0.6,
          x: "-20%",
          autoAlpha: 0,
          ease: Expo.easeOut
        });

        // overlay to left
        var overlayToLeft = new ScrollMagic.Scene({
          triggerElement: this
        })
          .setTween(tphotosRighOverlay)
          //.addIndicators()
          .addTo(controller);
      }
    );

    $(".header-page__photo:not(.header-page__photo.right-image)").each(
      function() {
        var tphotosRight = TweenMax.from($(this), 0.6, {
          delay: 0.3,
          x: "0%",
          autoAlpha: 0,
          ease: Power4.easeOut
        });

        // photo to left
        var photoToLeft = new ScrollMagic.Scene({
          triggerElement: this
        })
          .setTween(tphotosRight)
          //.addIndicators()
          .addTo(controller);
      }
    );

    //TO RIGHT News

    var tphotosLeftNews = TweenMax.from($(".news-home__photo"), 1, {
      x: "-10%",
      autoAlpha: 0,
      ease: Expo.easeOut
    });

    // overlay to right
    var overlayToRight = new ScrollMagic.Scene({
      triggerElement: ".news-home"
    })
      .setTween(tphotosLeftNews)
      //.addIndicators()
      .addTo(controller);

    //TO RIGHT
    $(".header-page__overlay.right-image").each(function() {
      var tphotosLeftOverlay = TweenMax.from($(this), 0.4, {
        scale: 0.6,
        x: "20%",
        autoAlpha: 0,
        ease: Expo.easeOut
      });

      // overlay to right
      var overlayToRight = new ScrollMagic.Scene({
        triggerElement: this
      })
        .setTween(tphotosLeftOverlay)
        //.addIndicators()
        .addTo(controller);
    });

    $(".header-page__photo.right-image").each(function() {
      var tphotosLeft = TweenMax.fromTo(
        $(this),
        0.6,
        {
          x: "0%",
          autoAlpha: 0
        },
        {
          delay: 0.3,
          x: -84,
          autoAlpha: 1,
          ease: Power4.easeOut
        }
      );

      // photo to right
      var photoToRight = new ScrollMagic.Scene({
        triggerElement: this
      })
        .setTween(tphotosLeft)
        //.addIndicators()
        .addTo(controller);
    });

    $(".description__text").each(function() {
      var description = TweenMax.fromTo(
        $(this),
        0.8,
        {
          y: "-20%",
          autoAlpha: 0,
          ease: Expo.easeOut
        },
        {
          y: "0%",
          autoAlpha: 1,
          ease: Expo.easeOut
        }
      );

      // Description text fade in
      var descriptionFade = new ScrollMagic.Scene({
        triggerElement: this,
        offset: -200
      })
        .setTween(description)
        //.addIndicators({ name: "description text" })
        .addTo(controller);
    });

    $(".read-more").each(function() {
      var description = TweenMax.from($(this), 0.8, {
        x: "-20%",
        autoAlpha: 0,
        ease: Expo.easeOut
      });

      // read more fade in
      var descriptionFade = new ScrollMagic.Scene({
        triggerElement: this,
        offset: -450
      })
        .setTween(description)
        //.addIndicators({ name: "read more" })
        .addTo(controller);
    });

    //SINGLE GSAP
    var t1 = new TimelineMax();

    //Start
    t1.from(".artist__overlay", 2.5, {
      x: "0%",
      autoAlpha: 0,
      ease: Expo.easeOut
    })
      .from(
        ".artist__picture, .free__picture",
        1.5,
        {
          autoAlpha: 0,
          x: "-50%",
          ease: Power4.easeOut
        },
        "-=2"
      )
      .from(
        ".artist__text, .free__text",
        2,
        {
          autoAlpha: 0,
          ease: Expo.easeOut
        },
        "-=1.5"
      );

    //News
    TweenMax.from(".news__overlay, .news-single__overlay", 1, {
      x: "0%",
      autoAlpha: 0,
      scale: 0.6,
      ease: Expo.easeOut
    });
  } else {
    var t0 = new TimelineMax();

    //Start
    t0.from(".bird, .artist__picture, .artist__picture--overlay", 1.5, {
      scale: 0.6,
      autoAlpha: 0,
      ease: Expo.easeOut
    });
  }
})(jQuery);
