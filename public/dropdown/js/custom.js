$(document).ready(function() {
    $(".menu li:has(ul)").click(function(e) {
        e.preventDefault();

        // var icon = document.getElementsByClassName("fa-angle-down");

        // $(".fa-angle-down").toggleClass("invert")

        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this)
                .children("ul")
                .slideUp();
        } else {
            $(".menu li ul .btn2").slideUp();
            $(".menu li").removeClass("active");
            $(this).addClass("active");
            $(this)
                .children("ul")
                .slideDown();
        }

        $(".menu li ul .btn2 li a").click(function() {
            window.location.href = $(this).attr("href");
        });
    });
});
