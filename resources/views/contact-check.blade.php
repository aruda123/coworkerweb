@extends('layouts.base')

@section('main')
<div class="sub-wrap contact-wrap">
    <div class="sub-top">
        <h2>
            CONTACT
        </h2>
        <p>
            미래 파트너로 코워커웹을 고려해 주셔서 감사합니다. 아래 양식을 작성해 주시면 빠르게 연락 드리겠습니다.
        </p>
    </div>
    <div class="sub-con contact-check container col-group">
        <img src="{{ asset('images/done_blue.svg') }}" alt="">
        <h2>
            <span>견적문의</span>가 정상적으로 제출되었습니다
        </h2>
        <p>
            귀사의 <strong>미래 파트너</strong>로 코워커웹을 고려해 주셔서<br>
            다시 한 번 감사드립니다.<br>
            양식을 작성해주신 날부터<br>
            <strong>24시간 이내에 연락</strong> 드리겠습니다.
        </p>
        <button onclick="location.href='{{ url('/') }}'">
            확인
        </button>
    </div>
</div>
@endsection
    