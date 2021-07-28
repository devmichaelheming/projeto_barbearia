<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            responsive: true,
            paging: false,
            searching: false,
            "info": false,
            fixedHeader: {
                footer: true
            },
        });
    });

    function dropdown(){
        $('.modal-dropdown2').toggleClass('active-drop')
        // $('.fa-chevron-down').toggleClass('rotate-icon')
    }
    $('.header .button-more').click(function (){
        $(this).toggleClass("active")
        $('.menu-left-categories').toggleClass('menu-categories-active')
        $('.container-geral').toggleClass('container-left')
        $('.menu-left-categories ul li a').toggleClass('menu-left-active')
        $('.menu-left-categories ul li a span span').toggleClass('span2-active')
        $('.menu-left-categories ul li a span').toggleClass('span1-active')
        $('.menu-left-categories ul li ul li a').toggleClass('menu-left-active2')
        $('.header').toggleClass('header-active')
        $('.logo a').toggleClass('logo-a-active')
        $('.logo-active-full').toggleClass('logo-active-full2')
        $('.logo-active').toggleClass('logo-active2')
        $('.fa-chevron-right').toggleClass('i-active')
        $('.menu-left-categories ul li a span i').toggleClass('li-right')
    });
    
    // function menu_categories(){
    //     $('.menu-left-categories').toggleClass('menu-categories-active')
    //     $('.container-geral').toggleClass('container-left')
    //     $('.menu-left-categories ul li a').toggleClass('menu-left-active')
    //     $('.menu-left-categories ul li a span span').toggleClass('span2-active')
    //     $('.menu-left-categories ul li a span').toggleClass('span1-active')
    //     $('.menu-left-categories ul li ul li a').toggleClass('menu-left-active2')
    //     $('.fa-chevron-right').toggleClass('i-active')
    // }

    $(".menu-left-categories ul li a").mouseover(function(){
        $(this).find(".menu-left-categories ul li a span").addClass('drop-color');
    });
    $(".menu-left-categories ul li a").mouseout(function(){
        $(this).find(".menu-left-categories ul li a span").removeClass('drop-color');
    });
</script>