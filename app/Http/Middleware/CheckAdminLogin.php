<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminLogin
{
 /**
 * Handle an incoming request.
 *
 * @param \Illuminate\Http\Request $request
 * @param \Closure $next
 * @return mixed
 */
 public function handle(Request $request, Closure $next)
 {
    // 관리자 로그인 되어있는지 체크.
    // 있다면 세션 갱신, 없다면 관리자 로그인 창으로 리다이렉트
    if($request->session()->has('admin')) {
        $request->session()->put('admin', $request->session()->get('admin'));
        //$request->session()->put('admin_level', $request->session()->get('admin_level'));
        //$request->session()->put('admin_id', $request->session()->get('admin_id'));
    }else{

      return redirect('adm');
    }

    return $next($request);
 }
}