<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class bukucontoller extends Controller
{
    public function index()
    {
        return 'OK';
        $result = DB::table('buku')->get();
        return response($result);
    }
    function getByid($bk)
    {
        return response(DB::table('buku')->where('kb', $bk)->get());
    }

    public function store(Request $request)
    {
        $buku = [
            'kb' => str::random(5),
            'nama_buku' => $request->nama_buku,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
        ];

        try {
            DB::table('buku')->insert($buku);
            return response(['messege' => 'berhasil menambahkan buku' . $buku['nama_buku']]);
        } catch (\Throwable $th) {
            return response(['message' => 'terjadi kesalahan ', 'error' => $th], 500);
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $bk)
    {
        $buku = [];
        if (isset($request->buku)) {
            $buku['nama_buku'] = $request->buku;
            if (isset($request->penerbit)) {
                $buku['penerbit'] = $request->penertbit;
                if (isset($request->penulis)) {
                    $buku['penulis'] = $request->penulis;
                    try {
                        DB::table('buku')->where('kb', $bk)->update($buku);
                        return response(['message' => 'berhasil memperbarui buku dengan bk' . $bk]);
                    } catch (\Throwable $th) {
                        return response(['message' => 'terjadi kesalahan', 'eror' . $th], 500);
                    }
                }
            }
        }
    }
    public function destroy($bk)
    {
        try {
            DB::table('buku')->where('kb', $bk)->delete();
            return response(['message' => 'berhasil memperbarui buku dengan bk' . $bk]);
        } catch (\Throwable $th) {
            return response(['message' => 'terjadi kesalahan', 'eror' => $th], 500);
        }
    }
}
