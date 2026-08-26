<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Redirige vers la liste des articles.
     */
    public function index()
    {
        return redirect()->route('articles.index');
    }
}