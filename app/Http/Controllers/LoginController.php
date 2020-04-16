<?php

namespace App\Http\Controllers;

use App\Login;

class LoginController extends Controller
{
    public function index()
    {
        $getPost = Login::OrderBy("id", "DESC")->paginate(10);

        $out = [
            "message" => "list_post",
            "results" => $getPost
        ];

        return response()->json($out, 200);
    }
}