<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockEntierRequest;
use App\Models\Fornisseur;
use App\Models\lieuStock;
use App\Models\Product;
use App\Models\StockEnier;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class StockEnierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get all StockEntier entries with non-zero quantity
        $stockEntier = StockEnier::where('quantité', '>', 0)->paginate(6);
    
        $products = Product::all();
        $fornisseurs = Fornisseur::all();
        $lieux = lieuStock::all();
        $this->authorize('isAdminn',StockEnier::class);
        return view('stockEntier.index', compact('products', 'fornisseurs', 'lieux', 'stockEntier'));
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
    public function store(StockEntierRequest $request)
    {
        $FormFildes = $request->validated();
        $FormFildes['total'] = $request->quantité * $request->priceforOne;
        $FormFildes['stockinit'] = $request->quantité;
        StockEnier::create($FormFildes);
        return to_route('stockenier.index')->with('successModal','new entrées in stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Http\Response
     */
    public function show(StockEnier $stockEnier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Http\Response
     */
    public function edit(StockEnier $stockenier)
    {
        $this->authorize('isAdminn',StockEnier::class);
        $products = Product::all();
        $fornisseurs = Fornisseur::all();
        $lieux = lieuStock::all();
        return view('stockEntier.edit',compact('stockenier','products','fornisseurs','lieux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Http\Response
     */
    public function update(StockEntierRequest $request, StockEnier $stockEnier)
    {
        $this->authorize('isAdminn',StockEnier::class);

        $formFields = $request->validated();
       
        $id = $request->segment(2);
        // dd($id);
        $stockEnier = StockEnier::find($id);
        $formFields['product_id'] = $request->product_id;
        $formFields['fornisseur_id'] = $request->fornisseur_id;
        $FormFildes['stockinit'] = $request->quantité;
        $formFields['lieux_id'] = $request->lieux_id;
        $stockEnier->total = $request->quantité * $request->priceforOne * 1;
        $stockEnier->fill($formFields)->save();

        return redirect()->route('stockenier.index')->with('successModal', 'Stock entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockEnier $stockEnier,Request $request)
    {
        $this->authorize('isAdminn',StockEnier::class);

        $id = $request->segment(2);
        // dd($id);
        $stockEnier = StockEnier::find($id);
        $stockEnier->delete();
        return to_route('stockenier.index')->with('dangerModal','new entrées in stock');

    }
}
