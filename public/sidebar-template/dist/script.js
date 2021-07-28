$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

// $(".logo button").click(function () {
//   $(this).toggleClass("active");
//   $(".vertical").toggleClass("active");
// });

$(".logo button").click(function() {
  $(".page-wrapper").toggleClass("toggled");
});
// $("#show-sidebar").click(function() {
//   $(".page-wrapper").addClass("toggled");
// });