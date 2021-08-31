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
            <li>
                <a href="{{ url('service') }}"><p class="en">WEB/MOBILE</p><p class="ko">웹/모바일</p></a>
            </li>
            <li>
                <a href="{{ url('service2') }}"><p class="en">SI SOLUTION</p><p class="ko">SI 솔루션</p></a>
            </li>
            <li class="is_on">
                <a href="{{ url('service3') }}"><p class="en">MAINTENANCE</p><p class="ko">유지보수</p></a>
            </li>
        </ul>
    </div>
    <div class="sub-con">
        <div class="container">
            <div class="subTitle"><p>MAINTENANCE</p></div>
            <p class="subTxt">클라이언트 별 유지보수 플랜 제공, 빠르고 친절한 유지보수 사업부 운영</p>
            <div class="service-box col-group">
                <div class="box box09">
                    <p class="ti">디자인</p>
                    <p>이미지 수정(팝업, 배너, <br>
                        슬라이드 등),텍스트 변경 등</p>
                </div>
                <div class="box box10">
                    <p class="ti">프로그래밍</p>
                    <p>프로그램 추가 개발, 오류 점검, <br>
                        웹 표준, 웹 접근성 관리</p>
                </div>
                <div class="box box11"> 
                    <p class="ti">보안관리</p>
                    <p>개인 정보 보호 강화에 따른<br>
                        개인 정보 암호화 관리, 스팸 관리</p>
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
    