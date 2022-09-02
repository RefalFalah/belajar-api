<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orangTua = OrangTua::select('namaKepalaKeluarga', 'jumlahAnak', 'id')->get();

        foreach ($orangTua as $data) {
            $data['daftarAnak'] = Anak::select('anak_ke','nama')->where('id_orangTua', $data['id'])->get();
            unset($data['id']);
        }

        return response()->json($orangTua);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orangTua = OrangTua::create([
            'namaKepalaKeluarga' => $request->namaKepalaKeluarga,
            'jumlahAnak' => $request->jumlahAnak,
            'dataAnak' => $request->dataAnak,
            'id_anak' => $request->id_anak
        ]);

        return response()->json([
            'namaKepalaKeluarga' => $orangTua
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrangTua  $orangTua
     * @return \Illuminate\Http\Response
     */
    public function show(OrangTua $orangTua)
    {
        return response()->json([
            'namaKepalaKeluarga' => $orangTua
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrangTua  $orangTua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrangTua $orangTua)
    {
        $orangTua->namaKepalaKeluarga = $request->namaKepalaKeluarga;
        $orangTua->jumlahAnak = $request->jumlahAnak;
        $orangTua->dataAnak = $request->dataAnak;
        $orangTua->save();

        return response()->json([
            'namaKepalaKeluarga' => $orangTua
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrangTua  $orangTua
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrangTua $orangTua)
    {
        $orangTua->delete();

        return response()->json([
            'message' => 'Data dihapus'
        ], 204);
    }
}
