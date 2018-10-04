$(document).ready(function() {
    ///#Event binding and resizing
    var ref_tile = $('#ref_tile');
    $(".tile").height(ref_tile.width());
    $(".carousel").height(ref_tile.width());
    $(".item").height(ref_tile.width());

    $(window).resize(function() {
        if (this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
        }, 10);
    });

    $(window).bind('resizeEnd', function() {
        $(".tile").height(ref_tile.width());
        $(".carousel").height(ref_tile.width());
        $(".item").height(ref_tile.width());
    });

});