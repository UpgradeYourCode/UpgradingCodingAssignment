<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Belibarang;
use App\Models\Anggota;
use App\Models\Uang;
use App\Models\Modal;
use App\Models\Stock;


class HomeController extends Controller
{
    //
    public function index()
    {

        // if(session('level')){
        //     dd('masuk');
        // }else{
        //     dd('ggal');
        // }

        $data[1] = DB::table('uangs')
        ->get();

        if ($data[1]->isEmpty()){
            Uang::create([
                'untung' => 0,
                'modal' => 0,
                'pulang' => 0,
                ]);
        }
        //
        $data[0] = DB::table('modals')
        ->orderBy('nama', 'desc')
        ->get();

        

        $data[2] = DB::table('stocks')
        ->get();

        return view('admin.home.index',['data' => $data]);

    }
    public function create()
    {
        //
        return view('admin.home.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
        ]);

        Anggota::create([
            'nama' => $request->nama,
        ]);

        Modal::create([
            'uang' => 0,
            'harga' => 0,
            'nama' => $request->nama,
            
        ]);

        return redirect('/')->with('Status', 'Berhasil Ditambah Dan masukan Ukuran');
    }
    public function destroy1(Modal $modal)
    {
        //
        Anggota::destroy($modal->id);
        Uang::destroy($modal->id);
        return redirect('/');
    }
    public function destroy2(Uang $uang)
    {
        //
        Modal::destroy($uang->id);
        return redirect('/');
    }
    public function destroy3(Stock $stock)
    {
        //
        Stock::destroy($stock->id);
        return redirect('/');
    }

}
