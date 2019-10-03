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
