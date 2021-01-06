<?php


namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Console;

//use Illuminate\Database\Eloquent\Model;
//use App\Models\Test;


 
class AuthController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  
 
    public function registration()
    {
        return view('registration');
    }
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    public function postadminLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
       echo "input $request";
        if (Auth::attempt($credentials)) {
            //Get the currently authenticated user...
             $user = Auth::user();
             if($user->user_role == "admin"){
                return redirect()->intended('products');
             }
             else{
               return Redirect::to("admin")->with('fail','Oppes! you dont have a admin role');
             }
          

        }
        
         return Redirect::to("admin")->with('success','Oppes! You have entered invalid credentials');
     }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        //$check = $this->create($data);
        $check = $this->create_user($data);
       
        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    public function create_user(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('dashboard');
      }
       return Redirect::to("dashboard")->withSuccess('Opps! You do not have access');
    }
    public function admindashboard()
    {
 
      if(Auth::check()){
        return view('admindashboard');
      }
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
 
    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}