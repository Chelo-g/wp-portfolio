/* make span for each character */
var logoclass = ".logo";
$(logoclass)
  .children()
  .addBack()
  .contents()
  .each(function () {
    if (this.nodeType == 3) {
      var $this = $(this);
      $this.replaceWith($this.text().replace(/(\S)/g, "<span>$&</span>"));
    }
  });

/* scroll goto id */
$(function () {
  var headerHeight = 100;
  var scroll_speed = 500;
  $('[href^="#"]').click(function () {
    if (is_displayed_burger == true) {
      headerHeight = 50;
    }
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top - headerHeight;
    $("html, body").animate({ scrollTop: position }, scroll_speed, "swing");
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
  $(nav_class).toggleClass(nav_display_class);
}

$(btn_burger).on("click", function () {
  toggle_burger_menu();
});
