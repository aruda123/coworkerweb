@extends('admin.layouts.base')

@section('main')
<?php
$service = explode(" | ", $contact->service);
?>
<div id="left_menu">
    <h1 class="logo">
        <a href="{{ url('adm/contact') }}">
            <img src="{{ asset('admin/images/LOGO3.svg') }}" alt="">
        </a>
    </h1>
    <ul class="menu-wrap">
        <li>
            <a href="{{ url('adm/contact') }}">
                견적문의
            </a>
        </li>
        <li>
            <a href="{{ url('adm/inquiry') }}">
                간편견적문의
            </a>
        </li>
        <li>
            <a href="{{ url('adm/portfolio') }}">
                포트폴리오
            </a>
        </li>
        <li>
            <a href="{{ url('adm/download') }}">
                회사소개서
            </a>
        </li>
    </ul>
</div>
<div id="content">
    <div id="top_menu" class="col-group">
        <ul class="menu-wrap">
            <li>
                <a href="{{ url('adm/logout') }}">
                    Log out
                </a>
            </li>
        </ul>
    </div>
    <div class="con-wrap">
        <div class="con-top col-group">
            <h2 class="con-title">
                견적문의
            </h2>
            <div class="con-btn">
                @if (isset($prev))
                    <button onclick="location.href='{{ url('adm/contact') }}/{{ $prev->id }}'">
                        이전글
                    </button>
                @endif

                <button onclick="location.href='{{ url('adm/contact') }}'">
                    목록으로
                </button>

                @if (isset($next))
                    <button onclick="location.href='{{ url('adm/contact') }}/{{ $next->id }}'">
                        다음글
                    </button>
                @endif
            </div>
        </div>
        <ul class="con-form contact-form">
            <li class="contact-form-list col-group">
                <div class="default">
                    문의 날짜
                </div>
                <div class="user">
                    <span>
                        {{ $contact->created_at->format("Y-m-d h:i") }}
                    </span>
                </div>
            </li>
            <li>
                <ul class="col-group half">
                    <li class="contact-form-list col-group">
                        <div class="default">
                            회사명
                            <span>*</span>
                        </div>
                        <div class="user">
                            <span>
                                {{ $contact->company_name }}
                            </span>
                        </div>
                    </li>
                    <li class="contact-form-list col-group">
                        <div class="default">
                            성명
                            <span>*</span>
                        </div>
                        <div class="user">
                            <span>
                                {{ $contact->name}}
                            </span>
                        </div>
                    </li>
                </ul>
                <ul class="col-group half">
                    <li class="contact-form-list col-group">
                        <div class="default">
                            연락처
                            <span>*</span>
                        </div>
                        <div class="user">
                            <span>
                                {{ $contact->phone }}
                            </span>
                        </div>
                    </li>
                    <li class="contact-form-list col-group">
                        <div class="default">
                            이메일
                            <span>*</span>
                        </div>
                        <div class="user">
                            <span>
                                {{ $contact->email }}
                            </span>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="contact-form-list">
                <div class="default">
                    제작구분을 선택해 주세요.
                </div>
                <div class="user">
                    <label for="1">
                        <input type="checkbox" id="1" {{ $contact->make_type == "신규제작" ? "checked" : "" }}>
                        신규제작
                    </label>
                    <label for="2">
                        <input type="checkbox" id="2" {{ $contact->make_type == "리뉴얼" ? "checked" : "" }}>
                        리뉴얼
                    </label>
                </div>
            </li>
            <li class="contact-form-list">
                <div class="default">
                    어떤 서비스를 원하십니까?
                </div>
                <div class="user">
                    <?php
                        $service1 = "";
                        $service2 = "";
                        $service3 = "";
                        $service4 = "";
                        for ($i = 0; $i < count($service); $i++) {
                            if($service[$i] == "웹사이트 제작(반응형)"){
                                $service1 = "checked";
                            }
                            if($service[$i] == "어플리케이션 제작"){
                                $service2 = "checked";
                            }
                            if($service[$i] == "SEO 최적화(검색엔진)"){
                                $service3 = "checked";
                            }
                            if($service[$i] == "유지보수"){
                                $service4 = "checked";
                            }
                        }
                    ?>
                    <label for="3">
                        <input type="checkbox" id="3" {{ $service1 }}>
                        웹사이트 제작(반응형)
                    </label>
                    <label for="4">
                        <input type="checkbox" id="4" {{ $service2 }}>
                        어플리케이션 제작
                    </label>
                    <label for="5">
                        <input type="checkbox" id="5" {{ $service3 }}>
                        SEO 최적화(검색엔진)
                    </label>
                    <label for="6">
                        <input type="checkbox" id="6" {{ $service4 }}>
                        유지보수
                    </label>
                </div>
            </li>
            <li>
                <ul class="half col-group">
                    <li class="contact-form-list col-group">    
                        <div class="default">
                            프로젝트 예산을 입력해 주세요.
                            <span>*</span>
                        </div>
                        <div class="user">
                            <span>
                                {{ $contact->price }}
                            </span>
                        </div>
                    </li>
                    <li class="contact-form-list col-group">
                        <div class="default">
                            오픈일정을 입력해 주세요.
                            <span>*</span>
                        </div>
                        <div class="user">
                            <span>
                                {{ $contact->open_date }}
                            </span>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="contact-form-list col-group">
                <div class="default">
                    제작에 참고하신 사이트의 주소를 입력해 주세요.
                    <span>*</span>
                </div>
                <div class="user">
                    <span>
                        {{ $contact->url }}
                    </span>
                </div>
            </li>
            <li class="contact-form-list file">
                <div class="default col-group">
                    
                    <p>
                        파일 업로드
                        <span class="guide">(PDF, ZIP max 50MB / 50MB가 넘는 파일의 경우에는 전화문의 부탁드립니다. 문의 : 1588-0409)</span>
                    </p>
                </div>
                <ul class="user col-group">
                    @if (count($contact->upload) > 0)
                        @foreach ($contact->upload as $file)
                            <input type="hidden" class="fn" value="{{ $file->fn }}">
                            <input type="hidden" class="fn_ori" value="{{ $file->fn_ori }}">
                            <li>
                                <button onclick="location.href='{{ url('adm/fileDownload') }}/{{ $file->fn }}/{{ $file->fn_ori }}'">
                                    <span>{{ $file->fn_ori }}</span>
                                    <img src="{{ asset('admin/images/file_download_black_24dp.svg') }}" alt="">
                                </button>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
            <li class="contact-form-list">
                <div class="default">
                    귀사의 프로젝트 설명 또는 문의사항을 기재해 주세요.
                </div>
                <div class="user">
                    <textarea name="" id="" cols="30" rows="10" placeholder="코워커웹에 전달하고자 하는 설명이나 문의사항이 있다면 내용을 기재해 주세요." readonly>{{ $contact->content != "" ? $contact->content : "문의사항이 없습니다." }}</textarea>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection