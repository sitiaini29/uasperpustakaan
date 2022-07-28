<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Petugas;

class PetugasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['index']]);
    }
    public function index()
    {
        //untuk mencari 1 data tabel
        //$data = Petugas::all();
        $data = Petugas::with('anggota','buku','peminjaman','pengembalian')->get();

        return response()->json($data, 200);
    }
    public function show($id)
    {
        //menampilkan data per id
        //$data = Petugas::where('id', $id)->first();
        $data = Petugas::with('anggota','buku','peminjaman','pengembalian')->where('id', $id)->first();

    if (empty($data)) {
        return response()->json([
            'pesan' => 'Data tidak ditemukan',
            'data' => $data
        ], 404);
    }

    return response()->json([
        'pesan' => 'Data ditemukan',
        'data' => $data
    ], 200);
    }
    public function store(Request $request)
    {
        // proses validasi
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required|min:5',
            
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Petugas::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json($id, 200);
        $data = Petugas::where('id', $id)->first();

        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required|min:5',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan perubahan data
        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }

    public function delete($id)
    {
        $data = Petugas::where('id', $id)->first();
        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }
}
