/* --------------------------------------------
  DOCUMENT.READY
--------------------------------------------- */
$(document).ready(function(){


    $('#fullpage').fullpage({
        fixedElements: '#nav, #fixed-content',
        autoScrolling:true,
        scrollHorizontally: true,
        controlArrows: false,
        loopHorizontal: false,
        slidesNavigation: true,
        responsiveWidth:600,
        responsiveHeight: 600,
        responsiveSlides: true
    });

    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:30,
        nav:false,
        stagePadding: 20,
        autoWidth:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });


    $("body").imagesLoaded(function(){
        $("#loader3").fadeOut();
        $("#loader-overflow").delay(200).fadeOut(700);
    });

    if($('#type.selectpicker').val()!==""){
        fetchLeadDropdowns($('#type.selectpicker').val());
    }

    $('#type.selectpicker').on('change', function () {
       fetchLeadDropdowns($(this).val());
    });

    $('#segment.selectpicker').on('change', function () {
        hideFormBySegments($(this).val());
    });

    $('#screens.selectpicker').on('change', function () {

        if($(this).val()==1){
            $('#screens_qty').prop("disabled", false);
        }
        else{
            $('#screens_qty').prop("disabled", true);
        }
    });

    $('#xef_soft_stock.selectpicker').on('change', function () {
        if($(this).val()==-1){
            $('#xef_soft_stock_other').prop("disabled", false);
        }
        else{
            $('#xef_soft_stock_other').prop("disabled", true);
        }
    });

    $('#xef_soft_staff.selectpicker').on('change', function () {

        if($(this).val()==-1){
            $('#xef_soft_staff_other').prop("disabled", false);
        }
        else{
            $('#xef_soft_staff_other').prop("disabled", true);
        }
    });

    $('#xef_soft_book.selectpicker').on('change', function () {

        if($(this).val()==-1){
            $('#xef_soft_book_other').prop("disabled", false);
        }
        else{
            $('#xef_soft_book_other').prop("disabled", true);
        }
    });

    $('#xef_soft_erp.selectpicker').on('change', function () {

        if($(this).val()==-1){
            $('#xef_soft_erp_other').prop("disabled", false);
        }
        else{
            $('#xef_soft_erp_other').prop("disabled", true);
        }
    });


    /* --------------------------------------------
      EQUAL HEIGHTS
    --------------------------------------------- */
    //init equal height
    $('.equal-height').equalHeights();

    /* --------------------------------------------
      SCROLL TO TOP
    --------------------------------------------- */
    // hide #back-top first
    $("#back-top").hide();

    // fade in #back-top
    $(function () {
        windowT.scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });

    /* --------------------------------------------
      TOGGLE
    --------------------------------------------- */
    $('.toggle-view-custom li').click(function () {

        var text = $(this).children('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('10');
            $(this).children('.ui-accordion-header').addClass('ui-accordion-header-active');
        } else {
            text.slideUp('10');
            $(this).children('.ui-accordion-header').removeClass('ui-accordion-header-active');
        }

    });



    /* --------------------------------------------
      JS NOT FOR MOBILE (PARALLAX, OPACITY SCROLL)
    --------------------------------------------- */
    if( mobileDetect == false ) {
        /* --------------------------------------------
          OPACITY SCROLL
        --------------------------------------------- */
        if ( $('.opacity-scroll2').length ){
            windowT.on('scroll', function() {
                $('.opacity-scroll2').css('opacity', function() {
                    return 1 - ((windowT.scrollTop() / windowT.height())*1.5);
                });
            });
        };

        /* --------------------------------------------
          PARALLAX
        --------------------------------------------- */
        if ( $('.parallax-section').length ){
            $.stellar({
                horizontalScrolling: false,
            });
        };

    }//END JS NOT FOR MOBILE




    // ACCORDION
    var accordPanels = $(".accordion > dd").hide();

    accordPanels.first().slideDown("easeOutExpo");
    $(".accordion > dt > a").first().addClass("active");

    $(".accordion > dt > a").click(function(){

        var current = $(this).parent().next("dd");
        $(".accordion > dt > a").removeClass("active");
        $(this).addClass("active");
        accordPanels.not(current).slideUp("easeInExpo");
        $(this).parent().next().slideDown("easeOutExpo");

        return false;

    });

    // TOGGLE
    $(".toggle > dd").hide();

    $(".toggle > dt > a").click(function(){

        if ($(this).hasClass("active")) {

            $(this).parent().next().slideUp("easeOutExpo");
            $(this).removeClass("active");

        }
        else {
            var current = $(this).parent().next("dd");
            $(this).addClass("active");
            $(this).parent().next().slideDown("easeOutExpo");
        }

        return false;
    });

    /* --------------------------------------------
      FUNCTIONS
    --------------------------------------------- */
    initMenu();
    initLeftMenu();

    if ( $('#nav').length ){
        initAffixCheck();
    };


    if ( $('.wow').length ){
        initWow();
    };
    if ( $('#nav-stick2').length ){
        initNavStick2();
    };

    //WINDOW RESIZE
    windowT.resize(function() {
        $('.equal-height').css('height','auto').equalHeights();
        if ( $('#nav').length ){
            initAffixCheck();
        };
        initLeftMenu();
    });

    //WINDOW WIDTH CHANGE
    var widthWin = windowT.width();
    windowT.resize(function(){
        if($(this).width() != widthWin){
            widthWin = $(this).width();
            initLeftMenu();
        }
    });

});

/* --------------------------------------------
  HEADER MENU
--------------------------------------------- */
function initMenu() {
    var $       = jQuery,
        body    = $('body'),
        primary = '#main-menu';

    $(primary).find('.parent > a .open-sub, .megamenu .title .open-sub').remove();

    $(primary).find('.parent > a, .megamenu .title').append('<span class="open-sub"></span>');

    $(primary).on('click','.open-sub', function(event){
        event.preventDefault();

        var item = $(this).closest('li, .box');

        if ($(item).hasClass('active')) {
            $(item).children().last().slideUp(150);
            $(item).removeClass('active');
        } else {
            var li = $(this).closest('li, .box').parent('ul, .sub-list').children('li, .box');

            if ($(li).is('.active')) {
                $(li).removeClass('active').children('ul').slideUp(150);
            }

            $(item).children().last().slideDown(150);
            $(item).addClass('active');
        }
    });

    $(primary).find('.parent > a').click(function(event){
        if ((body.width()  > 979) &&  (navigator.userAgent.match(/iPad|iPhone|Android/i))) {
            var link = $(this);

            if (link.parent().hasClass('open')) {
                link.parent().removeClass('open'),
                    event.preventDefault();
            } else {
                event.preventDefault();
                link.parent().addClass('open')
            }
        }
    });

}

/* --------------------------------------------
  PLATFORM DETECT
--------------------------------------------- */

var htmlT    = $('html'),
    windowT    = $(window),
    ieDetect = false,
    mobileDetect = false,
    ua = window.navigator.userAgent,
    old_ie = ua.indexOf('MSIE '),
    new_ie = ua.indexOf('Trident/');

if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)) {
    mobileDetect = true;
    htmlT.addClass('mobile');
} else {
    htmlT.addClass('no-mobile');
};

//IE Detect
if ((old_ie > -1) || (new_ie > -1)) {
    ieDetect = true;
}


function fetchLeadDropdowns(value){
    $.ajax({
        url: '/lead/fetchTypeSegments',
        method: "POST",
        data:{
            value: value,
            _token: $('input[name="_token"]').val(),
        },
        success:function(result){
            $('#segment').html(result);
            $('#segment.selectpicker').selectpicker('refresh');

            if($("#oldSegment").val()!==""){
                $('select[name=segment]').val($("#oldSegment").val());
                $('#segment.selectpicker').selectpicker('refresh');
                hideFormBySegments($("#oldSegment").val());
            }
        }
    });
}

function hideFormBySegments(value){
    $(".bool-fields .container").hide();
    $(".bool-fields .container."+value).show();
    $(".bool-fields .container.submitContainer").show();
}

/* --------------------------------------------
  FIXED HEADER ON - OFF
--------------------------------------------- */
function initAffixCheck(){
    var navAffix = $('#nav');

    //FIXED HEADER ON
    navAffix.affix({
        offset: { top: 1, }
    });

    if((windowT.width() < 1025) && (!$('#nav').hasClass('affix-on-mobile')) ) {
        //FIXED HEADER OFF
        windowT.off('.affix');
        navAffix.removeData('bs.affix').removeClass('affix affix-top affix-bottom');
    };

    if ($('#nav').hasClass('affix-on-mobile')) {
        $(".nav.navbar-nav").css("max-height", $(window).height() - $(".logo-row").height() - 20 + "px");
    }

};

/* --------------------------------------------
  HEADER LEFT MENU
--------------------------------------------- */
function initLeftMenu(){
    var hlNav = $('#header-left-nav');

    if((windowT.width() < 1025) ) {
        hlNav.removeClass('in')
    }
    if((windowT.width() > 1024) && (!hlNav.hasClass('in')) ) {
        hlNav.addClass('in')
    }

};

/* --------------------------------------------
  WOW ANIMATE
--------------------------------------------- */
function initWow(){
    var wow = new WOW( { mobile: false, } );
    wow.init();
}




//NAV STICK 2 MENU-------------------------------------------------------------------
function initNavStick2(){

    $(window).scroll(function(){

        if ($(window).scrollTop() > 10) {
            $("#nav-stick2").removeClass("transparent").addClass("has-bg");
        }
        else {
            $("#nav-stick2").addClass("transparent").removeClass("has-bg");
        }

    });
};
