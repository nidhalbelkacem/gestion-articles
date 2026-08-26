<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;
class AuteurController extends Controller
{
    public function index()
    {
        $auteurs = Auteur::withCount('articles')->get();
        return view('auteurs.index', compact('auteurs'));
    }

    public function create()
    {
        return view('auteurs.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:255']);
        Auteur::create($request->all());
        return redirect()->route('auteurs.index')->with('success', 'Auteur ajouté.');
    }

    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit', compact('auteur'));
    }

    public function update(Request $request, Auteur $auteur)
    {
        $request->validate(['nom' => 'required|string|max:255']);
        $auteur->update($request->all());
        return redirect()->route('auteurs.index')->with('success', 'Auteur modifié.');
    }

    public function destroy(Auteur $auteur)
    {
        $auteur->delete();
        return redirect()->route('auteurs.index')->with('success', 'Auteur supprimé.');
    }
}