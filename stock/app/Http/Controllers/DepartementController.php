<?php

namespace App\Http\Controllers;

use App\Http\Requests\departementRequest;
use App\Models\departement;
use App\Models\Service;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('isAdminn',Profile::class);

       $departements= departement::paginate(6);
       $services = Service::all();
        return view('departement.index',compact('departements','services'));
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
    public function store(departementRequest $request)
    {
        $newDepartement = $request->validated();
        departement::create($newDepartement);
        return to_route('departement.index')->with('success',"Departement $request->name is created");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(departement $departement)
    {
       return   view('departement.edit',compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(departementRequest $request, departement $departement)
    {
        $Formfildes = $request->validated();
        $departement->fill($Formfildes)->save();
        return redirect()->route('departement.index');    


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(departement $departement)
    {
        $departement->delete();
        return redirect()->route('departement.index');    
     }
}
