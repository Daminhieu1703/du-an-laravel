(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow');
            } else {
                $('.fixed-top').removeClass('bg-white shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
            }
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    
})(jQuery);

'use strict';
// $(document).ready(function() {
//     // Accordion
//     var all_panels = $('.templatemo-accordion > li > ul').hide();

//     $('.templatemo-accordion > li > a').click(function() {
//         console.log('Hello world!');
//         var target =  $(this).next();
//         if(!target.hasClass('active')){
//             all_panels.removeClass('active').slideUp();
//             target.addClass('active').slideDown();
//         }
//       return false;
//     });
//     // End accordion

//     // Product detail
//     $('.product-links-wap a').click(function(){
//       var this_src = $(this).children('img').attr('src');
//       $('#product-detail').attr('src',this_src);
//       return false;
//     });
//     $('#btn-minus').click(function(){
//       var val = $("#var-value").html();
//       val = (val=='1')?val:val-1;
//       $("#var-value").html(val);
//       $("#product-quantity").val(val);
//       return false;
//     });
//     $('#btn-plus').click(function(){
//       var val = $("#var-value").html();
//       val++;
//       $("#var-value").html(val);
//       $("#product-quantity").val(val);
//       return false;
//     });
//     $('.btn-size').click(function(){
//       var this_val = $(this).html();
//       $("#product-size").val(this_val);
//       $(".btn-size").removeClass('btn-secondary');
//       $(".btn-size").addClass('btn-dark');
//       $(this).removeClass('btn-dark');
//       $(this).addClass('btn-secondary');
//       return false;
//     });
//     // End roduct detail

// });
// var slider1 = document.getElementById("myRange1");
// var output1 = document.getElementById("demo1");
// output1.innerHTML = slider1.value;

// slider1.oninput = function() {
//   output1.innerHTML = this.value;
// }

// var slider2 = document.getElementById("myRange2");
// var output2 = document.getElementById("demo2");
// output2.innerHTML = slider2.value;

// slider2.oninput = function() {
//   output2.innerHTML = this.value;
// }
