@extends('layouts.base')

@section('main')
<div class="sub-wrap service-wrap">
    <div class="sub-top">
        <h2>
            SERVICE
        </h2>
        <p>
            코워커웹이 제공하는 다양한 맞춤형 솔루션을 소개합니다
        </p>
    </div>
    <div class="sub-tab container">
        <ul class="tab tab-3ea col-group">
            <li class="is_on">
                <a href="{{ url('service') }}"><p class="en">WEB/MOBILE</p><p class="ko">웹/모바일</p></a>
            </li>
            <li>
                <a href="{{ url('service2') }}"><p class="en">SI SOLUTION</p><p class="ko">SI 솔루션</p></a>
            </li>
            <li>
                <a href="{{ url('service3') }}"><p class="en">MAINTENANCE</p><p class="ko">유지보수</p></a>
            </li>
        </ul>
    </div>
    <div class="sub-con">
        <div class="container">
            <div class="subTitle"><p>WEB SERVICE</p></div>
            <p class="subTxt">UI/UX 디자인, 인터랙션 디자인, 고객맞춤형 프로그래밍 솔루션</p>
            <div class="service-box col-group">
                <div class="box box01">
                    <p class="ti">웹표준</p>
                    <p>Cross browsing<br>
                        다양한 브라우저와 OS에서의 통일성</p>
                </div>
                <div class="box box02">
                    <p class="ti">웹접근성</p>
                    <p>모든 사용자, 모든 환경에서<br>
                        동일한 서비스를 제공</p>
                </div>
                <div class="box box03"> 
                    <p class="ti">반응형웹</p>
                    <p>다양한 디바이스에 맞춰<br>
                        최적화된 UI/UX 제공</p>
                </div>
            </div>
        </div>
    </div>        
    
    <div class="sub-con">
        <div class="container">
            <div class="subTitle"><p>MOBILE SERVICE</p></div>
            <p class="subTxt">UI/UX 디자인, 모바일 웹, 모바일 앱, 모바일 웹/앱 프로그래밍</p>
            <div class="service-box col-group">
                <div class="box box04">
                    <p class="ti">모바일웹</p>
                    <p>다양한 기종과 브라우저환경에<br>
                        최적화된 화면 구성</p>
                </div>
                <div class="box box05">
                    <p class="ti">모바일앱</p>
                    <p>앱기획에서 제작, 등록까지<br>
                        전과정을 함께 진행</p>
                </div>
            </div>
        </div>
    </div>    
    <div class="sub-con process-bg">
        <div class="container">
            <div class="subTitle"><p>PROCESS</p></div>
            <p class="subTxt">코워커웹의 WEB/MOBILE 홈페이지 제작은 이렇게 진행됩니다.</p>
            <div class="process-box col-group">
                <div class="box box01">
                    <p class="num">01</p>
                    <p class="ti">가이드북 제시</p>
                    <p>고객이 제작과정을<br>
                        쉽게 이해할 수 있도록<br>
                        가이드북 제시 </p>
                </div>
                <div class="box box02">
                    <p class="num">02</p>
                    <p class="ti">레퍼런스 사이트 조사</p>
                    <p>고객이 원하는 방향의<br>
                        제작을 위한 참고<br>
                        사이트 조사</p>
                </div>
                <div class="box box03">
                    <p class="num">03</p>
                    <p class="ti">기획 및 디자인</p>
                    <p>레퍼런스 사이트를<br>
                        바탕으로 홈페이지<br>
                        기획 및 UI/UX 디자인</p>
                </div>
                <div class="box box04">
                    <p class="num">04</p>
                    <p class="ti">검수 및 퍼블리싱</p>
                    <p>고디자인에 대한 검수<br>
                        및 수정작업 후<br>
                        퍼블리싱 작업 진행</p>
                </div>
                <div class="box box05">
                    <p class="num">05</p>
                    <p class="ti">개발 및 디버깅</p>
                    <p>홈페이지 제작에 필요한<br>
                        프로그램 개발 및<br>
                        디버깅 체크</p>
                </div>
                <div class="box box06">
                    <p class="num">06</p>
                    <p class="ti">유지보수</p>
                    <p>홈페이지에 대한<br>
                        디자인/퍼블리싱<br>
                        유지보수 서비스</p>
                </div>
            </div>
            <div class="process-box m">
                <div class="box box01 col-group">
                    <p class="num">01</p>
                    <div class="img-box">
                        <img src="./images/sub/icon_process_01.png" alt="">
                    </div>
                    <div class="txt-box">
                        <p class="ti">가이드북 제시</p>
                        <p>고객이 제작과정을<br>
                            쉽게 이해할 수 있도록<br>
                            가이드북 제시
                        </p>
                    </div>
                </div>
                <div class="box box02 col-group">
                    <p class="num">02</p>
                    <div class="img-box">
                        <img src="./images/sub/icon_process_02.png" alt="">
                    </div>
                    <div class="txt-box">
                        <p class="ti">레퍼런스 사이트 조사</p>
                        <p>고객이 원하는 방향의<br>
                            제작을 위한 참고<br>
                            사이트 조사</p>
                    </div>
                </div>
                <div class="box box03 col-group">
                    <p class="num">03</p>
                    <div class="img-box">
                        <img src="./images/sub/icon_process_03.png" alt="">
                    </div>
                    <div class="txt-box">
                        <p class="ti">기획 및 디자인</p>
                        <p>레퍼런스 사이트를<br>
                            바탕으로 홈페이지<br>
                            기획 및 UI/UX 디자인</p>
                    </div>
                </div>
                <div class="box box04 col-group">
                    <p class="num">04</p>
                    <div class="img-box">
                        <img src="./images/sub/icon_process_04.png" alt="">
                    </div>
                    <div class="txt-box">
                        <p class="ti">검수 및 퍼블리싱</p>
                        <p>디자인에 대한 검수<br>
                            및 수정작업 후<br>
                            퍼블리싱 작업 진행</p>
                    </div>
                </div>
                <div class="box box05 col-group">
                    <p class="num">05</p>
                    <div class="img-box">
                        <img src="./images/sub/icon_process_05.png" alt="">
                    </div>
                    <div class="txt-box">
                        <p class="ti">개발 및 디버깅</p>
                        <p>홈페이지 제작에 필요한<br>
                        프로그램 개발 및<br>
                        디버깅 체크</p>
                    </div>
                </div>
                <div class="box box06 col-group">
                    <p class="num">06</p>
                    <div class="img-box">
                        <img src="./images/sub/icon_process_06.png" alt="">
                    </div>
                    <div class="txt-box">
                        <p class="ti">유지보수</p>
                        <p>홈페이지에 대한<br>
                            디자인/퍼블리싱<br>
                            유지보수 서비스</p>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection

@section('inquiry')
<div id="inquiry">
    @include('layouts.inquiry')
</div>
<div id="inquiry-call">
    @include('layouts.inquiry-call')
</div>
@endsection
