$(document).ready(function() {

    if($('#nav-top-menu').offset().top >= 250) {
        $('#nav-top-menu').addClass('fixed');
        $('.predictive_results').addClass('fixedSearch');
        if ($.cookie('closeTopLine')!='true') {
            $('.topLine').show();
        }
    }
    
/*    $('.mainSubCats').each(function(){
    var i = 0;
        $(this).find('li').each(function(){
            i=i+1;
            if(i > 5) {
                if(i == 6) {                    
                    $(this).parent().parent().append('<li class="moreMenu"><span>Еще</span></li>');                    
                }
                $(this).parent().parent().find('.openTogMenu').show();
                $(this).parent().parent().find('.togMenu').append($(this));
            }
        });
    });
*/

    $('.moreMenu span').click(function(){
        console.log('dd');
        $(this).parent().prev().toggleClass("active");
    });

    $(window).scroll(function(event) {
        var y = $(this).scrollTop();        
        if (y >= 100) {            
            $('#nav-top-menu').addClass('fixed');
            $('.predictive_results').addClass('fixedSearch');
            if ($.cookie('closeTopLine')!='true') {
                $('.topLine').show();
            } else { $('#nav-top-menu').addClass('mambo'); }
        } else {            
            $('#nav-top-menu').removeClass('fixed');
            $('.predictive_results').removeClass('fixedSearch');
            if ($.cookie('closeTopLine')!='true') {
                $('.topLine').hide();
            } else { $('#nav-top-menu').addClass('mambo'); }
        }        
    });

    $('.closeTopLine').click(function(){
        if (!$.cookie('closeTopLine')) {
            $.cookie('closeTopLine', true, { expires: 365, path: '/' })
            $(this).parent().parent().parent().hide();
            $('#nav-top-menu').addClass('mambo');
        }                           
    });
    $('.searchButton span').click(function(){
        $('.searchBox').toggleClass("active");
        $('#pp_course_2').delay( 800 ).focus();
    });

    $('.ajax_search_content .result_row').click(function(){
        $(".searchBox").removeClass('active');
    });

    $(document).keyup(function (e) {
        if ($(".ctr_search input").is(":focus") && (e.keyCode == 13)) {
            $(".searchBox").removeClass('active');
            $(".predictive_results").hide();
        }
    });

    $(document).mouseup(function (e){ // событие клика по веб-документу
        var div = $(".searchBox"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            div.removeClass('active'); // скрываем его
        }
    });

    $('.mainBlogBlockMenu li span').click(function(){
        $('.mainBlogBlockMenu li span').removeClass('active');
        $('.bblock').removeClass('active');
        $(this).addClass('active');
        $('#'+$(this).attr('rel')).addClass('active');
    });
    
    
});