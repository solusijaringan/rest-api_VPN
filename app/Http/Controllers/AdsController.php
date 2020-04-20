<?php


namespace App\Http\Controllers;
use App\Ads;

class AdsController extends Controller
{
    public function index() {
        $model = Ads::findOrFail(1);
        $data = [
            "message" => "list_Kota",
            "results" => $model
        ];

        return response()->json($data, 200);
    }
}
