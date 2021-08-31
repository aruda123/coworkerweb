@extends('layouts.base')

@section('main')
<div class="sub-wrap port-detail-wrap">
    <div class="port-top">
        <div class="container txt-box">
            <span class="sub-title">
                {{ $portfolio->sub_title }}
            </span>
            <span class="main-title">
                {{ $portfolio->title }}
            </span>
            <span class="info">
                <pre>{{ $portfolio->content }}</pre>
            </span>
            <div class="port-btn col-group">
                <a href="{{ $portfolio->link }}" target="_blank">홈페이지 바로가기</a>
                <a href="{{ url('portfolio') }}">목록으로</a>
            </div>
        </div>
    </div>
    <div class="sub-con container">
        <img src="{{ asset('storage/upload') }}/{{ $portfolio->detail[0]->fn }}" alt="">
    </div>
    <div class="navigation container">
        @if (isset($prev))
            <a class="prev" href="{{ url("portfolio/$prev") }}">Prev</a>
        @endif
        @if (isset($next))
            <a class="next" href="{{ url("portfolio/$next") }}">Next</a>
        @endif
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $(".port-top").css({"background" : "url({{ asset('storage/upload') }}/{{ $portfolio->detail_back[0]->fn }}) no-repeat"});
    });
    $(window).scroll(function(){
        var scrolltop = $(window).scrollTop();
        var port_top = $(".port-top").height();
        if ( port_top <= scrolltop ) {
            $(".navigation").addClass("scroll");
        } else {
            $(".navigation").removeClass("scroll");
        }
    }); 
</script>
@endsection