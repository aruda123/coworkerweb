<!DOCTYPE html>
@extends('admin.layouts.base')

@section('main')
<div id="left_menu">
    <h1 class="logo">
        <a href="{{ url('adm') }}">
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
                포트폴리오
            </h2>
            <div class="con-btn">
                @if (isset($prev))
                    <button onclick="location.href='{{ url('adm/portfolio') }}/{{ $prev }}'">
                        이전글
                    </button>
                @endif
                <button onclick="location.href='{{ url('adm/portfolio') }}'">
                    목록으로
                </button>
                @if (isset($next))
                    <button onclick="location.href='{{ url('adm/portfolio') }}/{{ $next }}'">
                        다음글
                    </button>
                @endif
            </div>
        </div>
        <ul class="con-form contact-form port-form">
            <li class="contact-form-list col-group">
                <div class="default">
                    소제목 (구분)
                </div>
                <div class="user">
                    <input type="text" placeholder="예) Responsive Web, Mobile Web, Application" id="sub_title" value="{{ $portfolio->sub_title }}">
                </div>
            </li>
            <li class="contact-form-list col-group">
                <div class="default">
                    대제목 (업체명)
                </div>
                <div class="user">
                    <input type="text" placeholder="업체이름을 입력해 주세요" id="title" value="{{ $portfolio->title }}">
                </div>
            </li>
            <li class="contact-form-list file">
                <div class="default">
                    썸네일 업로드 <span class="guide">(최소 400*400px 정방형 업체 로고가 잘 보이는 베너화면으로 등록해 주세요.)</span>
                </div>
                <div class="user">
                    <div class="file-upload-wrap" id="thumbnail_drop">
                        <ul class="file-upload-list" id="thumbnail_ul" style="display: {{ count($portfolio->thumbnail) > 0 ? 'block' : 'none' }}">
                            @if (count($portfolio->thumbnail) > 0)
                                @foreach ($portfolio->thumbnail as $img)
                                    <li class='col-group thumbnail_img_li'>
                                        <input type="hidden" class="thumbnail_fn_ori" value="{{ $img->fn }}">
                                        <span>{{ $img->fn_ori }}</span>
                                        <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='thumbnail_img_del' data-type='ori'>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <span class="file-drop">
                            <span id="thumbnail_span" style="display: {{ count($portfolio->thumbnail) > 0 ? 'none' : 'block' }}">파일을 이곳에 드래그 하거나
                                <label for="thumbnail_file">파일찾기</label> 를 눌러 이미지를 등록해주세요.
                            </span>
                            <input type="file" id="thumbnail_file" onchange="file_change('thumbnail');" multiple accept="image/*"/>
                        </span>
                    </div>
                </div>
            </li>
            <li class="contact-form-list file">
                <div class="default col-group">
                    <p>
                        상세페이지 배경 업로드 <span class="guide">(상세페이지 상단 배경을 등록해 주세요.)</span>
                    </p>
                </div>
                <div class="user">
                    <div class="file-upload-wrap" id="detail_back_drop">
                        <ul class="file-upload-list" id="detail_back_ul" style="display: {{ count($portfolio->detail_back) > 0 ? 'block' : 'none' }}">
                            @if (count($portfolio->detail_back) > 0)
                                @foreach ($portfolio->detail_back as $img)
                                    <li class='col-group detail_back_img_li'>
                                        <input type="hidden" class="detail_back_fn_ori" value="{{ $img->fn }}">
                                        <span>{{ $img->fn_ori }}</span>
                                        <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='detail_back_img_del' data-type='ori'>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <span class="file-drop">
                            <span id="detail_back_span" style="display: {{ count($portfolio->thumbnail) > 0 ? 'none' : 'block' }}">파일을 이곳에 드래그 하거나
                                <label for="detail_back_file">파일찾기</label> 를 눌러 이미지를 등록해주세요.
                            </span>
                            <input type="file" id="detail_back_file" onchange="file_change('detail_back');" multiple accept="image/*"/>
                        </span>
                    </div>
                </div>
            </li>
            <li class="contact-form-list file">
                <div class="default col-group">
                    <p>
                        상세이미지 업로드 <span class="guide">(목업에 맞춰 등록해 주세요.)</span>
                    </p>
                    <button>
                        <a href="{{ url('admin/images/PORTFOLIO-0.psd') }}" download>목업다운로드</a>
                    </button>
                </div>
                <div class="user">
                    <div class="file-upload-wrap" id="detail_drop">
                        <ul class="file-upload-list" id="detail_ul" style="display: {{ count($portfolio->detail) > 0 ? 'block' : 'none' }}">
                            @if (count($portfolio->detail) > 0)
                                @foreach ($portfolio->detail as $img)
                                    <li class='col-group detail_img_li'>
                                        <input type="hidden" class="detail_fn_ori" value="{{ $img->fn }}">
                                        <span>{{ $img->fn_ori }}</span>
                                        <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='detail_img_del' data-type='ori'>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <span class="file-drop" >
                            <span id="detail_span" style="display: {{ count($portfolio->thumbnail) > 0 ? 'none' : 'block' }}">파일을 이곳에 드래그 하거나
                                <label for="detail_file">파일찾기</label> 를 눌러 이미지를 등록해주세요.
                            </span>
                            <input type="file" id="detail_file" onchange="file_change('detail');" multiple accept="image/*"/>
                        </span>
                    </div>
                </div>
            </li>
            <li class="contact-form-list col-group">
                <div class="default">
                    바로가기
                </div>
                <div class="user">
                    <input type="text" placeholder="바로가기 버튼 클릭시 이동할 링크를 입력해 주세요.( http:// )" id="link" value="{{ $portfolio->link }}">
                </div>
            </li>
            <li class="contact-form-list">
                <div class="default">
                    내용
                </div>
                <div class="user">
                    <textarea name="" id="content_" cols="30" rows="10" placeholder="상세내용을 간단하게 입력해 주세요. 예) 웨딩전문샵 루디아 프로젝트 반응형 홈페이지 제작">{{ $portfolio->content }}</textarea>
                </div>
            </li>
        </ul>
        <div class="con-footer col-group">
            <button class="register" onclick="btn_update({{ $portfolio->id }})">
                수정
            </button>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
let thumbnail_img   = [];
let detail_back_img = [];
let detail_img      = [];

let del_thumbnail_img   = [];
let del_detail_back_img = [];
let del_detail_img      = [];

$("#wrap").addClass("col-group");

$(function (){

    for(let i = 0; i < $(".thumbnail_img_li").length; i++){ 
        thumbnail_img.push($(".thumbnail_img_li span").eq(i).text());
    }

    for(let i = 0; i < $(".detail_back_img_li").length; i++){ 
        detail_back_img.push($(".detail_back_img_li span").eq(i).text());
    }

    for(let i = 0; i < $(".detail_img_li").length; i++){ 
        detail_img.push($(".detail_img_li span").eq(i).text());
    }

    const $drop = $("#thumbnail_drop");

    $drop.on("dragenter", function(e) { //드래그 요소가 들어왔을떄
        $(this).css("background", "green");

    }).on("dragleave", function(e) { //드래그 요소가 나갔을때
        $(this).css("background", "#f8f8f8");

    }).on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();

    }).on('drop', function(e) { //드래그한 항목을 떨어뜨렸을때
        e.preventDefault();
        $(this).css("background", "#f8f8f8");

        let files = e.originalEvent.dataTransfer.files; //드래그&드랍 항목
    
        for(let i = 0; i < files.length; i++) {
            let file = files[i];
            let size = thumbnail_img.push(file); //업로드 목록에 추가
            preview(file, "thumbnail"); //미리보기 만들기
        }
    });

    const $drop2 = $("#detail_back_drop");

    $drop2.on("dragenter", function(e) { //드래그 요소가 들어왔을떄
        $(this).css("background", "green");

    }).on("dragleave", function(e) { //드래그 요소가 나갔을때
        $(this).css("background", "#f8f8f8");

    }).on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();

    }).on('drop', function(e) { //드래그한 항목을 떨어뜨렸을때
        e.preventDefault();
        $(this).css("background", "#f8f8f8");

        let files = e.originalEvent.dataTransfer.files; //드래그&드랍 항목
    
        for(let i = 0; i < files.length; i++) {
            let file = files[i];
            let size = detail_back_img.push(file); //업로드 목록에 추가
            preview(file, "detail_back"); //미리보기 만들기
        }
    });

    const $drop3 = $("#detail_drop");

    $drop3.on("dragenter", function(e) { //드래그 요소가 들어왔을떄
        $(this).css("background", "green");

    }).on("dragleave", function(e) { //드래그 요소가 나갔을때
        $(this).css("background", "#f8f8f8");

    }).on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();

    }).on('drop', function(e) { //드래그한 항목을 떨어뜨렸을때
        e.preventDefault();
        $(this).css("background", "#f8f8f8");

        let files = e.originalEvent.dataTransfer.files; //드래그&드랍 항목
    
        for(let i = 0; i < files.length; i++) {
            let file = files[i];
            let size = detail_img.push(file); //업로드 목록에 추가
            preview(file, "detail"); //미리보기 만들기
        }
    });
});

//파일 드래그&드랍 파일 업로드
function preview(file, type) {
    var reader = new FileReader();
    reader.onload = (function(f) {
        if(!f.type.match("image.*")){
            alert("이미지 파일만 업로드 가능합니다.");
            return;
        }
        return function(e) {
            let str = "<li class='col-group "+type+"_img_li'>\
                            <span>"+f.name+"</span>\
                            <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='"+type+"_img_del' data-type='new'>\
                        </li>";

            $("#"+type+"_ul").show();
            $("#"+type+"_span").hide();
            $("#"+type+"_ul").append(str);
        };

    })(file);

    reader.readAsDataURL(file);
}

//파일 업로드
function file_change(type){
    const files    = $("#"+type+"_file")[0].files;
    const filesArr = Array.prototype.slice.call(files);

    filesArr.forEach(function(f){
        if(!f.type.match("image.*")){
            alert("이미지 파일만 업로드 가능합니다.");
            return;
        }

        if(type == "thumbnail"){
            thumbnail_img.push(f);
        }else if(type == "detail_back"){
            detail_back_img.push(f);
        }else if(type == "detail"){
            detail_img.push(f);
        }

        const reader  = new FileReader();
        reader.onload = function(e){
            let str = "<li class='col-group "+type+"_img_li'>\
                            <span>"+f.name+"</span>\
                            <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='"+type+"_img_del' data-type='new'>\
                        </li>";

            $("#"+type+"_ul").show();
            $("#"+type+"_span").hide();
            $("#"+type+"_ul").append(str);
        }

        reader.readAsDataURL(f);

    });
}

//썸네일 이미지 x버튼
$(document).on("click", ".thumbnail_img_del", function(){
    const idx = $(".thumbnail_img_del").index(this);

    if($(this).data("type") == "ori"){
        del_thumbnail_img.push($(".thumbnail_fn_ori").eq(idx).val());
    }
    
    thumbnail_img.splice(idx, 1);
    $("#thumbnail_file").val("");
    $(".thumbnail_img_li").eq(idx).remove();
    
    if(thumbnail_img.length == 0){
        $("#thumbnail_span").show();
    }
    
});

//상세페이지 배경 x버튼
$(document).on("click", ".detail_back_img_del", function(){
    const idx = $(".detail_back_img_del").index(this);

    if($(this).data("type") == "ori"){
        del_detail_back_img.push($(".detail_back_fn_ori").eq(idx).val());
    }

    detail_back_img.splice(idx, 1);
    $("#detail_back_file").val("");
    $(".detail_back_img_li").eq(idx).remove();
    
    if(detail_back_img.length == 0){
        $("#detail_back_span").show();
    }

});

//상세페이지 x버튼
$(document).on("click", ".detail_img_del", function(){
    const idx = $(".detail_img_del").index(this);

    if($(this).data("type") == "ori"){
        del_detail_img.push($(".detail_fn_ori").eq(idx).val());
    }

    detail_img.splice(idx, 1);
    $("#detail_file").val("");
    $(".detail_img_li").eq(idx).remove();
    
    if(detail_img.length == 0){
        $("#detail_span").show();
    }

});



//수정버튼
function btn_update(id){
    const sub_title = $("#sub_title").val();
    const title     = $("#title").val();
    const link      = $("#link").val();
    const content   = $("#content_").val();
    const formData  = new FormData();
    
    if(confirm("수정하시겠습니까?")){
        formData.append("sub_title", sub_title);
        formData.append("title", title);
        formData.append("link", link);
        formData.append("content", content);

        if(thumbnail_img.length > 0){
            for(let i = 0; i < thumbnail_img.length; i++){
                formData.append("thumbnail_img[]", thumbnail_img[i]);
            }
        }

        if(detail_back_img.length > 0){
            for(let i = 0; i < detail_back_img.length; i++){
                formData.append("detail_back_img[]", detail_back_img[i]);
            }
        }

        if(detail_img.length > 0){
            for(let i = 0; i < detail_img.length; i++){
                formData.append("detail_img[]", detail_img[i]);
            }
        }

        //////////////////////////////삭제////////////////////////////////////
        if(del_thumbnail_img.length > 0){
            for(let i = 0; i < del_thumbnail_img.length; i++){
                formData.append("del_thumbnail_img[]", del_thumbnail_img[i]);
            }
        }

        if(del_detail_back_img.length > 0){
            for(let i = 0; i < del_detail_back_img.length; i++){
                formData.append("del_detail_back_img[]", del_detail_back_img[i]);
            }
        }

        if(del_detail_img.length > 0){
            for(let i = 0; i < del_detail_img.length; i++){
                formData.append("del_detail_img[]", del_detail_img[i]);
            }
        }
        //////////////////////////////////////////////////////////////////////

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('adm/portfolio/portfolioUpdate') }}/"+id,
            type: "post",
            processData: false,
            contentType: false,
            dataType: "json",
            data: formData,
            success: function(result){
                alert(result["msg"]);
                if(result["success"]){
                    location.href = "{{ url('adm/portfolio') }}";

                }else{
                    if(result["tag"] != "im"){
                        $("#"+result["tag"]).focus();
                    }
                    return;
                }
            }, error: function(result){
                alert("에러가 발생했습니다. 담당자에게 문의해주세요.");
                return;
            }
        });
    }

}
</script>
@endsection