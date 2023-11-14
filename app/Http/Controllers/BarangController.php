<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $barang = Barang::all();
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambbil data",
                "data" => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $barang = Barang::create($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil insert data",
                "data" => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $barang = Barang::find($id);
            if (!$barang) throw new \Exception("Barang tidak ditemukan");
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $barang = Barang::find($id);
            if (!$barang) throw new \Exception("Barang tidak ditemukan");
            $barang->update($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil update data",
                "data" => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $barang = Barang::find($id);
            if (!$barang) throw new \Exception("Barang tidak ditemukan");
            $barang->delete();
            return response()->json([
                "status" => true,
                "message" => "Berhasil delete data",
                "data" => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }
}
