<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PriceController extends Controller
{
    public function AuthLogin()
    {
        $login = Auth::id();
        if ($login) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function show()
    {
        $this->AuthLogin();
        $price = Price::first();
        return view('admin.price.show', compact('price'));
    }

    public function store(Request $request)
    {
        $this->AuthLogin();
        $price = Price::first();
        if (!isset($price)) {
            $price = new Price();
        }
        $price->content = $request->content;
        $price->save();
        return redirect()->back();
    }
}
