// Minimize aside sidebar
function toggleSidebar() {
    var element = document.getElementById("aside");
    element.classList.toggle("toggled");

    var element = document.getElementById("content");
    element.classList.toggle("toggled");

    var element = document.getElementById("subheader_pg");
    element.classList.toggle("toggled");
}

$(document).ready(function() {
    $("#carousel_cars").owlCarousel({
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,

        // "singleItem:true" is a shortcut for:
        items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
    });
});

// Make app full screen
var elem = document.getElementById("app");
function openFullscreen() {
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { /* Firefox */
        elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE/Edge */
        elem.msRequestFullscreen();
    }
}

// Print invoice function
$(function() {
    $(".document").find('.print').on('click', function() {
        $.print(".document");
    });
});
