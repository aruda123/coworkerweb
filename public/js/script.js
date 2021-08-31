$(document).ready(function(){
        $(".menu-btn").click(function(){
            var v_w = $(window).width();
            if( v_w <= 768 ) {
                $(this).toggleClass("close");

                var menu_wrap = $(".menu-wrap").width();

                if ( $(this).hasClass("close") ) {
                    $(".menu-wrap").css("right", "0");
                    $(this).children("img").attr("src", "./images/CLOSE.svg");
                    $(".inquiry-wrap").css("z-index", "99");
                }
                else {
                    $(".menu-wrap").css("right", 0 - menu_wrap);
                    $(this).children("img").attr("src", "./images/MENU.svg");
                    $(".inquiry-wrap").css("z-index", "9999");
                }
               
            } else {
                $(".menu-wrap").toggleClass("hide");
                if( $(".menu-wrap").hasClass("hide") ) {
                    $(".menu-btn").children("img").attr("src","./images/MENU_ON.svg")
                } else {
                    $(".menu-btn").children("img").attr("src","./images/MENU.svg");

                }
            }
            
        });
        
        $(window).scroll(function(){
            var scrolltop = $(window).scrollTop();
            var sub_top = $(".sub-wrap .sub-top").height();
            if ( sub_top <= scrolltop ) {
                $("#header").addClass("scroll");
            } else {
                $("#header").removeClass("scroll");
            }
        }); 
    
    

        $(".inquiry-btn").click(function(){
            $(this).parent(".inquiry-wrap").toggleClass("open");

            if ( $(this).parent(".inquiry-wrap").hasClass("open") ) {
                $(".inquiry-bg").fadeIn(200);
            } else {
                $(".inquiry-bg").fadeOut(200);
            }
        });
        $(".inquiry-box .close").click(function(){
            $(".inquiry-wrap").removeClass("open");
             $(".inquiry-bg").fadeOut(200);
        });
        $(".contact-btn").click(function(){
            $(".inquiry-wrap").removeClass("open");
            $(".inquiry-check").show();
        });
        $(".inquiry-check button").click(function(){
            $(".inquiry-check").hide();
            $(".inquiry-bg").hide();
        });
        $(".inquiry-check .close").click(function(){
            $(".inquiry-check").hide();
            $(".inquiry-bg").hide();
        });

        $(".inquiry-call-btn").click(function(){
            $(".inquiry-call-wrap").toggleClass("open");
        });
        
    $(document).mouseup(function (e){
        var LayerPopup = $("#agree_more");
        $(".agree-more-btn button").click(function(){
            $(LayerPopup).toggleClass("show");
        });
        if(LayerPopup.has(e.target).length === 0){
            e.preventDefault();
            LayerPopup.removeClass("show");
        }
    });
});