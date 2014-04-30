Cufon.replace(".cufon");
Cufon.replace("h2,h3,h1");
Cufon.replace(".menu li a,.menu li.current a", {
        hover: true
});

var position = 1;
var slides = 3;


function next_slide() 
{
	    var obj = $('#slider ul.absolute_list');        
        if($(obj).is(':animated')==false)
        {
            if(window.position==window.slides)
            {
                window.position = 1;
                $('#slider .navigation li').removeClass('current');
                $('#slider .navigation li[rel="'+window.position+'"]').addClass('current');
                $(obj).animate({left:0},900);
                $('.arrow_right:hidden').fadeIn(1200);
                $('.arrow_left').fadeOut(1200);
            }
            else if(1==window.position) 
            {
                $('.arrow_right').click();
                
            }
            else
            {
                $('.arrow_right').click();
            }
                
            
        }
}
	



$(document).ready(function(){

    $('.fancy_run').fancybox();
    $('.works .fancybox').fancybox({
        type: "image"});
    $('.fancy').fancybox({type:'ajax'});
    
    $('.faq .quest').toggle(function(){
        $(this).next('.answer').stop(true,true).slideDown(500);
    },function(){
        $(this).next('.answer').stop(true,true).slideUp(500);
    });
    
    setInterval(next_slide, 8000) // использовать функцию
    
    $('.arrow_right').click(function(){
        var obj = $('#slider ul.absolute_list');
        var arrow = $(this);
        if($(obj).is(':animated')==false)
        {
            if(window.position<window.slides)
            {
                $(obj).animate({left:'-=878'},900);
                window.position++;
                $('#slider .navigation li').removeClass('current');
                $('#slider .navigation li[rel="'+window.position+'"]').addClass('current');
                if(window.slides==window.position) 
                {
                    $(arrow).fadeOut(1200);
                }
                else if('.arrow_left:hidden')
                {
                   $('.arrow_left').fadeIn(1200);
                }
            }
        }
    });
    
    $('.arrow_left').click(function(){
        var obj = $('#slider ul.absolute_list');
        var arrow = $(this);
        
        if($(obj).is(':animated')==false)
        {
            if(window.position>1)
            {
                $(obj).animate({left:'+=878'},900);
                window.position--;
                $('#slider .navigation li').removeClass('current');
                $('#slider .navigation li[rel="'+window.position+'"]').addClass('current');
                if(1==window.position) 
                {
                    $(arrow).fadeOut(1200);
                }
                else if('.arrow_right:hidden')
                {
                   $('.arrow_right').fadeIn(1200);
                }
            }
        }
    });
    
    $('#slider .navigation li').click(function(){
        var obj = $('#slider ul.absolute_list');
        if($(obj).is(':animated')==false)
        {
            var rel = $(this).attr('rel');            
            if(rel!=window.position)
            {
                window.position=rel;
                $('#slider .navigation li').removeClass('current');
                $('#slider .navigation li[rel="'+window.position+'"]').addClass('current');
                var scroll = -(window.position-1)*878;
                
                
                
                $(obj).animate({left:scroll},900);
                if(1==window.position) 
                {
                    $('.arrow_right:hidden').fadeIn(1200);                    
                    $('.arrow_left').fadeOut(1200);
                    
                }
                else if(window.position==window.slides)
                {
                    
                    $('.arrow_left:hidden').fadeIn(1200);
                   $('.arrow_right').fadeOut(1200);
                   
                }
                else
                {
                    $('.arrow_right:hidden').fadeIn(1200);
                    $('.arrow_left:hidden').fadeIn(1200);
                }
            }
        }
    });
    
    $('.left_part ul.menu li a').click(function(){
        var obj = $(this).parent('li');
        var href = $(this).attr('href');
  
        
        if(href=='javascript:void(0);')
        {
            if($(obj).attr('class')=='current_down')
            {
                if($(obj).find('ul').is(':animated')==false)
                { 
                     
                    $(obj).find('ul').slideUp(600);
                    $(obj).find('a').animate({paddingBottom:0},600,function(){
                        $(obj).removeClass('current_down');
                        Cufon.replace(".menu li a", { hover: true });
                    });
                }
                
            }
            else
            {
               
                if($(obj).find('ul').is(':animated')==false)
                {            
                    if($(obj).find('ul').is('ul'))
                    {
                        $(obj).addClass('current_down');
                        $(obj).find('ul').slideDown(600);
                        $(obj).find('a').animate({paddingBottom:6},300);
                    }
                }
            }
        } 
        
            
    }

    );
    
    
});