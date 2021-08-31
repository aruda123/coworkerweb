<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Upload;
use App\Models\Contact;
use App\Models\Inquiry;
use App\Models\Portfolio;

class MainController extends Controller
{
    
    public function upload_file($upload_file, $id, $type){
        $file = $upload_file;
        $ext  = $file->extension();
        $fn   = $file->store("public/upload/file");
        $fn   = explode("/", $fn);
        $fn   = $fn[sizeof($fn)-1];

        $file_info = getimagesize("storage/upload/file/".$fn);

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

    public function index(){
        return view('index');
    }

    //회사소개서 다운로드
    public function fileDownload(Request $request, $fn, $fn_ori){
        return Storage::download('public/upload/file/'.$fn, $fn_ori);
    }

    public function about(){
        $file = Upload::where("type", "company_file")->select("fn", "fn_ori")->first();
        return view('about', compact("file"));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function portfolio(){
        $portfolio = Portfolio::orderByDesc("id")->paginate(9);
        return view('portfolio', compact("portfolio"));
    }

    public function portfolioShow($id){
        $portfolio = Portfolio::find($id);
        $prev      = Portfolio::where('id', '<', $id)->orderByDesc("id")->value("id");
        $next      = Portfolio::where('id', '>', $id)->orderByDesc("id")->value("id");

        return view('portfolio-detail', compact("portfolio", "prev", "next"));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function service(){
        return view('service');
    }

    public function service2(){
        return view('service2');
    }

    public function service3(){
        return view('service3');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function contact(){
        return view('contact');
    }

    //견적 제출
    public function contactStore(Request $request){
        $validator = validator::make($request->all(), [
            "company_name" => "required",
            "name"         => "required",
            "phone"        => "required",
            "email"        => "required",
            "make_type"    => "required",
            "service"      => "required",
            "price"        => "required",
            "open_date"    => "required",
            "url"          => "required",
        ]);
        
        if($validator->fails()){
            if($validator->errors()->has("company_name")){
                return response()->json(["msg"=>"회사명을 입력해주세요.", "tag"=>"company_name"]);
            }else if($validator->errors()->has("name")){
                return response()->json(["msg"=>"성명을 입력해주세요.", "tag"=>"name"]);
            }else if($validator->errors()->has("phone")){
                return response()->json(["msg"=>"연락처를 입력해주세요.", "tag"=>"phone"]);
            }else if($validator->errors()->has("email")){
                return response()->json(["msg"=>"이메일을 입력해주세요.", "tag"=>"email"]);
            }else if($validator->errors()->has("make_type")){
                return response()->json(["msg"=>"제작구분을 선택해주세요.", "tag"=>"make_type"]);
            }else if($validator->errors()->has("service")){
                return response()->json(["msg"=>"서비스를 선택해주세요.", "tag"=>"service"]);
            }else if($validator->errors()->has("price")){
                return response()->json(["msg"=>"예산을 입력해주세요.", "tag"=>"price"]);
            }else if($validator->errors()->has("open_date")){
                return response()->json(["msg"=>"오픈일정을 입력해주세요.", "tag"=>"open_date"]);
            }else if($validator->errors()->has("url")){
                return response()->json(["msg"=>"참고 사이트 주소를 입력해주세요.", "tag"=>"url"]);
            }
        }

        $contact               = new Contact;
        $contact->company_name = $request->company_name;
        $contact->name         = $request->name;
        $contact->phone        = $request->phone;
        $contact->email        = $request->email;
        $contact->make_type    = $request->make_type;
        $contact->service      = implode(" | ", $request->service);
        $contact->price        = $request->price;
        $contact->open_date    = $request->open_date;
        $contact->url          = $request->url;
        $contact->content      = $request->content ?? "";
        $contact->save();

        if($request->hasFile("upload_file")){
            foreach($request->file("upload_file") as $file){
                $this->upload_file($file, $contact->id, "contact");
            }
        }

        return response()->json(["success"=>true]);
    }

    public function contactMenuStore(Request $request){
        $validator = validator::make($request->all(), [
            "name"    => "required",
            "phone"   => "required",
            "email"   => "required",
            "service" => "required",
            "url"     => "required",
        ]);
        
        if($validator->fails()){
            if($validator->errors()->has("name")){
                return response()->json(["msg"=>"성명 또는 회사명을 입력해주세요.", "tag"=>"name"]);
            }else if($validator->errors()->has("phone")){
                return response()->json(["msg"=>"연락처를 입력해주세요.", "tag"=>"phone"]);
            }else if($validator->errors()->has("email")){
                return response()->json(["msg"=>"이메일을 입력해주세요.", "tag"=>"email"]);
            }else if($validator->errors()->has("service")){
                return response()->json(["msg"=>"서비스를 선택해주세요.", "tag"=>"service"]);
            }else if($validator->errors()->has("url")){
                return response()->json(["msg"=>"참고 사이트 주소를 입력해주세요.", "tag"=>"url"]);
            }
        }

        $contact               = new Inquiry;
        $contact->name         = $request->name;
        $contact->phone        = $request->phone;
        $contact->email        = $request->email;
        $contact->service      = implode(" | ", $request->service);
        $contact->price        = $request->price ?? "";
        $contact->url          = $request->url;
        $contact->content      = $request->content ?? "";
        $contact->save();

        return response()->json(["success"=>true]);
    }

    //견적문의 완료 페이지
    public function contact_check(){
        return view("contact-check");
    }

}
