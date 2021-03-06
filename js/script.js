/* make span for each character */
var logoclass = ".logo";
jQuery(logoclass)
  .children()
  .addBack()
  .contents()
  .each(function () {
    if (this.nodeType == 3) {
      var $this = jQuery(this);
      $this.replaceWith($this.text().replace(/(\S)/g, "<span>$&</span>"));
    }
  });

/* scroll goto id */
jQuery(function () {
  var headerHeight = 100;
  var scroll_speed = 500;
  jQuery('[href^="#"]').click(function () {
    if (is_displayed_burger == true) {
      headerHeight = 50;
    }
    var href = jQuery(this).attr("href");
    var target = jQuery(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top - headerHeight;
    jQuery("html, body").animate(
      { scrollTop: position },
      scroll_speed,
      "swing"
    );
    if (is_displayed_burger == true) {
      toggle_burger_menu();
    }
    return false;
  });
});

/* buger script */
var btn_burger = ".btn-burger";
var nav_class = ".nav";
var nav_display_class = "nav--is-active";
var is_displayed_burger = false;
function toggle_burger_menu() {
  is_displayed_burger = !is_displayed_burger;
  jQuery(nav_class).toggleClass(nav_display_class);
}

jQuery(btn_burger).on("click", function () {
  toggle_burger_menu();
});

/* SwiperのJS https://swiperjs.com/
  各class名は変更不可。
  CSSの追記はクラス名を別途追加して実施すること*/
const swiper = new Swiper(".swiper-container", {
  // Optional parameters
  loop: true,
  //loopedSlides: 4,
  speed: 800,
  slidesPerView: 1.5,
  centeredSlides: true, // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
