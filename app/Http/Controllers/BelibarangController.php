<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Belibarang;
use App\Models\Anggota;
use App\Models\Uang;
use App\Models\Modal;
use App\Models\Stock;

class BelibarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('belibarangs')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.belibarang.index', ['belibarang' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = DB::table('anggotas')
        ->orderBy('nama', 'desc')
        ->get();
        return view('admin.belibarang.create', ['data' => $data]);
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
            'harga' => 'integer|min:1',
            'stock' => 'integer|min:1',
            'nama' => 'required',
        ]);

        $data_modal = DB::table('modals')
        ->where('nama',$request->nama)->get();

        $data_uang = DB::table('uangs')->get();

        $data_stock = DB::table('stocks')->get();

        if($data_stock->isEmpty()){//cek kosong atau tidak 
            $term = 0;
        }
            
        foreach($data_stock as $data2){
            if($data2->jenis == $request->jenis){
                $term = 1;
                break;
            }else{
                $term = 0;
            }
            
        }

            //Tambah MODAL total
        foreach($data_uang as $data){
            $untung = $data->untung;
            $modal = $data->modal;
        }
        $modal = $modal + $request->harga;  
        Uang::where('id', '1')
        ->update([
            'untung'=>$untung,
            'modal'=>$modal,
        ]);

        //Tambah Modal Anggota
        foreach($data_modal as $data1){
            $modal_anggota = $data1->harga;
        }
        $modal_anggota = $modal_anggota + $request->harga;
        Modal::where('nama', $request->nama)
        ->update([
            'nama'=>$request->nama,
            'harga'=>$modal_anggota,
        ]);


            if($term == 1){
         //mencari harga satuan
         $tambah = DB::table('stocks')->where('jenis',$request->jenis)->get();
         foreach($tambah as $data3){
            $tambahstock = $data3->stock;
        }
         $hargasatuan = $request->harga/$request->stock;
         $tambahstock = $tambahstock  + $request->stock;
        // dd($tambahstock);
         //$hargasatuan = number_format((float)$hargasatuan, 2, '.', '');
        // dd($hargasatuan);           
        Stock::where('jenis', $request->jenis)
        ->update([
            'jenis'=> $request->jenis,
            'stock'=>$tambahstock,
            'hargasatuan'=> 132.3333,
            ]);

    }else{
        $hargasatuan = $request->harga/$request->stock;
//$hargasatuan = number_format((float)$hargasatuan, 2, '.', '');
        //dd($hargasatuan);       
       Stock::create([
           'jenis' => $request->jenis,
           'stock' => $request->stock,
           'hargasatuan' => $hargasatuan,
           ]);
    }


        Belibarang::create([
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'nama' => $request->nama,
            
        ]);


        return redirect('/belibarang')->with('Status', 'Berhasil Ditambah Dan masukan Ukuran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Belibarang  $belibarang
     * @return \Illuminate\Http\Response
     */
    public function show(Belibarang $belibarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Belibarang  $belibarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Belibarang $belibarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Belibarang  $belibarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Belibarang $belibarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Belibarang  $belibarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Belibarang $belibarang)
    {
        //
    }
}
