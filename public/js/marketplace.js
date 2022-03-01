jQuery(function($){
    $('.dropdown-toggle').dropdown();
    $('.menu-bar-left').on("click", function(e){
        $('body').addClass('pop-open');
        $('.left-sidebar').addClass('open');
    });
    $('.close-icon-left, .custom-overlay').on("click", function(e){
        $('body').removeClass('pop-open');
        $('.left-sidebar').removeClass('open');
    });
    $('.dropdown-item').on("click", function(e){
        var me = $(this);
        var parent = me.parent();
        var parentBtnId = parent.attr("aria-labelledby");
        var btnhandler = $("#" + parentBtnId);
        
        btnhandler.text(me.text()).attr("data-selected", me.attr('data-value'));

    });
    $(".left-sidebar .parent-menu-item").on('click',function(e){
        var target = $(this).attr("data-target");
        $(target).addClass("active");
        $(".left-sidebar .list-group:first-child").addClass("translated-left-x-100");
    });
    $(".left-sidebar .parent-menu .back-btn").on('click',function(e){

        $(".left-sidebar .parent-menu.active").removeClass("active");
        $(".left-sidebar .list-group:first-child").removeClass("translated-left-x-100");
    });

    
    /* $(document).find(".mask").inputmask(); */
    
});