<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PDOException;

class LoginController extends Controller
{
    public function login()
    {
         return view('login.login');
    }

    public function loginAction( Request $request) {
        // dd($request);
        $password = $request->password;
        // $password = Hash::make($password);
        $login = $request->email;
    //     $mailer = new sendMail('generic user',$request->email);
    //   Mail::to('akkaouih17@gmail.com')->send($mailer);
        $values = ['email'=>$login ,'password'=>$password];
        // dd($values);
        try{
            if(Auth::attempt($values)){
                return to_route('home');
              }else{
               return redirect()->back()->withInput()->with(['login' => 'Invalid email or password']);
              }
        }catch(PDOException $error)
        {
               return redirect('https://colorlib.com/etc/404/colorlib-error-404-1/');


        }
      
    }

    public function send(Request $request){
    //     $mailer = new sendMail('generic user',$request->email);
    //   Mail::to('akkaouih17@gmail.com')->send($mailer);
   $email= $request->email;
    return view('profiles.reset',compact('email'));

    }

    
    public function verify($hash)
    {    
        // dd($hash);
        $decode = explode('///',base64_decode($hash));
        $email = $decode[0];
        // dd($email);
        // return view('profiles.reset',compact('email'));
        $user = Profile::where('email', $email)->first();
        if($user){

        }


    }
  public function reset(Request $request){
   $email = $request->email;
//    dd($email);
$user = Profile::where('email', $email)->first();
if($user){
    // $mailer = new sendMail('generic user',$request->email);
    //   Mail::to('akkaouih17@gmail.com')->send($mailer);
    //   return to_route('confirme');
    $user->password = Hash::make($request->password);
    $user->save();
    return to_route('login');
}else{
    return to_route('login');
}

  }


    public function logout(Request $request) {
        Auth::logout();
        return to_route('login');
    }
}
