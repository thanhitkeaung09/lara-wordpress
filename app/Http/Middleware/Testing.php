<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Testing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$num)
    {

//        echo "min ga lar par";
//        echo "<br>";
//        logger("I'm Global Log".$request->url());
        $acceptedUser = [11,1];
//        if( ! in_array(Auth::id(),$acceptedUser)){
//            return abort('404'); // id 11 မဟုတ်ရင် လုပ်
//        }

        if(Auth::id()<=$num){
            return abort("404");
        }
        return $next($request);  //  id 11 ဆိုဆက်လုပ်
    }
}
