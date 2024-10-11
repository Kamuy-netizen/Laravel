(function ($) {

    "use strict";

    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $('.navbar').addClass('sticky-top');
        } else {
            $('.navbar').removeClass('sticky-top');
        }
    });

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });



})(jQuery);
function toggleDropdown() {
    var button = document.querySelector('.whatsapp-float');
    var items = document.querySelectorAll('.dropdown-item');

    button.classList.add('animate');
    setTimeout(function() {
        button.classList.remove('animate');
    }, 500);

    document.getElementById("dropdown-content").classList.toggle("show");

    items.forEach(function(item, index) {
        setTimeout(function() {
            item.classList.toggle('show');
        }, index * 100); // delay each item
    });
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.closest('.whatsapp-container')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }

        var items = document.querySelectorAll('.dropdown-item');
        items.forEach(function(item) {
            item.classList.remove('show');
        });
    }
}