<?php

namespace App\Http\Controllers;

use App\Http\Requests\lieuxRequest;
use App\Models\lieuStock;
use Illuminate\Http\Request;

class LieuStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $localisations = lieuStock::paginate(8);
        return view('stock.lieu.index',compact('localisations'));
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
    public function store(lieuxRequest $request)
    {
        lieuStock::create($request->validated());
        return to_route('stockslieu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lieuStock  $lieuStock
     * @return \Illuminate\Http\Response
     */
    public function show(lieuStock $lieuStock)
    {
        
    }

    
    public function edit(lieuStock $lieuStock,Request $request)
    {
        $id = $request->segment(2);
        // dd($id);
       $lieuStock= lieuStock::findOrfail($id);
        return view('stock.lieu.edit',compact('lieuStock'));
        // dd($localisation->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lieuStock  $lieuStock
     * @return \Illuminate\Http\Response
     */
    public function update(lieuxRequest $request, lieuStock $lieuStock)
    {
        $id = $request->segment(2);
        $lieuStock = lieuStock::findOrFail($id);
        $Formfildes = $request->validated();
        $lieuStock->fill($Formfildes)->save();
        return redirect()->route('stockslieu.index');    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lieuStock  $lieuStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->segment(2);
        $lieuStock = lieuStock::findOrFail($id);
        $lieuStock->delete();
        return to_route('stockslieu.index');

    }
}
