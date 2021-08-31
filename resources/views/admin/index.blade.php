<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    
    
    <link rel="stylesheet" href="{{ asset('admin/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <title>코워커웹 관리자 페이지</title>
</head>
<body>
    <div id="wrap" class="login col-group">
        <div class="half"></div>
        <div class="half col-group">
            <div class="login-wrap">
                <img src="{{ asset('admin/images/admin-logo.svg') }}" alt="">
                <p>
                    Please log in or sign up for an account
                </p>
                <ul class="login-form">
                    <li>
                        <p>
                            Username
                        </p>
                        <input type="text" id="id">
                    </li>
                    <li>
                        <p>
                            Password
                        </p>
                        <input type="password" id="pwd">
                    </li>
                </ul>
                <a onclick="btn_login()">Log in</a>
            </div>

        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>

    <script>
        $("#pwd").on('keypress', function(e){
            if(e.keyCode == '13'){
                btn_login();
            }
        });
        
        function btn_login(){
            let id  = $("#id").val();
            let pwd = $("#pwd").val();
        
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "/adm/auth",
                type: "post",
                dataType: "json",
                data: {"id" : id, "pwd" : pwd}, 
                success: function(result){
                    if(result["success"]){
                        location.href = "{{ url('adm/contact') }}";
                    }else{
                        alert(result["msg"]);
                    }
                    
                }, error: function(result){
                    alert("에러가 발생했습니다.\n담당자에게 문의해주세요.");
                }
            });
        }
        </script>

</body>
</html>