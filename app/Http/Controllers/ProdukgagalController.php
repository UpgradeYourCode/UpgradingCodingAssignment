<?php

namespace App\Http\Controllers;

use App\Models\Produkgagal;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Uang;
use App\Models\Modal;
use App\Models\Stock;
use App\Models\Terjual;

class ProdukgagalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('produkgagals')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.produkgagal.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data[0] = DB::table('stocks')->get();
        $data[1] = DB::table('anggotas')->get();
        return view('admin.produkgagal.create', ['data' => $data[0]], ['anggota' => $data[1]]);
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
            'jenis' => 'required',
            'stock' => 'integer|min:1',
        ]);

            $data[0] = DB::table('uangs')
            ->get();
     
            $data[1] = DB::table('stocks')
            ->where('jenis',$request->jenis)
            ->get();
     
             $data[2] = DB::table('modals')
             ->where('nama',$request->nama)
             ->get();


             foreach($data[0] as $row){
                $modalilang = $row->modal;
            }
            foreach($data[1] as $row){
                $stockilang = $row->stock;
                $hargasatuan = $row->hargasatuan;
            }
            foreach($data[2] as $row){
                $modaluser = $row->harga;
            }


            $totalrugi = $hargasatuan * $request->stock;

            if($stockilang >= $request->stock && $modaluser >= $totalrugi && $modalilang >= $totalrugi){

                $stockilang = $stockilang - $request->stock;
                $modaluser = $modaluser - $totalrugi;
                $modalilang = $modalilang - $totalrugi;


                Uang::where('id', 1)
                ->update([
                    'modal' => $modalilang,
                ]);

                Modal::where('nama', $request->nama)
                ->update([
                    'harga' => $modaluser,
                ]);

                Stock::where('jenis', $request->jenis)
                ->update([
                    'stock' =>  $stockilang,
                ]);

                Produkgagal::create([
                    'nama' => $request->nama,
                    'jenis' => $request->jenis,
                    'stock' => $request->stock,
                    'harga' => $totalrugi,
                    ]);


            }else{
                // dd('asd2');
                 return redirect()->route('gagalcreate')->with('ggal', 'Stock Terbatas');
             }

             return redirect('/produkgagal');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produkgagal  $produkgagal
     * @return \Illuminate\Http\Response
     */
    public function show(Produkgagal $produkgagal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produkgagal  $produkgagal
     * @return \Illuminate\Http\Response
     */
    public function edit(Produkgagal $produkgagal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produkgagal  $produkgagal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produkgagal $produkgagal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produkgagal  $produkgagal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produkgagal $produkgagal)
    {
        //
    }
}
