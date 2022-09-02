<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = Biodata::all();

        return response()->json([
            'data' => $biodata
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $biodata = Biodata::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'hoby' => $request->hoby
        ]);

        return response()->json([
            'data' => $biodata
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(Biodata $biodata)
    {
        return response()->json([
            'data' => $biodata
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biodata $biodata)
    {
        $biodata->nama = $request->nama;
        $biodata->umur = $request->umur;
        $biodata->hoby = $request->hoby;
        $biodata->save();

        return response()->json([
            'data' => $biodata
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biodata $biodata)
    {
        $biodata->delete();

        return response()->json([
            'message' => 'biodata deleted'
        ], 204);
    }
}
