(function ($) {
  
  // Variables
  var $html = $("html"),
    $body = $("body"),
    $siteHeader = $body.find(".site-header"),
    $menuBtn = $(".menu-btn"),
    $menuContainer = $(".menu-container"),
    $overlay = $(".overlay"),
    $scrollTopBtn = $body.find(".scroll-top");

  $(document).ready(function () {
    // 서브메뉴 드롭다운
    var subMenu = $(".sub-menu");
    if (!$(".menu-item-has-children").hasClass("show")) {
      $(".current-menu-parent").addClass("show");
    }
    // 모바일
    if ($(".more-navigation").find("menu-item-has-children")) {
      $(".menu-item-has-children").prepend('<div class="toggle-btn"></div>');
      $(".menu-item-has-children .toggle-btn").click(function () {
        $(this).toggleClass("show");
        $(this).parent(".menu-item-has-children").toggleClass("show");
      });
    }

    // Header - More navigation
    $menuBtn.click(function () {
      $(this).toggleClass("active");

      // active 상태
      if ($(this).hasClass("active")) {
        $("html, body").css({
          overflow: "hidden",
        });
        $menuContainer.addClass("active");
        $overlay.addClass("active");
      } else {
        $("html, body").css({
          overflow: "",
        });
        $menuContainer.removeClass("active");
        $overlay.removeClass("active");
      }
    });

    // 클릭시 닫힘
    $overlay.click(function () {
      $searchContainer.removeClass("active");
      $searchBtn.removeClass("active");
      $menuContainer.removeClass("active");
      $menuBtn.removeClass("active");
      $(this).removeClass("active");
      $("html, body").css({
        overflow: "",
      });
    });

    // Scroll Top 버튼
    $scrollTopBtn.click(function () {
      $html.animate(
        {
          scrollTop: 0,
        },
        400
      );
      return false;
    });
  });
})(jQuery);
