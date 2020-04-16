<?php

namespace App\Http\Controllers;

use App\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class KotaController extends Controller
{
    public function index()
    {
        $getPost = Kota::OrderBy("id", "DESC")->paginate(10);

        $out = [
            "message" => "list_Kota",
            "results" => $getPost
        ];

        return response()->json($out, 200);
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'kota' => 'required',
                
            ]);

            $kota = $request->input('kota');

            $data = [
                'kota' => $kota
            ];

            $insert = Kota::create($data);

            if ($insert) {
                $out  = [
                    "message" => "success_insert_data",
                    "results" => $data,
                    "code"  => 200
                ];
            } else {
                $out  = [
                    "message" => "vailed_insert_data",
                    "results" => $data,
                    "code"   => 404,
                ];
            }

            return response()->json($out, $out['code']);
        }
    }

    public function update(Request $request)
    {

        if ($request->isMethod('patch')) {

            $this->validate($request, [
                'id'    => 'required',
                'kota' => 'required'
                
            ]);
            $id = $request->input('id');
            $title = $request->input('title');
            $body = $request->input('body');

            $kota = Kota::find($id);

            $data = [
                'slug'  => Str::slug($title, "-"),
                'title' => $title,
                'body' => $body
            ];

            $update = $kota->update($data);

            if ($update) {
                $out  = [
                    "message" => "success_update_data",
                    "results" => $data,
                    "code"  => 200
                ];
            } else {
                $out  = [
                    "message" => "vailed_update_data",
                    "results" => $data,
                    "code"   => 404,
                ];
            }

            return response()->json($out, $out['code']);
        }
    }
    public function destroy($id)
    {
        $kota =  Kota::find($id);

        if (!$kota) {
            $data = [
                "message" => "id not found",
            ];
        } else {
            $kota->delete();
            $data = [
                "message" => "success_deleted"
            ];
        }

        return response()->json($data, 200);
    }

}