<?php

namespace App\Http\Controllers;

use App\Models\Uang;
use Illuminate\Http\Request;

class UangController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uang  $uang
     * @return \Illuminate\Http\Response
     */
    public function show(Uang $uang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uang  $uang
     * @return \Illuminate\Http\Response
     */
    public function edit(Uang $uang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uang  $uang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uang $uang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uang  $uang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uang $uang)
    {
        //
        Uang::destroy($uang->id);
        return redirect('/');
    }
}
