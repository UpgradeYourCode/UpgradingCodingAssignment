<?php

namespace App\Http\Controllers;

use App\Models\Namapaket;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Uang;
use App\Models\Modal;
use App\Models\Stock;
use App\Models\Terjual;


class NamapaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('namapakets')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.terjual.index', ['namapaket' => $data]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = DB::table('anggotas')->get();
        return view('admin.terjual.create', ['data' => $data]);
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'integer|min:1',
        ]);

        Namapaket::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'modal' => 0,
            'untung' => 0,
            'status' => 'Pending',
            ]);
           // dd($request->id);

            $data = DB::table('namapakets')
            ->orderBy('created_at', 'asc')
            ->get();
            
            foreach($data as $row){
                $id = $row->id;
            }
            
            return $this->show($id);
    }

    public function selesai(Request $request)
    {
        //
       // dd($request->id_jual);
       $biayatambah = 0;
       $hargamodal = 0;

       $data[0] = DB::table('uangs')
       ->get();

       $data[1] = DB::table('namapakets')
       ->where('id',$request->id_jual)
       ->get();

        $data[2] = DB::table('terjuals')
        ->where('id_jual',$request->id_jual)
        ->get();

        $data[3] = DB::table('biayatambahs')
        ->where('id_jual',$request->id_jual)
        ->get();

        $data[4] = DB::table('modals')
        ->where('nama',$request->nama)
        ->get();

        foreach($data[0] as $row){
            $modaluangs = $row->modal;
            $pulanguangs = $row->pulang;
            $untungguangs = $row->untung;
        }

        foreach($data[3] as $row){
            $biayatambah += $row->harga;
        }

        foreach($data[1] as $row){
            $hargabarang = $row->harga;
        }

        foreach($data[4] as $row){
            $uanguser = $row->uang;
            $usermodal = $row->harga;
        }

        foreach($data[2] as $row){
            $hargamodal += $row->harga;
        }
        $totalmodal = $hargamodal + $biayatambah;
        $untung = $hargabarang - $totalmodal;

        // duit hasil penjualan di user 
        $uanguser = $uanguser + $hargabarang;

        // modal user nambah kalo ada biaya tambaahan
        $usermodal = $usermodal + $biayatambah;

        // untunng total perushaan
        $untungguangs = $untungguangs + $untung;

        // modal total perusahaan



        //sisah modal
        $modaluangs = $modaluangs - $hargamodal;

        //modal balik
        $pulanguangs = $pulanguangs + $hargamodal + $biayatambah;

        if($untung <= 0){
            return redirect('/admin/terjual/'.$request->id_jual)->with('untung', 'Gk Dapet Untung bego wkwk');
        }

       // dd($untung);

        Namapaket::where('id', $request->id_jual)
        ->update([
            // 'modal' => $totalmodal,
            // 'untung' => $untung,
            'status' => 'Selesai',
        ]);

        Uang::where('id', '1')
        ->update([
            'untung' => $untungguangs,
            'modal' => $modaluangs,
            'pulang' => $pulanguangs,
        ]);

        Modal::where('nama', $request->nama)
        ->update([
            'uang' => $uanguser,
            'harga' =>  $usermodal,
        ]);
        $request->session()->put('status', 'selesai');
        return redirect('/terjual');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Namapaket  $namapaket
     * @return \Illuminate\Http\Response
     */
    public function show($namapaket)
    {
        //
        $data[0] = DB::table('namapakets')
        ->where('id',$namapaket)
        ->get();

        $data[1] = DB::table('stocks')
        ->get();

        $data[2] = DB::table('terjuals')
        ->where('id_jual',$namapaket)
        ->orderBy('created_at','desc')
        ->get();

        $data[3] = DB::table('biayatambahs')
        ->where('id_jual',$namapaket)
        ->orderBy('created_at','desc')
        ->get();
        return view('admin.terjual.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Namapaket  $namapaket
     * @return \Illuminate\Http\Response
     */
    public function edit(Namapaket $namapaket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Namapaket  $namapaket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Namapaket $namapaket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Namapaket  $namapaket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Namapaket $namapaket)
    {
        //
        Namapaket::destroy($namapaket->id);
        return redirect('/terjual');
    }
}
