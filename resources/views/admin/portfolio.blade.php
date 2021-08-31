@extends('admin.layouts.base')

@section('main')
<div id="left_menu">
    <h1 class="logo">
        <a href="{{ url('adm/contact') }}">
            <img src="{{ asset('images/LOGO3.svg') }}" alt="">
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
                <button class="add" onclick="location.href='{{ url('adm/portfolio/portfolioCreate') }}'">
                    새로작성
                </button>
                <button onclick="chk_all()">
                    전체선택
                </button>
                <button onclick="chk_del()">
                    선택삭제
                </button>
            </div>
        </div>
        <ul class="con-form port-list col-group">
            @if ($portfolio->count() > 0)
                @foreach ($portfolio as $key=>$item)
                    <li>
                        <input type="checkbox" id="{{ $item->id }}" name="chk-box" class="chk-box" value="{{ $item->id }}">
                        <label for="{{ $item->id }}">
                            <div class="img-box">
                                <img src="{{ asset('storage/upload') }}/{{ $item->thumbnail[0]->fn }}" alt="">
                            </div>
                            <a class="hover-box" href="{{ url("/adm/portfolio/$item->id") }}">
                                <span class="title">
                                    {{ $item->title }}
                                </span>
                                <p>
                                    자세히보기
                                    <img src="{{ asset('admin/images/arrow-right_w.png') }}" alt="">
                                </p>
                            </a>
                        </label>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="con-footer col-group">
            <div class="pagination col-group">
                {{ $portfolio->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
let chk_del_id = [];

$(function(){
    $("input[name=chk-box]:checked").each(function(){
        $(this).prop("checked", false);
    });
});

//전체선택
function chk_all(){
    const all_len = $("input:checkbox[name='chk-box']").length;
    const chk_len = $("input:checkbox[name='chk-box']:checked").length;
    
    if(all_len != chk_len){
        $("input:checkbox[name='chk-box']").prop("checked", true);
    }else{
        $("input:checkbox[name='chk-box']").prop("checked", false);
    }
}

//삭제
function chk_del(){
    if($("input[name=chk-box]").is(":checked") == false){
        alert("선택된 항목이 없습니다.");
        return;
    }

    if(confirm("삭제하시겠습니까?")){
        $("input[name=chk-box]:checked").each(function(){
            chk_del_id.push($(this).val());
        });
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('adm/portfolio/portfolioDestory') }}",
            type: "DELETE",
            dataType: "json",
            data: {"id" : chk_del_id},
            success: function(result){
                alert(result["msg"]);
                if(result["success"]){
                    location.reload();
                }

            }, error: function(result){
                alert("에러가 발생했습니다.\n담당자에게 문의해주세요.");
            }
        });
    }
}
</script>
@endsection
