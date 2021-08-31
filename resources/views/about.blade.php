@extends('layouts.base')

@section('main')
<div class="sub-wrap about-wrap">
    <div class="sub-top">
        <h2>
            ABOUT US
        </h2>
        <p>
            전문 커스텀 에이전시 코워커웹을 소개합니다
        </p>
    </div>
    <div class="sub-con">
        <div class="container">
            <img class="about-line" src="{{ asset('images/about-line.png') }}" alt="">
            <img class="about-line-m" src="{{ asset('images/LINE-m.svg') }}" alt="">
            <div class="sub-con-1 col-group">
                <div class="grad-box">
                    <img src="{{ asset('images/about-1.png') }}" alt="">
                </div>
                <div class="txt-box">
                    <span>
                        WHO ARE WE?
                    </span>
                    <h4>
                        전문 커스텀 에이전시
                    </h4>
                    <h2>
                        COWORKERWEB
                    </h2>
                    <p>
                        코워커웹은 전문 커스텀 홈페이지 제작 에이전시로<br>
                        다양한 플렛폼(반응형 홈페이지, 어플리케이션) 제작을 통해<br>
                        기업의 성공적인 사업을 지원합니다.
                    </p>
                </div>
            </div>
            <div class="sub-con-2 col-group">
                <div class="txt-box">
                    <span>
                        how different?
                    </span>
                    <h4>
                        고객 맞춤형 솔루션 제공
                    </h4>
                    <h2>
                        COWORKERWEB
                    </h2>
                    <p>
                        템플릿을 사용하여 공장에서 찍어낸 듯한<br>
                        홈페이지를 제작하지 않고, 클라이언트의 요구사항을 반영하여<br>
                        맞춤형 커스텀 홈페이지를 제작해 드립니다.<br>
                        그리고 전문지식정보채용 플랫폼 '코워커'를 직접 운영중인 만큼<br> 
                        다양한 제작 및 운영에 대한 노하우를 가지고 있습니다.
                    </p>
                </div>
                <div class="grad-box">
                    <img src="{{ asset('images/about-2.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="sub-con-3 map col-group">
            <div class="map-box">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d790.0659736158716!2d126.91495692928225!3d37.61947989873677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9781240f7a0d%3A0x769fd6ccfadb196a!2z7ISc7Jq47Yq567OE7IucIOydgO2Pieq1rCDqsIjtmIQy64-ZIOqwiO2YhOuhnCAyNTEtMQ!5e0!3m2!1sko!2skr!4v1628754585054!5m2!1sko!2skr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="txt-box">
                <span>
                    HOW TO COME
                </span>
                <h4>
                    <img src="{{ asset('images/location.svg') }}" alt="">
                    서울특별시 은평구 갈현로 251-1번지
                </h4>
                <h2>
                    <img src="{{ asset('images/support.svg') }}" alt="">
                    1588-0409
                </h2>
                <ul>
                    <li>
                        <span>버스</span>선일여고 정류장 간선 7613, 7722, 8774
                    </li>
                    <li>
                        <span>지하철</span>연신내역 3,6호선 6번출구 도보 5분
                    </li>
                </ul>
                @if (isset($file))
                    <a href="{{ url('fileDownload') }}/{{ $file->fn }}/{{ $file->fn_ori }}" style="cursor: pointer">
                        회사소개서 다운로드
                        <img src="{{ asset('images/file_download.svg') }}" alt="">
                    </a>
                @endif
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
