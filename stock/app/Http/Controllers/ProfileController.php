<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Mail\sendMail;
use App\Models\departement;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Psy\Formatter\Formatter;

use function Ramsey\Uuid\v1;

class ProfileController extends Controller
{
    public function index()
    {
      $this->authorize('isAdminn',Profile::class);

       $profiles = Profile::paginate(6);
       $departements = departement::all();

       return view('profiles.index',compact('profiles','departements'));

    }
    public function store(ProfileRequest $request)
    {
      // $mailer = new sendMail($request->name,$request->email);
      // // $mailer->content($Formfildes['password']);
      // Mail::to('akkaouih17@gmail.com')->send($mailer);
        $Formfildes = $request->validated();
        $Formfildes['password'] = Hash::make($request->password);
        //move uploded file 
        $Formfildes['departemen_id'] = $request->departemen_id;
    
        $Formfildes['image'] = $request->file('image')->store('images/profiles','public');
        Profile::create($Formfildes);
        return to_route('profiles.index')->with('addUser','new user is created');


    }
    public function edit(Profile $profile)
     {         
      $this->authorize('isAdminn',Profile::class);
      $user_id= Auth::id();
     if($user_id !== $profile->id){
        return abort(401);
     }
        $departements = departement::all();
        return view('profiles.edit',compact('profile','departements'));
     }
     public function editAction(ProfileRequest $request,Profile $profile) {
        $Formfildes = $request->validated();
        $Formfildes['password'] = Hash::make($request->password);
        $Formfildes['departemen_id'] = $request->departemen_id;
        $this->uploadImage($request,$Formfildes);
        $profile->fill($Formfildes)->save();
        return to_route('profiles.index');
     }
     public function destroy(Profile $profile)
     {     
      $this->authorize('isAdminn',Profile::class);

        $profile->delete();
         return redirect()->route('profiles.index'); 
     }

     public function profile()
     {    
          $user_id = Auth::id();
          $user =  Profile::find($user_id);
         //  dd($user);
          return view('profiles.profile',compact('user'));
     }
     private function uploadImage(ProfileRequest $request,array &$Formfildes)
     {
      unset($Formfildes['image']);
      if($request->hasFile('image'))
      {
         $Formfildes['image'] = $request->file('image')->store('images/profiles','public');
      }
     }
 }

