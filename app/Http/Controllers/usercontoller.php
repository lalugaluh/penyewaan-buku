<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class usercontoller extends Controller
{
    public function index()
    {

        $result = DB::table('user')->get();
        return response($result);
    }
    function getByid($id)
    {
        return response(DB::table('user')->where('id', $id)->get());
    }

    public function store(Request $request)
    {
        $user = [
            'id' => str::random(5),
            'nama_lenkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->emil,
            'alamat' => $request->alamat,
        ];

        try {
            DB::table('user')->insert($user);
            return response(['messege' => 'berhasil menambahkan buku' . $user['nama_lengkap']]);
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
    public function update(Request $request, $id)
    {
        $user = [];
        if (isset($request->user)) {
            $buku['nama_lengkap'] = $request->user;
            if (isset($request->penerbit)) {
                $buku['jenis_kelamin'] = $request->jenis_kelamin;
                if (isset($request->penulis)) {
                    $buku['alamat'] = $request->alamat;
                    try {
                        DB::table('user')->where('id', $id)->update($user);
                        return response(['message' => 'berhasil memperbarui buku dengan bk' . $id]);
                    } catch (\Throwable $th) {
                        return response(['message' => 'terjadi kesalahan', 'eror' . $th], 500);
                    }
                }
            }
        }
    }
    public function destroy($id)
    {
        try {
            DB::table('user')->where('id', $id)->delete();
            return response(['message' => 'berhasil memperbarui buku dengan id' . $id]);
        } catch (\Throwable $th) {
            return response(['message' => 'terjadi kesalahan', 'eror' => $th], 500);
        }
    }
}
