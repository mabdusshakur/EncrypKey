$(function () {
  /* toggle button */

  $(".btn-toggle").click(function () {
    $("body").hasClass("toggled")
      ? ($("body").removeClass("toggled"),
        $(".sidebar-wrapper").unbind("hover"))
      : ($("body").addClass("toggled"),
        $(".sidebar-wrapper").hover(
          function () {
            $("body").addClass("sidebar-hovered");
          },
          function () {
            $("body").removeClass("sidebar-hovered");
          }
        ));
  });

  /* menu */

  $(function () {
    $("#sidenav").metisMenu();
  });

  $(".sidebar-close").on("click", function () {
    $("body").removeClass("toggled");
  });

  /* menu active */

  $(function () {
    for (
      var e = window.location,
        o = $(".metismenu li a")
          .filter(function () {
            return this.href == e;
          })
          .addClass("")
          .parent()
          .addClass("mm-active");
      o.is("li");

    )
      o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
  });
});
