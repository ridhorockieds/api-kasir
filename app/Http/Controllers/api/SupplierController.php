<?php

namespace App\Http\Controllers\api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $data = \App\Models\Supplier::orderBy('created_at', 'DESC')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Data Supplier',
            'data' => $data,
        ], 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required|string',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors(),
            ], 400);
        } else {
            $data = new Supplier();
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->hp = $request->hp;
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Data Supplier Berhasil',
                'data' => $data,
            ], 200);
        }
    }
}
