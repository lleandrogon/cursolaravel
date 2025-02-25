<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteController extends Controller
{
    public function index()
    {
        // return "index";

        $produtos = Produto::paginate(3);

        return view('site/home', compact('produtos'));
    }

    public function details($slug)
    {
        $produto = Produto::where('slug', $slug)->first();

        return view('site/details', compact('produto'));
    }
}
