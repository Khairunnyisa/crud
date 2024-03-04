<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buah = Fruit::all();
        return view('fruit.index', compact('buah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fruit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $pesan = [
            'nama_buah.required' => 'Nama buah masih kosong',
            'harga.required' => 'Harga masih kosong',
            'harga.min' => 'Harga tidak mencukupi',
        ];

        $request->validate([
            'nama_buah'     =>'required',
            'harga'     =>'required|min:4',
        ], $pesan);

        $buah = new Fruit();


        $buah->nama_buah = $request->nama_buah;
        $buah->harga = $request->harga;

        $buah->save();

        return redirect()->route('fruit.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //fruit:model/data, findorfail(bener gasi datanya bener?)
        $buah = Fruit::findOrFail($id);
        //return view(nampilin), compact:ngebawa data 
        return view('fruit.show', compact('buah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buah = Fruit::findOrFail($id);
        return view('fruit.edit', compact('buah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buah = Fruit::findOrFail($id);

        $buah->nama_buah = $request->nama_buah;
        $buah->harga = $request->harga;

        $buah->update();

        return redirect()->route('fruit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $buah = Fruit::findOrFail($id);
       $buah->delete();
       return redirect()->route('fruit.index');
    }
}
