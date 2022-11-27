jQuery(function($) {
    // init Masonry
    var $grid = $('.bm-masonry-grid').masonry({
        // options
        itemSelector: '.bm-masonry-item',
       
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.masonry('layout');
    });
});