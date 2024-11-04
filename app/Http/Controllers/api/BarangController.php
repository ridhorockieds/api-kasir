<?php

namespace App\Http\Controllers\api;

use \App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Data Barang',
            'data' => $data,
        ], 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors(),
            ], 400);
        }

        $maxAttempts = 5;
        $attempt = 0;

        do {
            $barcode = rand(10000000, 99999999);
            $existingBarcode = Barang::where('nobarcode', $barcode)->first();

            $attempt++;
        } while ($existingBarcode && $attempt < $maxAttempts);

        if ($attempt >= $maxAttempts) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghasilkan barcode unik setelah ' . $maxAttempts . ' kali percobaan.',
            ], 400);
        }

        $data = new Barang();
        $data->nobarcode = $barcode;
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil',
            'data' => $data,
        ], 200);
    }
}
