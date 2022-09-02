<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anak = Anak::where('id_orangTua', 2)->get();
        foreach ($anak as $data) {
            $data['anak_ke'];
            $data['nama'];
        }
        return response()->json($anak);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anak = Anak::create([
            'anak_ke' => $request->anak_ke,
            'nama' => $request->nama,
        ]);

        return response()->json([
            'data' => $anak
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function show(Anak $anak)
    {
        return response()->json([
            'data' => $anak
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anak $anak)
    {
        $anak->anak_ke = $request->anak_ke;
        $anak->nama = $request->nama;
        $anak->save();

        return response()->json([
            'data' => $anak
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anak $anak)
    {
        $anak->delete();

        return response()->json([
            'message' => 'Data dihapus'
        ], 204);
    }
}
