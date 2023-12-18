<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = KategoriModel::getData($request->searchData);
        if ($data) {
            return response()->json(
                [
                    'message' => 'success',
                    'function' => 'index',
                    'data' => $data
                ],
                200
            );
        }
        return response()->json(
            [
                'message' => 'failed',
                'function' => 'index',
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_kategori'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $store = KategoriModel::create($request->all());
        if ($store) {
            return response()->json(
                [
                    'message' => 'success',
                    'function' => 'store',
                    'data' => $store
                ],
                200
            );
        }
        return response()->json(
            [
                'message' => 'failed',
                'function' => 'store',
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = KategoriModel::find($id);
        if ($data) {
            return response()->json(
                [
                    'message' => 'success',
                    'function' => 'show',
                    'data' => $data
                ],
                200
            );
        }
        return response()->json(
            [
                'message' => 'failed',
                'function' => 'show',
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'nama' => 'required|unique:tb_kategori'
        // ]);
        $validator = Validator::make($request->all(), [
            'nama' => [
                'required',
                Rule::unique('tb_kategori')->ignore($id)
            ]
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $find = KategoriModel::find($id);
        $find->update([
            'nama' => $request->nama
        ]);
        if ($find) {
            return response()->json(
                [
                    'message' => 'success',
                    'function' => 'update',
                    'data' => $find,
                ],
                200
            );
        }
        return response()->json(
            [
                'message' => 'failed',
                'function' => 'update',
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = KategoriModel::find($id);
        $find->delete();
        if ($find) {
            return response()->json(
                [
                    'message' => 'success',
                    'function' => 'destroy',
                ],
                200
            );
        }
        return response()->json(
            [
                'message' => 'failed',
                'function' => 'destroy',
            ],
            200
        );
    }
}
