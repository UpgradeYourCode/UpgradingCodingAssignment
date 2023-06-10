<?php

namespace App\Http\Controllers;

use App\Models\Biayatambah;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Uang;
use App\Models\Modal;
use App\Models\Stock;
use App\Models\Terjual;
use App\Models\Namapaket;

class BiayatambahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd('asd');
        $validatedData = $request->validate([
            'deskripsi' => 'required',
            'harga' => 'integer|min:1',
        ]);
            
       // dd($harga);
       $namapaket = DB::table('namapakets')
       ->where('id',$request->id_jual)
       ->get();

       foreach($namapaket as $row){
        $modal = $row->modal;
        $hargabarang = $row->harga;

        }
         $modal = $modal + $request->harga;

         Namapaket::where('id', $request->id_jual)
         ->update([
             'modal' => $modal,
             'untung' => $hargabarang - $modal,
         ]);

       Biayatambah::create([
            'id_jual' => $request->id_jual,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            ]);

           
            return redirect('/admin/terjual/'.$request->id_jual);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biayatambah  $biayatambah
     * @return \Illuminate\Http\Response
     */
    public function show(Biayatambah $biayatambah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biayatambah  $biayatambah
     * @return \Illuminate\Http\Response
     */
    public function edit(Biayatambah $biayatambah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biayatambah  $biayatambah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biayatambah $biayatambah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biayatambah  $biayatambah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biayatambah $biayatambah, Request $request)
    {
        //
        $namapaket = DB::table('namapakets')
        ->where('id',$request->id_jual)
        ->get();

        foreach($namapaket as $row){
            $modal = $row->modal;
            $hargabarang = $row->harga;
            $status = $row->status;
 
        }
        if($status == 'Selesai'){
            return redirect('/admin/terjual/'.$request->id_jual)->with('surat', 'Tidak bisa delete karena sudah selesai');
        }

        $modal = $modal - $biayatambah->harga;
        Namapaket::where('id', $request->id_jual) //kurang modal
        ->update([
            'modal' => $modal,
            'untung' =>  $hargabarang-$modal,
        ]);

        Biayatambah::destroy($biayatambah->id);
        return redirect('/admin/terjual/'.$request->id_jual);



    }
}
