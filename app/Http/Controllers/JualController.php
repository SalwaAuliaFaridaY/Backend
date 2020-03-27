<?php

namespace App\Http\Controllers;

use App\Jual;
use Auth; //tambahkan ini
use Illuminate\Http\Request;

class JualController extends Controller
{
    public function index(){
        $data = Jual::all();
        return response($data);
    }

    public function show($id){
        $data = Jual::where('id',$id)->get();
        return response ($data);
    }

    public function store (Request $request){
        try{
          $data = new Jual();
          $data->judul = $request->input('judul');
          $data->kategori = $request->input('kategori');
          $data->jenis = $request->input('jenis');
          $data->deskripsi = $request->input('deskripsi');
          $data->harga = $request->input('harga');
          $data->lokasi = $request->input('lokasi');
          $data->gambar = $request->input('gambar');
          $data->save();
          return response()->json([
            'status'    => '1',
            'message'   => 'Tambah data jual berhasil!'
          ]);
        } catch(\Exception $e){
          return response()->json([
            'status'    => '0',
            'message'   => 'Tambah data jual gagal!'
          ]);
        }
    }

    public function update(Request $request, $id){
        try{
          $data = Jual::where('id',$id)->first();
          $data->judul = $request->input('judul');
          $data->kategori = $request->input('kategori');
          $data->jenis = $request->input('jenis');
          $data->deskripsi = $request->input('deskripsi');
          $data->harga = $request->input('harga');
          $data->lokasi = $request->input('lokasi');
          $data->gambar = $request->input('gambar');
          $data->save();
  
          return response()->json([
            'status'    => '1',
            'message'   => 'Ubah data jual berhasil!'
          ]);
        } catch(\Exception $e){
          return response()->json([
            'status'    => '0',
            'message'   => 'Ubah data jual gagal!'
          ]);
        }
    }

    public function destroy($id){
        try{
          $data = Jual::where('id',$id)->first();
          $data->delete();
  
          return response()->json([
            'status'    => '1',
            'message'   => 'Hapus data jual berhasil!'
          ]);
        } catch(\Exception $e){
          return response()->json([
            'status'    => '0',
            'message'   => 'Hapus data jual gagal!'
          ]);
        }
    }
}
