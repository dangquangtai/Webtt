<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $visitor = Visitor::orderBy('updated_at', 'desc')->paginate(30);
        return view('admin.visitor.index', compact('visitor'));
    }
}
