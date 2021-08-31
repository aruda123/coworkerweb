<div class="inquiry-wrap contact-wrap">
    <div class="inquiry-btn">
        <p>
            견<br>
            적<br>
            문<br>
            의
        </p>  
    </div>
    <div class="sub-con inquiry-box">
        <form id="contact_form">
            <img src="{{ asset('images/icon/icon_close.svg') }}" class="close" alt="">
            <h2>
                간편견적문의
            </h2>
            <p>상세견적문의는 <a href="{{ url('contact') }}">여기</a>를 클릭 하세요.</p>
            <ul class="contact-form">
                <li class="contact-form-list col-group">
                    <div class="default">
                        성명/회사명
                        <span>*</span>
                    </div>
                    <div class="user">
                    <input type="text" placeholder="필수 입력사항입니다." id="name">
                    </div>
                </li>
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
                <li class="contact-form-list col-group">
                    <div class="default">
                        벤치마킹
                        <span>*</span>
                    </div>
                    <div class="user">
                    <input type="text" placeholder="http://" id="url">
                    </div>
                </li>
                <li class="contact-form-list col-group">
                    <div class="default">
                        예산
                    </div>
                    <div class="user">
                    <input type="text" placeholder="예) 1,000,000" id="price">
                    </div>
                </li>
                <li class="contact-form-list">
                    <div class="default">
                        어떤 서비스를 원하십니까? <span class="guide">(다중선택 가능)</span>
                    </div>
                    <div class="user">
                        <div class="col-group">
                            <label for="3">
                                <input type="checkbox" name="service" id="3" value="웹사이트 제작(반응형)">
                                웹사이트 제작(반응형)
                            </label>
                            <label for="4">
                                <input type="checkbox" name="service" id="4" value="어플리케이션 제작">
                                어플리케이션 제작
                            </label>
                        </div>
                        <div class="col-group">
                            <label for="5">
                                <input type="checkbox" name="service" id="5" value="SEO 최적화(검색엔진)">
                                SEO 최적화(검색엔진)
                            </label>
                            <label for="6">
                                <input type="checkbox" name="service" id="6" value="유지보수">
                                유지보수
                            </label>
                        </div>
                    </div>
                </li>
                <li class="contact-form-list">
                    <div class="default">
                        귀사의 프로젝트 설명 또는 문의사항을 기재해 주세요.
                    </div>
                    <div class="user">
                    <textarea name="" id="content" cols="30" rows="3" placeholder="문의사항이 있다면 내용을 기재해 주세요."></textarea>
                    </div>
                </li>
                <li class="contact-form-list col-group agree">
                    <div class="user col-group">
                        <label for="agree_chk">
                            <input type="checkbox" id="agree_chk">
                            개인정보 보호정책에 동의합니다. <span>*</span>
                        </label>
                        <div class="agree-more-btn">
                            <button type="button">전문보기</button>
                            <div id="agree_more">
                                @include('layouts.agree-more')
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="contact-footer col-group">
                <button type="button" class="contact-btn" onclick="btn_apply()">견적문의하기</button>
            </div>
        </form>
    </div>
</div>
<div class="inquiry-bg"></div>
<div class="inquiry-check">
    <img src="{{ asset('images/icon/icon_close.svg') }}" class="close" alt="">
    <img src="{{ asset('images/done_blue.svg') }}" alt="">
    <h2>
        <span>견적문의</span>가 정상적으로 제출되었습니다
    </h2>
    <p>
        귀사의 <strong>미래 파트너</strong>로
        코워커웹을 고려해 주셔서
        다시 한 번 감사드립니다.
        <br>
        양식을 작성해주신 날부터
        <strong>24시간 이내에 연락</strong> 드리겠습니다.
    </p>
    <button type="button">
        확인
    </button>
</div>


@section('script')
<script>
function btn_apply(){
    const name     = $("#name").val();
    const phone    = $("#phone").val();
    const email    = $("#email").val();
    const price    = $("#price").val();
    const url      = $("#url").val();
    const content  = $("#content").val();
    const formData = new FormData();    
    
    if($("#agree_chk").prop("checked") == false){
        alert("개인정보 보호정책에 동의해주세요.");
        return;
    }

    if(confirm("제출하시겠습니까?")){
        formData.append("name", name);
        formData.append("phone", phone);
        formData.append("email", email);
        
        $("input[name='service']:checked").each(function(){
            formData.append("service[]", $(this).val());
        });

        formData.append("price", price);
        formData.append("url", url);

        if(content != ""){
            formData.append("content", content);
        }

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('contact-menu') }}",
            type: "post",
            processData: false,
            contentType: false,
            dataType: "json",
            data: formData,
            success: function(result){
                if(result["success"]){
                    $("#contact_form")[0].reset();
                    $(".inquiry-wrap").removeClass("open");
                    $(".inquiry-check").show();
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
