@extends('layouts.base')

@section('main')
<div class="sub-wrap service-wrap">
    <div class="sub-top">
        <h2>
            SERVICE
        </h2>
        <p>
            코워커넷이 제공하는 다양한 맞춤형 솔루션을 소개합니다
        </p>
    </div>
    <div class="sub-tab container">
        <ul class="tab tab-3ea col-group">
            <li>
                <a href="{{ url('service') }}"><p class="en">WEB/MOBILE</p><p class="ko">웹/모바일</p></a>
            </li>
            <li class="is_on">
                <a href="{{ url('service2') }}"><p class="en">SI SOLUTION</p><p class="ko">SI 솔루션</p></a>
            </li>
            <li>
                <a href="{{ url('service3') }}"><p class="en">MAINTENANCE</p><p class="ko">유지보수</p></a>
            </li>
        </ul>
    </div>

    <div class="sub-con">
        <div class="container">
            <div class="subTitle"><p>SI SOLUTION</p></div>
            <p class="subTxt">공공SI서비스 구축, 맞춤형 비즈니스 모델 개발, 운영 및 유지보수</p>
            <div class="service-box col-group">
                <div class="box box06">
                    <p class="ti">System Integration</p>
                    <p>웹/모바일 서비스 구축,<br>
                        쇼핑몰/폐쇄몰 프로그램 등</p>
                </div>
                <div class="box box07">
                    <p class="ti">System Maintenance</p>
                    <p>SEO(search engine optimization),<br>
                        Design upgrade,Security Check</p>
                </div>
                <div class="box box08"> 
                    <p class="ti">Solution</p>
                    <p>정보포털 구축, 개인정보 암호화,<br>
                        웹표준/웹접근성 구축 및 개선 등</p>
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
    