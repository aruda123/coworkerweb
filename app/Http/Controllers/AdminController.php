<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Upload;
use App\Models\Contact;
use App\Models\Inquiry;
use App\Models\Portfolio;

class AdminController extends Controller
{

    //파일 업로드
    public function upload_file($upload_file, $id, $type){
        $file = $upload_file;
        $ext  = $file->extension();
        $fn   = $file->store("public/upload");
        $fn   = explode("/", $fn);
        $fn   = $fn[sizeof($fn)-1];

        $file_info = getimagesize("storage/upload/".$fn);

        $upload_file               = new Upload;
        $upload_file->type_id      = $id;
        $upload_file->type         = $type;
        $upload_file->fn           = $fn;
        $upload_file->fn_ori       = $file->getClientOriginalName();
        $upload_file->size         = $file->getSize();
        $upload_file->ext          = $ext;
        $upload_file->width        = $file_info[0];
        $upload_file->height       = $file_info[1];
        $upload_file->save();
    }

    //파일 다운로드
    public function fileDownload(Request $request, $fn, $fn_ori){
        return Storage::download('public/upload/file/'.$fn, $fn_ori);
    }

    public function index(){
        return view('admin/index');
    }

    public function logout(Request $request){
        $request->session()->forget("admin");
        return redirect("adm");
    }

    public function auth(Request $request){
        
        if($request->id == 'admin' && $request->pwd == 'coworker123!!'){
            $request->session()->put('admin', 'on');
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false, "msg"=>"아이디 또는 비밀번호가 다릅니다."]);
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //견적문의
    public function contact(){
        $contact = Contact::orderByDesc("id")->paginate(6);
        $num     = $contact->firstItem();
        return view("admin/contact", compact("contact", "num"));
    }

    //견적문의 상세
    public function contactShow(Request $request, $id){
        $contact = Contact::find($id);
        $prev    = Contact::where('id', '<', $id)->orderByDesc("id")->first();
        $next    = Contact::where('id', '>', $id)->orderByDesc("id")->first();
        
        return view("admin/contact-detail", compact("contact", "prev", "next"));
    }

    //견적문의 삭제
    public function contactDestory(Request $request){
        foreach($request->id as $id){
            $file = Upload::where([["type", "contact"], ["type_id", $id]])->pluck("fn");
            
            if(count($file) > 0){
                foreach($file as $fn){
                    Storage::delete("public/upload/file/".$fn);
                }
            }
            Contact::where("id", $id)->delete();
            Upload::where([["type", "contact"], ["type_id", $id]])->delete();
        }
        return response()->json(["success"=>true, "msg"=>"삭제되었습니다."]);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //간편견적문의
    public function inquiry(){
        $inquiry = Inquiry::orderByDesc("id")->paginate(6);
        $num     = $inquiry->firstItem();
        return view("admin/inquiry", compact("inquiry", "num"));
    }

    //간편견적문의 상세
    public function inquiryShow(Request $request, $id){
        $inquiry = Inquiry::find($id);
        $prev    = Inquiry::where('id', '<', $id)->orderByDesc("id")->first();
        $next    = Inquiry::where('id', '>', $id)->orderByDesc("id")->first();
        
        return view("admin/inquiry-detail", compact("inquiry", "prev", "next"));
    }

    //간편견적문의 삭제
    public function inquiryDestory(Request $request){
        foreach($request->id as $id){
            Inquiry::where("id", $id)->delete();
        }
        return response()->json(["success"=>true, "msg"=>"삭제되었습니다."]);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //포트폴리오
    public function portfolio(){
        $portfolio = Portfolio::orderByDesc("id")->paginate(10);
        $num       = $portfolio->firstItem();
        return view("admin/portfolio", compact("portfolio", "num"));
    }

    public function portfolioCreate(){
        return view("admin/portfolio-write");
    }

    //포트폴리오 등록
    public function portfolioStore(Request $request){
        $validator = validator::make($request->all(), [
            "sub_title" => "required",
            "title"     => "required",
            "link"      => "required",
            "content"   => "required",
        ]);
        
        if($validator->fails()){
            if($validator->errors()->has("sub_title")){
                return response()->json(["msg"=>"소제목을 입력해주세요.", "tag"=>"sub_title"]);
            }else if($validator->errors()->has("title")){
                return response()->json(["msg"=>"대제목을 입력해주세요.", "tag"=>"title"]);
            }else if($validator->errors()->has("link")){
                return response()->json(["msg"=>"바로가기 링크를 입력해주세요.", "tag"=>"link"]);
            }else if($validator->errors()->has("content")){
                return response()->json(["msg"=>"내용을 입력해주세요.", "tag"=>"content_"]);
            }
        }

        if(!$request->hasFile("thumbnail_img")){
            return response()->json(["msg"=>"썸네일 이미지를 선택해주세요.", "tag"=>"img"]);
        }else if(!$request->hasFile("detail_back_img")){
            return response()->json(["msg"=>"상세페이지 배경 이미지를 선택해주세요.", "tag"=>"img"]);
        }else if(!$request->hasFile("detail_img")){
            return response()->json(["msg"=>"상세페이지 이미지를 선택해주세요.", "tag"=>"img"]);
        }

        $link = $request->link;
        if(strpos($link, "://") !== false){
            $link = explode("://", $link);
            $link = "http://".$link[1];
        }else{
            $link = "http://".$link;
        }

        $portfolio            = new Portfolio;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->title     = $request->title;
        $portfolio->link      = $link;
        $portfolio->content   = $request->content;
        $portfolio->save();

        foreach($request->file("thumbnail_img") as $file){
            $this->upload_file($file, $portfolio->id, "p_thumbnail");
        }

        foreach($request->file("detail_back_img") as $file){
            $this->upload_file($file, $portfolio->id, "p_detail_back");
        }

        foreach($request->file("detail_img") as $file){
            $this->upload_file($file, $portfolio->id, "p_detail");
        }

        return response()->json(["success"=>true, "msg"=>"등록되었습니다."]);
    }

    //포트폴리오 상세페이지
    public function portfolioShow($id){
        $portfolio = Portfolio::find($id);
        $prev      = Portfolio::where('id', '<', $id)->orderByDesc("id")->value("id");
        $next      = Portfolio::where('id', '>', $id)->orderByDesc("id")->value("id");
        return view("admin/portfolio-detail", compact("portfolio", "prev", "next"));
    }

    //포트폴리오 삭제
    public function portfolioDestory(Request $request){
        $file_arr = array();

        foreach($request->id as $id){
            $file1 = Upload::where([["type", "p_thumbnail"], ["type_id", $id]])->pluck("fn");
            $file2 = Upload::where([["type", "p_detail_back"], ["type_id", $id]])->pluck("fn");
            $file3 = Upload::where([["type", "p_detail"], ["type_id", $id]])->pluck("fn");
            
            $file_arr = $file1->merge($file2); //하나로 합치기
            $file_arr = $file_arr->merge($file3);
            
            if(count($file_arr) > 0){
                foreach($file_arr as $fn){
                    Storage::delete("public/upload/".$fn);
                }
            }
            Portfolio::where("id", $id)->delete();
            Upload::where([["type", "p_thumbnail"], ["type_id", $id]])->delete();
            Upload::where([["type", "p_detail_back"], ["type_id", $id]])->delete();
            Upload::where([["type", "p_detail"], ["type_id", $id]])->delete();
        }
        return response()->json(["success"=>true, "msg"=>"삭제되었습니다."]);
    }

    //포트폴리오 수정
    public function portfolioUpdate(Request $request, $id){
        $portfolio               = Portfolio::find($id);

        $del_thumbnail_img_cnt   = isset($request->del_thumbnail_img) ? count($request->del_thumbnail_img) : 0; //삭제된 이미지 개수
        $del_detail_back_img_cnt = isset($request->del_detail_back_img) ? count($request->del_detail_back_img) : 0;
        $del_detail_img_cnt      = isset($request->del_detail_img) ? count($request->del_detail_img) : 0;

        $thumbnail_img_cnt       = $portfolio->thumbnail->count(); //원래 업로드 되어있던 이미지 개수
        $detail_back_img_cnt     = $portfolio->detail_back->count();
        $detail_img_cnt          = $portfolio->detail->count();

        $validator = validator::make($request->all(), [
            "sub_title" => "required",
            "title"     => "required",
            "link"      => "required",
            "content"   => "required",
        ]);
        
        if($validator->fails()){
            if($validator->errors()->has("sub_title")){
                return response()->json(["msg"=>"소제목을 입력해주세요.", "tag"=>"sub_title"]);
            }else if($validator->errors()->has("title")){
                return response()->json(["msg"=>"대제목을 입력해주세요.", "tag"=>"title"]);
            }else if($validator->errors()->has("link")){
                return response()->json(["msg"=>"바로가기 링크를 입력해주세요.", "tag"=>"link"]);
            }else if($validator->errors()->has("content")){
                return response()->json(["msg"=>"내용을 입력해주세요.", "tag"=>"content_"]);
            }
        }

        if(!$request->hasFile("thumbnail_img") && $del_thumbnail_img_cnt == $thumbnail_img_cnt){
            return response()->json(["msg"=>"썸네일 이미지를 선택해주세요.", "tag"=>"img"]);
        }else if(!$request->hasFile("detail_back_img") && $del_detail_back_img_cnt == $detail_back_img_cnt){
            return response()->json(["msg"=>"상세페이지 배경 이미지를 선택해주세요.", "tag"=>"img"]);
        }else if(!$request->hasFile("detail_img") && $del_detail_img_cnt == $detail_img_cnt){
            return response()->json(["msg"=>"상세페이지 이미지를 선택해주세요.", "tag"=>"img"]);
        }

        $link = $request->link;
        if(strpos($link, "://") !== false){
            $link = explode("://", $link);
            $link = "http://".$link[1];
        }else{
            $link = "http://".$link;
        }

        $portfolio->sub_title = $request->sub_title;
        $portfolio->title     = $request->title;
        $portfolio->link      = $link;
        $portfolio->content   = $request->content;
        $portfolio->save();

        if($request->hasFile("thumbnail_img")){
            foreach($request->file("thumbnail_img") as $file){
                $this->upload_file($file, $portfolio->id, "p_thumbnail");
            } 
        }

        if($request->hasFile("detail_back_img")){
            foreach($request->file("detail_back_img") as $file){
                $this->upload_file($file, $portfolio->id, "p_detail_back");
            } 
        }

        if($request->hasFile("detail_img")){
            foreach($request->file("detail_img") as $file){
                $this->upload_file($file, $portfolio->id, "p_detail");
            } 
        }

        if(isset($request->del_thumbnail_img)){
            foreach ($request->del_thumbnail_img as $fn) {
                Storage::delete("public/upload/".$fn);
                Upload::where("fn", $fn)->delete();
            }
        }

        if(isset($request->del_detail_back_img)){
            foreach ($request->del_detail_back_img as $fn) {
                Storage::delete("public/upload/".$fn);
                Upload::where("fn", $fn)->delete();
            }
        }

        if(isset($request->del_detail_img)){
            foreach ($request->del_detail_img as $fn) {
                Storage::delete("public/upload/".$fn);
                Upload::where("fn", $fn)->delete();
            }
        }

        return response()->json(["success"=>true, "msg"=>"수정되었습니다."]);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //회사소개서
    public function download(){
        $file = Upload::where("type", "company_file")->first();
        return view("admin/download", compact("file"));
    }

    public function downloadStore(Request $request){
        if(isset($request->file_fn) && $request->file_fn != ""){
            Storage::delete("public/upload/file/".$request->file_fn);
        }

        $file = $request->file("upload_file");
        $ext  = $file->extension();
        $fn   = $file->store("public/upload/file");
        $fn   = explode("/", $fn);
        $fn   = $fn[sizeof($fn)-1];

        $file_info = getimagesize("storage/upload/file/".$fn);

        Upload::updateOrInsert(
            ["type" => "company_file"],
            ["type_id" => 0, "type" => "company_file", "fn" => $fn, "fn_ori" => $file->getClientOriginalName(),
             "size" => $file->getSize(), "ext" => $ext, "width" => $file_info[0], "height" => $file_info[1]]
        );

        return response()->json(["success"=>true, "msg"=>"등록되었습니다."]);
    }

    //회사소개서 파일 삭제
    public function downloadDestory(Request $request){
        Storage::delete("public/upload/file/".$request->fn);
        Upload::where("fn", $request->fn)->delete();
        return response()->json(["success"=>true, "msg"=>"삭제되었습니다."]);
    }
}
