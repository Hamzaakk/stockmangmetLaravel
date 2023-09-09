<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use App\Models\Demande;
use App\Models\Product;
use App\Models\StockEnier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        // $this->authorize('isAdminn',Profile::class);

        $products =Product::all();
        $demandes = Demande::paginate(12);

        return view('demandes.index',compact('products','demandes'));
    }


    public function mesdemande()
    {
        // $mailer = new sendMail("amin","email@gmail.com");
        $products = Product::all();
        $demandes = Demande::paginate(12);
    
        foreach ($demandes as $demande) {
            $relatedStocks = StockEnier::where('product_id', $demande->product_id)->get();
    
            foreach ($relatedStocks as $stock) {
                if ($demande->status === 'traiter' && $stock->status === 'En_stock' && $stock->quantité >= $demande->quantité) {
                    // Update status to 'accepter' and decrement quantity
                    $demande->update(['status' => 'accepter']);
                    $stock->quantité -= $demande->quantité;
    
                    // Check if quantity becomes 0, update status to 'Epuisé'
                    if ($stock->quantité === 0) {
                        $stock->status = 'Epuisé';
                    }
    
                    $stock->save();
                    break; // Break out of the inner loop once a valid stock is found
                }
            }
        }
    
        return view('demandes.mesDemande', compact('demandes'));
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

   
    public function store(Request $request)
    {
        
    //    dd($request);
        $FormeFildes['profile_id']= $request->profile_id;
        $FormeFildes['product_id'] =$request->product_id;
        $FormeFildes['quantité'] =$request->quantité;
        $FormeFildes['description'] =$request->description;
        $FormeFildes['status'] = 'traiter';
        // $stock = StockEnier::find();
        // $stock = StockEnier::where('product_id',$FormeFildes['product_id']);
        // dd($stock->quantité);
        // $stock->quantité-= $FormeFildes['quantité'];
        // $stock->fill($stock->quantités)->save();

        Demande::create($FormeFildes);
         return to_route('demandes.index')->with('successModal', 'new Demande add successfully');;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
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

     public function accepter(Request $request){
         $demande = Demande::find($request->id);
       
        if (!$demande) {
            return redirect()->back()->with('error', 'Demande not found.');

        }
    
        // Update the attributes using the fill method
        $demande->fill([
            'status' => 'accepter',
            // Add other attributes you want to update here
        ]);
        $stock = StockEnier::where('product_id',$demande->product_id)->get();
      foreach ($stock as $stock ) {

      

        if($stock){
        if($stock->status === 'En_stock'){

       
        if($stock->quantité >= $demande->quantité){

            $stock->quantité -= $demande->quantité;
            $demande->save();
            return to_route('mesDemande')->with('successModal', 'new Demande add successfully');



        }else{
            return to_route('mesDemande')->with('dangerModal', 'new Demande add successfully');

        }
    }else{
        return to_route('mesDemande')->with('dangerModal', 'new Demande add successfully');

    }
       }
     }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */

    public function destroy(Demande $demande)
    {
        $demande->delete();
        return to_route('mesDemande')->with('dangerModal', 'new Demande add successfully');


    }
}
