<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KeteranganMinumModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KeteranganMinumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = KeteranganMinumModel::getData($request->searchData);
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
            'keterangan' => 'required|unique:tb_keterangan_minum'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $store = KeteranganMinumModel::create($request->all());
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
        $data = KeteranganMinumModel::find($id);
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
        //     'keterangan' => 'required|unique:tb_jenis'
        // ]);
        $validator = Validator::make($request->all(), [
            'keterangan' => [
                'required',
                Rule::unique('tb_jenis')->ignore($id)
            ]
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $find = KeteranganMinumModel::find($id);
        $find->update([
            'keterangan' => $request->keterangan
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
        $find = KeteranganMinumModel::find($id);
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