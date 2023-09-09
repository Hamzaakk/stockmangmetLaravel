<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Employée;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
     public function index(){
        $employes = Employée::paginate(12);
        return view('employées.index',compact('employes'));
     }
     public function create(){
      $services = Service::all();
      return view('employées.create',compact('services'));

     }

     public function store(Request $request) {
     
      $Formfildes['name'] = $request->name;
      $Formfildes['phone'] = $request->phone;
      $Formfildes['service_id'] = $request->service_id;
      $Formfildes['adresse'] = $request->adresse;
      $this->uploadImage($request,$Formfildes);
 
      Employée::create($Formfildes);
      return to_route('employées.index');
 
 
   }

  public function destroy(Request $employe)
  {
   // dd($employe->id);
   $employe = Employée::find($employe->id);
   // dd($employe);
   $employe->delete();
   return to_route('employées.index');

  }


  public function edit(Request $employe)
  {    
     $services = Service::all();
    return view('employées.edit',compact('services','employe'));
  }

  public function update(Request $request)
  {    

  $employe = Employée::find($request->id);
//   dd($employe);
   $Formfildes['name']= $request->name;
   $Formfildes['phone']= $request->phone;
   $Formfildes['adresse']= $request->adresse;
   $Formfildes['service_id'] = $request->service_id;
   $this->uploadImage($request,$Formfildes);

   // dd($Formfildes['name']);
   $employe->fill($Formfildes)->save();
   return to_route('employées.index')->with('successModal', 'update Employée');


  }

  public function mesdemandes(){
   $user_id = Auth::id();
   
   $demandes = DB::table('demandes')->where('profile_id',2)->paginate(7);
   // $demandes = $demandes::paginate(7);
   // dd($demandes);
   return view('demandes.Userdemandes',compact('user_id','demandes'));
   

  }
   private function uploadImage(Request $request,array &$Formfildes)
   {
    unset($Formfildes['image']);
    if($request->hasFile('image'))
    {
       $Formfildes['image'] = $request->file('image')->store('images/employées','public');
    }
   }
}
