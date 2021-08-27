<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function AuthLogin()
    {
        $login = Auth::id();
        if ($login) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/login-auth')->send();
        }
    }

    public function login_auth()
    {
        $login = Auth::id();
        if ($login) {
            return Redirect::to('/dashboard');
        }
        return view('admin.auth.login');
    }

    public function login_auth_handle(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return Redirect::to('/dashboard');
        } else {
            Session::flash('message', 'Tài khoản hoặc mật khẩu không đúng!');
            Session::flash('username', $request->email);
            return Redirect::to('/login-auth');
        }
    }

    public function logout_dashboard()
    {
        Auth::logout();
        return redirect()->to('/login-auth');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        $new_contact = Contact::where('contact_status', 0)->count();
        $confirm_contact = Contact::where('contact_status', 1)->count();
        $visitor = Visitor::all()->count();
        $sum_vs = Visitor::all()->sum('count');
        return view('admin.dashboard', compact('new_contact', 'confirm_contact','visitor','sum_vs'));
    }

    //register
    public function register_auth()
    {
        return view('admin.auth.register');
    }

    public function register_auth_handle()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::create(request(['name', 'email', 'password']));
        return redirect()->to('/login-auth');
    }

    public function change_quantity_view($value)
    {
        $this->AuthLogin();
        if (is_numeric($value)) {
            Session::put('admin_quantity_view', $value);
        }
        return redirect()->back();
    }
}
