@extends('layouts.base')

@section('main')
<div class="sub-wrap port-wrap">
    <div class="sub-top">
        <h2>
            PORTFOLIO
        </h2>
        <p>
            코워커웹이 제작한 홈페이지,어플리케이션 등의 작업물을 소개합니다
        </p>
    </div>
    <div class="sub-con container">
        <ul class="port-list col-group">
            @if (count($portfolio) > 0)
                @foreach ($portfolio as $item)
                    <li>
                        <a href="{{ url("portfolio/$item->id") }}">
                            <div class="img-box">
                                <img src="{{ asset('storage/upload') }}/{{ $item->thumbnail[0]->fn }}" alt="">
                            </div>
                            <div class="hover-box">
                                <span class="sub-title">
                                    {{ $item->sub_title }}
                                </span>
                                <span class="main-title">
                                    {{ $item->title }}
                                </span>
                                <span class="info">
                                    <pre>{{ $item->content }}</pre>
                                </span>
                            </div>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="pagination col-group">
            {{ $portfolio->links() }}
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
   