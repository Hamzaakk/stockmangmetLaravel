<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\archive;
use App\Models\Demande;
use App\Models\Fornisseur;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;

class homeApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::all();
        $fornisseur = Fornisseur::all();
        $size = count($fornisseur);
        $demandes['nomber'] = $size;
        return $demandes;
    }
    
    public function products()
    {
        $products = Product::all();
        return $products;
    }

    public function useres(){
     $useres = Profile::all();
     return $useres;
    }



    public function archive()
    {
        $archive = archive::all();
        return $archive;
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
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        // return dd($demande);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
