<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornisseurRequest;
use App\Models\Fornisseur;
use Illuminate\Http\Request;

class FornisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdminn',Fornisseur::class);
       $fornisseurs = Fornisseur::paginate(5);
        return view('fornisseur.index',compact('fornisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdminn',Fornisseur::class);

        return view('fornisseur.craete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FornisseurRequest $request)
    {
        $Formfildes = $request->validated();
        $this->uploadImage($request,$Formfildes);
        Fornisseur::create($Formfildes);
        return to_route('fornisseurs.index')->with('success',' new Fornisseur is created');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fornisseur $fornisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornisseur $fornisseur)
    { 
        $this->authorize('isAdminn',Fornisseur::class);

        return view('fornisseur.edit',compact('fornisseur'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function update(FornisseurRequest $request, Fornisseur $fornisseur)
    {
        $Formfildes = $request->validated();
        $this->uploadImage($request,$Formfildes);
        $fornisseur->fill($Formfildes)->save();
        return to_route('fornisseurs.index')->with('success',"product $fornisseur->name is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornisseur $fornisseur)
    {
        $this->authorize('isAdminn',Fornisseur::class);

        $fornisseur->delete();
        return redirect()->route('fornisseurs.index');    }
    private function uploadImage(FornisseurRequest $request,array &$Formfildes)
    {
     unset($Formfildes['image']);
     if($request->hasFile('image'))
     {
        $Formfildes['image'] = $request->file('image')->store('images/fornisseurs','public');
     }
    }
}
