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
                회사소개서
            </h2>
        </div>
        <ul class="con-form contact-form port-form">
            <li class="contact-form-list file">
                <div class="default">
                    회사소개서 업로드</span>
                </div>
                <div class="user">
                    <div class="file-upload-wrap" id="file_drop">
                        <ul class="file-upload-list" id="file_ul" style="display: {{ isset($file) ? 'block' : 'none' }}">
                            <input type="hidden" id="file_fn" value="{{ isset($file) ? $file->fn : '' }}">
                            @if (isset($file))
                                <li class='col-group file_img_li'>
                                    <span>{{ $file->fn_ori }}</span>
                                    <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='{{ isset($file) ? 'ori_img_del' : 'file_img_del' }}'>
                                </li>
                            @endif
                        </ul>
                        <span class="file-drop">
                            <span id="file_span" style="display: {{ isset($file) ? 'none' : 'block' }}">파일을 이곳에 드래그 하거나
                                <label for="file">파일찾기</label> 를 눌러 파일을 등록해주세요.
                            </span>
                            <input type="file" id="file" onchange="file_change();"/>
                        </span>
                    </div>
                </div>
                <span class="pdf-file" style="display: {{ isset($file) ? 'block' : 'none' }}">
                    <span class="pdf-span" id="">
                        <label for="file">파일선택</label>
                    </span>
                    <input type="file" id="" onchange="file_change();" />
                </span>
            </li>
        </ul>
        {{-- <div class="con-footer col-group">
            <button class="register" onclick="btn_apply()">
                등록
            </button>
        </div> --}}
    </div>
</div>
@endsection


@section('script')
<script>
let file_fn     = "";
let upload_file = "";

$(function (){
    const $drop = $("#file_drop");

    if($("#file_fn").val() != ""){
        file_fn = $("#file_fn").val();
    }

    $drop.on("dragenter", function(e) { //드래그 요소가 들어왔을떄
        $(this).css("background", "#B2EBF4");

    }).on("dragleave", function(e) { //드래그 요소가 나갔을때
        $(this).css("background", "#f8f8f8");

    }).on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();

    }).on('drop', function(e) { //드래그한 항목을 떨어뜨렸을때
        e.preventDefault();
        $(this).css("background", "#f8f8f8");

        let files = e.originalEvent.dataTransfer.files; //드래그&드랍 항목

        if(files.length > 1){
            alert("파일은 한개만 등록해주세요.");
            return;
        }
    
        for(let i = 0; i < files.length; i++) {
            let file = files[i];
            upload_file = file; //업로드 목록에 추가
            preview(file); //미리보기 만들기
        }
    });
});


//파일 드래그&드랍 파일 업로드
function preview(file) {
    var reader = new FileReader();
    reader.onload = (function(f) {
        
        upload_file = f;

        if($("#file_fn").val() != ""){
            file_fn = $("#file_fn").val();
        }
        
        if($(".file_img_li").length == 1){
            $(".file_img_li").remove();
        }

        return function(e) {
            let str = "<li class='col-group file_img_li'>\
                            <span>"+f.name+"</span>\
                            <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='file_img_del'>\
                        </li>";

            $("#file_ul").show();
            $("#file_span").hide();
            $("#file_ul").append(str);
        };

    })(file);

    reader.readAsDataURL(file);
    btn_apply();
}

//파일 업로드
function file_change(){
    const files    = $("#file")[0].files;
    const filesArr = Array.prototype.slice.call(files);

    if($("#file_fn").val() != ""){
        file_fn = $("#file_fn").val();
    }

    if($(".file_img_li").length == 1){
        $(".file_img_li").remove();
    }

    filesArr.forEach(function(f){

        upload_file = f;

        const reader  = new FileReader();
        reader.onload = function(e){
            let str = "<li class='col-group file_img_li'>\
                            <span>"+f.name+"</span>\
                            <img src='{{ asset('admin/images/icon_close.svg') }}' alt='' class='file_img_del'>\
                        </li>";

            $("#file_ul").show();
            $("#file_span").hide();
            $("#file_ul").append(str);
        }

        reader.readAsDataURL(f);
    });

    btn_apply();
}

//썸네일 이미지 x버튼
$(document).on("click", ".file_img_del", function(){
    const idx = $(".file_img_del").index(this);

    upload_file = "";
    $("#file_file").val("");
    $(".file_img_li").eq(idx).remove();
    
    if(upload_file == "" && $(".file_img_li").length == 0){
        $("#file_span").show();
    }

});

//삭제 버튼
$(document).on("click", ".ori_img_del", function(){
    if(confirm("삭제하시겠습니까?")){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('adm/download') }}",
            type: "DELETE",
            dataType: "json",
            data: {"fn" : $("#file_fn").val()},
            success: function(result){
                alert(result["msg"]);
                if(result["success"]){
                    location.href = "{{ url('adm/download') }}";
                }

            }, error: function(result){
                alert("에러가 발생했습니다. 담당자에게 문의해주세요.");
                return;
            }
        });
    }
});

//등록버튼
function btn_apply(){
    const formData  = new FormData();
    
    if(upload_file == "" && $(".file_img_li").length == 0){
        alert("파일을 선택해주세요.");
        return;
    }

    formData.append("upload_file", upload_file);

    if(file_fn != ""){
        formData.append("file_fn", file_fn);
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ url('adm/download') }}",
        type: "post",
        processData: false,
        contentType: false,
        dataType: "json",
        data: formData,
        success: function(result){
            alert(result["msg"]);
            if(result["success"]){
                location.href = "{{ url('adm/download') }}";
            }

        }, error: function(result){
            alert("에러가 발생했습니다. 담당자에게 문의해주세요.");
            return;
        }
    });
}
</script>
@endsection