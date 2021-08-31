<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!---favicon--->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#49d6d5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>COWORKERWEB</title>
</head>
<body>
    <header id="header">
        @include('layouts.header')
    </header>

    <div id="wrap">
        @yield('main')
    </div>

    @yield('inquiry')

    <footer id="footer">
        @include('layouts.footer')
    </header>

    <div id="loading">
        <div>
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
            <div>NOW LOADING</div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $(".menu-btn").click(function(){
                var v_w = $(window).width();
                if( v_w <= 768 ) {
                    $(this).toggleClass("close");

                    var menu_wrap = $(".menu-wrap").width();

                    if ( $(this).hasClass("close") ) {
                        $(".menu-wrap").css("right", "0");
                        $(this).children("img").attr("src", "{{ asset('images/CLOSE.svg') }}");
                        $(".inquiry-wrap").css("z-index", "99");
                    }
                    else {
                        $(".menu-wrap").css("right", 0 - menu_wrap);
                        $(this).children("img").attr("src", "{{ asset('images/MENU.svg') }}");
                        $(".inquiry-wrap").css("z-index", "9999");
                    }
                
                } else {
                    $(".menu-wrap").toggleClass("hide");
                    if( $(".menu-wrap").hasClass("hide") ) {
                        $(".menu-btn").children("img").attr("src","{{ asset('images/MENU_ON.svg') }}")
                    } else {
                        $(".menu-btn").children("img").attr("src","{{ asset('images/MENU.svg') }}");

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
            // $(".contact-btn").click(function(){
            //     $(".inquiry-wrap").removeClass("open");
            //     $(".inquiry-check").show();
            // });
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

        $(document).ajaxStart(function(){
            $("#loading").addClass("show");
        });

        $(document).ajaxStop(function(){
            $("#loading").removeClass('show');
        })

    </script>

    @yield('script')

</body>
</html>