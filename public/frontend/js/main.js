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


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
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


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });
    // Testimonials carousel
    $(".partners").owlCarousel({
        autoplay: true,
        slideTransition: 'linear',
        autoplaySpeed: 1000,
        autoplayHoverPause: true,
        items: 6,
        dots: false,
        loop: true,
        nav: false,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });

    
})(jQuery);

const creditBtn = document.getElementById("creditBtn");
  const achBtn = document.getElementById("achBtn");
  const creditDiv = document.getElementById("creditDiv");
  const achDiv = document.getElementById("achDiv");

    var position = window.location.pathname.split('/');
    $("#navbarCollapse a").each(function () {
        var $this = $(this);
        var pageUrl = $this.attr("href").split('/').pop();
        console.log(position[position.length - 1] , pageUrl);

        if (pageUrl) {
            if (position[position.length - 1] == pageUrl) {
                $(this).addClass("active");
                return false;
            }
            if (position[position.length - 1] == '') {
                $(this).addClass("active");
                return false;
            }
        }
    });

  // Event listeners for radio buttons
  creditBtn.addEventListener("change", function() {
    if (this.checked) {
      creditDiv.classList.remove("hidden");
      achDiv.classList.add("hidden");
    }
  });

  achBtn.addEventListener("change", function() {
    if (this.checked) {
      achDiv.classList.remove("hidden");
      creditDiv.classList.add("hidden");
    }
  });
