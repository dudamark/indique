<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Database\QueryException;

class LoginController extends Controller
{
    public function login(Request $request){
        $login = User::where('email',$request->email)->where('password',md5($request->senha));
        if($login->count() == 1){
            $dados_user = $login->first();
            $time_start  = strtotime(now());

            $key = env('SECRET_KEY');

            $payload = array(
                "email"=> $request->email,
                //"iss" => "http://example.org",
                //"aud" => "http://example.com",
                "iat" => $time_start,
                //"nbf" => $time_end
            );

            $jwt = JWT::encode($payload, $key);

            return response()->json($jwt);
        } else {
            return 0;
        }
    }

}