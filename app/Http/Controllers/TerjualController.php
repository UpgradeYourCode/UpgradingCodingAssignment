<?php

namespace App\Http\Controllers;

use App\Models\Terjual;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Uang;
use App\Models\Modal;
use App\Models\Stock;
use App\Models\Namapaket;

class TerjualController extends Controller
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
        $validatedData = $request->validate([
            'jenis' => 'required',
            'stock' => 'integer|min:1',
        ]);
       $totalharga = 0;
            
        $data = DB::table('stocks')->get();

        $namapaket = DB::table('namapakets')
        ->where('id',$request->id_jual)
        ->get();

        foreach($data as $row){

             if($request->jenis == $row->jenis){
                 if($row->stock >= $request->stock){ //periksa stock
                 $harga = $row->hargasatuan;
                 $stock = $row->stock - $request->stock;
                 $id_stock = $row->id;
                 }else{
                    return redirect('/admin/terjual/'.$request->id_jual)->with('surat', 'Stock Terbatas');
                 }

             }

        }
        $harga =  $request->stock * $harga;
       // dd($harga);

       foreach($namapaket as $row){
           $modal = $row->modal;
           $hargabarang = $row->harga;

       }
       $modal = $modal + $harga;

        Terjual::create([
            'id_jual' => $request->id_jual,
            'jenis' => $request->jenis,
            'stock' => $request->stock,
            'harga' => $harga,
            ]);

            Namapaket::where('id', $request->id_jual)
            ->update([
                'modal' => $modal,
                'untung' => $hargabarang - $modal,
            ]);


            Stock::where('id', $id_stock)
            ->update([
                'stock' => $stock,
            ]);

            
            return redirect('/admin/terjual/'.$request->id_jual);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terjual  $terjual
     * @return \Illuminate\Http\Response
     */
    public function show($terjual)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terjual  $terjual
     * @return \Illuminate\Http\Response
     */
    public function edit(Terjual $terjual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terjual  $terjual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terjual $terjual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terjual  $terjual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terjual $terjual, Request $request)
    {
        //
        //dd($terjual->all());
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

        $modal = $modal - $terjual->harga;
        Namapaket::where('id', $request->id_jual) //kurang modal
        ->update([
            'modal' => $modal,
            'untung' =>  $hargabarang-$modal,
        ]);

        $data = DB::table('stocks')->get();
        foreach($data as $row){

            if($terjual->jenis == $row->jenis){ //TAMBAH STOCK
                $stock = $row->stock + $terjual->stock;
                $id_stock = $row->id;

            }

       }

       Stock::where('id', $id_stock)
       ->update([
           'stock' => $stock,
       ]);


        Terjual::destroy($terjual->id);
        return redirect('/admin/terjual/'.$request->id_jual);
    }
}
