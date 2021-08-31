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
    <div class="sub-con container">
        <h2>
            estimate
        </h2>
        <p class="m-txt">
            미래 파트너로 코워커웹을 고려해<br>
            주셔서 감사합니다. 아래 양식을 작성해 주시면<br>
            빠르게 연락 드리겠습니다.
        </p>
        <ul class="contact-form">
            <li>
                <ul class="col-group half">
                    <li class="contact-form-list col-group">
                        <div class="default">
                            회사명
                            <span>*</span>
                        </div>
                        <div class="user">
                            <input type="text" placeholder="필수 입력사항입니다." id="company_name">
                        </div>
                    </li>
                    <li class="contact-form-list col-group">
                        <div class="default">
                            성명
                            <span>*</span>
                        </div>
                        <div class="user">
                            <input type="text" placeholder="필수 입력사항입니다." id="name">
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
                            <input type="text" placeholder="필수 입력사항입니다." id="phone">
                        </div>
                    </li>
                    <li class="contact-form-list col-group">
                        <div class="default">
                            이메일
                            <span>*</span>
                        </div>
                        <div class="user">
                            <input type="text" placeholder="필수 입력사항입니다." id="email">
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
                        <input type="checkbox" id="1" name="make_type" class="new make_type" data-chk="new" value="신규제작">
                        신규제작
                    </label>
                    <label for="2">
                        <input type="checkbox" id="2" name="make_type" class="renew make_type" data-chk="renew" value="리뉴얼">
                        리뉴얼
                    </label>
                </div>
            </li>
            <li class="contact-form-list">
                <div class="default">
                    어떤 서비스를 원하십니까? <span class="guide">(다중선택 가능)</span>
                </div>
                <div class="user">
                    <label for="3">
                        <input type="checkbox" id="3" name="service" class="service" value="웹사이트 제작(반응형)">
                        웹사이트 제작(반응형)
                    </label>
                    <label for="4">
                        <input type="checkbox" id="4" name="service" class="service" value="어플리케이션 제작">
                        어플리케이션 제작
                    </label>
                    <label for="5">
                        <input type="checkbox" id="5" name="service" class="service" value="SEO 최적화(검색엔진)">
                        SEO 최적화(검색엔진)
                    </label>
                    <label for="6">
                        <input type="checkbox" id="6" name="service" class="service" value="유지보수">
                        유지보수
                    </label>
                </div>
            </li>
            <li>
                <ul class="half col-group">
                    <li class="contact-form-list">
                        <div class="default">
                            프로젝트 예산을 입력해 주세요.
                            <span>*</span>
                        </div>
                        <div class="user">
                            <input type="text" placeholder="예) 1천만원 ~ 3천만원" id="price">
                        </div>
                    </li>
                    <li class="contact-form-list">
                        <div class="default">
                            오픈일정을 입력해 주세요.
                            <span>*</span>
                        </div>
                        <div class="user">
                            <input type="text" placeholder="오픈일정을 입력하세요." id="open_date">
                        </div>
                    </li>
                </ul>
            </li>
            <li class="contact-form-list">
                <div class="default">
                    제작에 참고하신 사이트의 주소를 입력해 주세요.
                    <span>*</span>
                </div>
                <div class="user">
                    <input type="text" placeholder="홈페이지 주소를 입력해 주세요.( http:// )" id="url">
                </div>
            </li>
            <li class="contact-form-list">
                <div class="default col-group">
                    <p>
                        파일 업로드
                        <span class="guide">(PDF, ZIP max 50MB / 50MB가 넘는 파일의 경우에는 전화문의 부탁드립니다. 문의 : 1588-0409)</span>
                    </p>
                    <button id="btn_file">파일찾기</button>
                    <input type="file" id="upload_file" style="display: none;" multiple accept=".pdf, .zip">
                </div>
                <div class="user" id="file_list">
                    <span id="file_guide">
                        PDF, ZIP 파일 최대 50MB 까지 업로드가 가능합니다.
                    </span>
                </div>
            </li>
            <li class="contact-form-list">
                <div class="default">
                    귀사의 프로젝트 설명 또는 문의사항을 기재해 주세요.
                </div>
                <div class="user">
                    <textarea name="" id="content" cols="30" rows="10" placeholder="코워커웹에 전달하고자 하는 설명이나 문의사항이 있다면 내용을 기재해 주세요."></textarea>
                </div>
            </li>
            <li class="col-group agree">
                <div class="user col-group">
                    <label for="agree_chk">
                        <input type="checkbox" id="agree_chk">
                        개인정보 보호정책에 동의합니다. <span>*</span>
                    </label>
                    <div class="agree-more-btn">
                        <button>전문보기</button>
                        <div id="agree_more">
                            @include('layouts.agree-more')
                        </div>
                    </div>
                    
                </div>
                
            </li>
        </ul>
        <div class="contact-footer col-group">
            <button class="contact-btn" onclick="btn_apply()">제출하기</button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
let upload_file = [];

$(document).ready(function (e){
    $(".user label").click(function(e){
        if($(this).children("input").data("chk") == "new"){
            if($(".renew").prop("checked")){
                $(".renew").prop("checked", false);
                $(".renew").parent().removeClass("checked");
            }
        }

        if($(this).children("input").data("chk") == "renew"){
            if($(".new").prop("checked")){
                $(".new").prop("checked", false);
                $(".new").parent().removeClass("checked");
            }
        }

        if ( $(this).children("input").prop("checked") ) {
            $(this).addClass("checked");
        } else{ 
            $(this).removeClass("checked");
        }
    });
});
    
$(document).on("click", "#btn_file", function(){
    $("#upload_file").click();
});

//파일 업로드
$(document).on("change", "#upload_file", function(){
    let ext      = "";
    let maxSize  = 1024 * 1024 * 50;
    let files    = $("#upload_file")[0].files;
    let filesArr = Array.prototype.slice.call(files);
    
    filesArr.forEach(function(f){
        ext = f.name.split(".").pop();
        if($.inArray(ext, ["pdf", "zip"]) == -1){
            alert("파일은 PDF ZIP 확장자만 업로드 가능합니다.");
            return;
        }

        if(f.size > maxSize){
            alert("50MB가 넘는 파일은 전화문의 부탁드립니다.");
            return;
        }

        upload_file.push(f);
        
        const reader = new FileReader();
        reader.onload = function(e){
            let str = "<span class='file_list_span'>\
                            <span>"+f.name+"</span>\
                            <button class='btn_del_file'><img src='{{ asset('images/icon/icon_close.svg') }}' alt=''></button>\
                        </span>";
                $("#file_list").append(str);

            }
            $("#file_guide").hide();
            reader.readAsDataURL(f);
        });
});

//파일삭제 버튼
$(document).on("click", ".btn_del_file", function(){
    const idx = $(".btn_del_file").index(this);
    upload_file.splice(idx, 1);
    $(".file_list_span").eq(idx).remove();
});

function btn_apply(){
    const company_name = $("#company_name").val();
    const name         = $("#name").val();
    const phone        = $("#phone").val();
    const email        = $("#email").val();
    const make_type    = $("input:checkbox[name='make_type']:checked").val();
    const price        = $("#price").val();
    const open_date    = $("#open_date").val();
    const url          = $("#url").val();
    const content      = $("#content").val();
    const formData     = new FormData();    
    
    if($("#agree_chk").prop("checked") == false){
        alert("개인정보 보호정책에 동의해주세요.");
        return;
    }

    if(confirm("제출하시겠습니까?")){
        formData.append("company_name", company_name);
        formData.append("name", name);
        formData.append("phone", phone);
        formData.append("email", email);

        if(make_type != undefined){
            formData.append("make_type", make_type);
        }
        
        $("input[name='service']:checked").each(function(){
            formData.append("service[]", $(this).val());
        });

        formData.append("price", price);
        formData.append("open_date", open_date);
        formData.append("url", url);

        if(content != ""){
            formData.append("content", content);
        }

        if(upload_file.length > 0){
            for(let i = 0; i < upload_file.length; i++){
                formData.append("upload_file[]", upload_file[i]);
            }
        }

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('contact') }}",
            type: "post",
            processData: false,
            contentType: false,
            dataType: "json",
            data: formData,
            success: function(result){
                if(result["success"]){
                    location.href = "{{ url('contact-check') }}";
                }else{
                    alert(result["msg"]);
                    $("#"+result["tag"]).focus();
                }
            }, error: function(result){
                alert("죄송합니다. 새로고침 후 다시 시도해주세요.");
                return;
            }
        });

    }
}
</script>
@endsection