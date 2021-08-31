<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div id="wrap" class="intro">
        <h1 class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/LOGO.svg') }}" alt="">
            </a>
        </h1>
        <h1 class="logo-m">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/LOGO-M.svg') }}" alt="">
            </a>
        </h1>
        <div class="menu-btn">
            <img src="{{ asset('images/MENU.svg') }}" alt="">
        </div>
        <div class="menu-wrap col-group">
            <ul class="col-group">
                <li>
                    <a href="{{ url('about') }}">
                        회사소개
                    </a>
                </li>
                <li>
                    <a href="{{ url('portfolio') }}">
                        포트폴리오
                    </a>
                </li>
                <li>
                    <a href="{{ url('service') }}">
                        서비스
                    </a>
                </li>
                <li>
                    <a href="{{ url('contact') }}">
                        제작견적
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu-wrap-bg"></div>
        <div class="intro-wrap col-group">
            <div class="intro-con intro-con-1 col-group">
                <div class="view col-group">
                    <h2>
                        ABOUT US
                    </h2>
                    <img src="{{ asset('images/PLUS.svg') }}" alt="">
                </div>
                <div class="view-more col-group">
                    <div class="view-focus col-group">
                        <h2>
                            ABOUT US
                        </h2>
                        <p>
                            고객 맞춤형 커스텀<br>
                            홈페이지 전문 제작 에이전시<br>
                            코워커웹을 소개합니다.<br>
                        </p>
                        <a href="{{ url('about') }}"><img src="{{ asset('images/PLUS.svg') }}" alt=""></a>
                    </div>
                    <div class="view-other col-group">
                        <p>A</p>
                        <p>B</p>
                        <p>O</p>
                        <p>U</p>
                        <p>T</p>
                        <p>&nbsp</p>
                        <p>U</p>
                        <p>S</p>
                    </div>
                </div>
            </div>
            <div class="intro-con intro-con-2 col-group">
                <div class="view col-group">
                    <h2>
                        PORTFOLIO
                    </h2>
                    <img src="{{ asset('images/PLUS.svg') }}" alt="">
                </div>
                <div class="view-more col-group">
                    <div class="view-focus col-group">
                        <h2>
                            PORTFOLIO
                        </h2>
                        <p>
                            코워커웹이 제작한<br>
                            홈페이지, 어플리케이션 등의<br>
                            제작물을 소개합니다.<br>
                        </p>
                        <a href="{{ url('portfolio') }}"><img src="{{ asset('images/PLUS.svg') }}" alt=""></a>
                    </div>
                    <div class="view-other col-group">
                        <p>P</p>
                        <p>O</p>
                        <p>R</p>
                        <p>T</p>
                        <p>F</p>
                        <p>O</p>
                        <p>L</p>
                        <p>I</p>
                        <p>O</p>
                    </div>
                </div>
            </div>
            <div class="intro-con intro-con-3 col-group">
                <div class="view col-group">
                    <h2>
                        SERVICE
                    </h2>
                    <img src="{{ asset('images/PLUS.svg') }}" alt="">
                </div>
                <div class="view-more col-group">
                    <div class="view-focus col-group">
                        <h2>
                            SERVICE
                        </h2>
                        <p>
                            코워커웹이 제공하는<br>
                            다양한 고객 맞춤형<br>
                            솔루션을 소개합니다<br>
                        </p>
                        <a href="{{ url('service') }}"><img src="{{ asset('images/PLUS.svg') }}" alt=""></a>
                    </div>
                    <div class="view-other col-group">
                        <p>S</p>
                        <p>E</p>
                        <p>R</p>
                        <p>V</p>
                        <p>I</p>
                        <p>C</p>
                        <p>E</p>
                    </div>
                </div>
            </div>
            <div class="intro-con intro-con-4 col-group">
                <div class="view col-group">
                    <h2>
                        CONTACT
                    </h2>
                    <img src="{{ asset('images/PLUS.svg') }}" alt="">
                </div>
                <div class="view-more col-group">
                    <div class="view-focus col-group">
                        <h2>
                            CONTACT
                        </h2>
                        <p>
                            고객 맞춤형 커스텀 <br>
                            홈페이지 전문 제작 에이전시<br>
                            코워커웹과 지금 함께하세요.<br>
                        </p>
                        <a href="{{ url('contact') }}"><img src="{{ asset('images/PLUS.svg') }}" alt=""></a>
                    </div>
                    <div class="view-other col-group">
                        <p>C</p>
                        <p>O</p>
                        <p>N</p>
                        <p>T</p>
                        <p>A</p>
                        <p>C</p>
                        <p>T</p>
                    </div>
                </div>
            </div>
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
    </script>
    <script>
        $(".intro-con").click(function(){
            $(".intro-con").addClass("acco");
            if( $(".intro-con").hasClass("acco") ) {
                $(".intro-con").children(".view").hide();
                $(".intro-con").children(".view-more").fadeIn(500);
                $(".intro-con").children(".view-more").children(".view-other").show();
                $(".intro-con").children(".view-more").children(".view-other").css("display","flex");
                $(".intro-con").children(".view-more").children(".view-focus").hide();
            }
            $(".intro-con").removeClass("onclick");
           
            $(this).addClass("onclick");
            if( $(this).hasClass("onclick") ) {
                $(this).children(".view-more").children(".view-focus").fadeIn(700);
                $(this).children(".view-more").children(".view-focus").css("display","flex");
                $(this).children(".view-more").children(".view-other").hide();
            }
        });
        $(".menu-btn").click(function(){
            $(this).toggleClass("close");
            
            var menu_wrap = $(".menu-wrap").width();

            if ( $(this).hasClass("close") ) {
                $(".menu-wrap").css("right", "0");
                $(this).children("img").attr("src", "{{ asset('images/CLOSE.svg') }}");
                $(".menu-wrap-bg").fadeIn(200);
            }
             else {
                $(".menu-wrap").css("right", 0 - menu_wrap);
                $(this).children("img").attr("src", "{{ asset('images/MENU.svg') }}");
                $(".menu-wrap-bg").fadeOut(200);
            }
        });
    </script>
</body>
</html>