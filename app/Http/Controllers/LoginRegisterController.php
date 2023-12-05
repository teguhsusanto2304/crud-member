<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard','profile','add','save','edit','update_admin','destroy'
        ]);
    }
    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }
    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'phone_number'=>'required',
            'ic_number'=>'required',
            'image_path'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|min:8|confirmed'
        ]);
        $imageName = time()."_".$request->image_path->getClientOriginalName();
        $request->image_path->move('public/images', $imageName);
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image_path'=> $imageName,
            'phone_number'=>$request->phone_number,
            'ic_number'=>$request->ic_number,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=>$request->gender,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'phone_number'=>'required',
            'ic_number'=>'required',
        ]);
        //$imageName = time()."_".$request->image_path->getClientOriginalName();
        //$request->image_path->move('public/images', $imageName);
        \App\Models\User::update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number'=>$request->phone_number,
            'ic_number'=>$request->ic_number,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=>$request->gender,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }
    /**
     * Store a newly admin created resource in storage.
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        try {
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => true,
            'password' => Hash::make($request->password)
        ]);
    } catch(\Exception $ex){ 
        return redirect()->route('dashboard')
        ->withErrors($ex->getMessage());
      }

        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered new admin!');
    }
    public function update_admin(Request $request,$id)
    {
        $data = \App\Models\User::find($id);
        if($data->is_admin==true){
            $request->validate([
                'name' => 'required|string|max:250',
            ]);
            $data->name = $request->name;
            $data->save();
        } else {
            $request->validate([
                'name' => 'required|string|max:250',
                'phone_number'=>$request->phone_number,
                'ic_number'=>$request->ic_number,
                'date_of_birth'=>$request->date_of_birth,
                'gender'=>$request->gender,
            ]);
            $data->name = $request->name;
            $data->ic_number = $request->ic_number;
            $data->date_of_birth = $request->date_of_birth;
            $data->gender = $request->gender;
            $data->save();
        }
    
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully updated admin data!');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 
    
    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            $isAdmin = Auth::user()->is_admin;
            if(Auth::user()->is_admin==true){
            $users = \App\Models\User::where('id', '!=', Auth::user()->id)->get();
            return view('auth.dashboard',compact('users','isAdmin'));
            } else {
                $user = Auth::user();
            return view('auth.dashboard',compact('user','isAdmin'));
            }
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    public function profile($id)
    {
        if(Auth::check())
        {
                $user = \App\Models\User::find($id);
            return view('auth.view',compact('user'));
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    public function add()
    {
        if(Auth::check())
        {
            return view('auth.add');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
    public function edit($id)
    {
        if(Auth::check())
        {
            $user = \App\Models\User::find($id);
            return view('auth.edit',compact('user'));
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    } 
    public function destroy($id)
    {
        if(Auth::check())
        {
            $user = \App\Models\User::find($id);
            $user->delete();
            return redirect()->route('dashboard')
        ->withSuccess('You have successfully deleted user!');
        }
       
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }   
}
