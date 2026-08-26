<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Auteur;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Affiche la liste des articles avec filtres (recherche, catégorie, auteur)
     */
    public function index(Request $request)
    {
        $query = Article::with(['categorie', 'auteur']);

        if ($request->filled('search')) {
            $query->where('titre', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('categorie_id')) {
            $query->where('categorie_id', $request->categorie_id);
        }

        if ($request->filled('auteur_id')) {
            $query->where('auteur_id', $request->auteur_id);
        }

        $articles = $query->paginate(10)->appends($request->query());

        $categories = Categorie::all();
        $auteurs = Auteur::all();

        return view('articles.index', compact('articles', 'categories', 'auteurs'));
    }

    /**
     * Affiche le formulaire de création d'un article
     */
    public function create()
    {
        $categories = Categorie::all();
        $auteurs = Auteur::all();

        return view('articles.create', compact('categories', 'auteurs'));
    }

    /**
     * Enregistre un nouvel article.
     * Si l'auteur ou la catégorie tapés n'existent pas encore, ils sont créés automatiquement.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur_nom' => 'required|string|max:255',
            'categorie_nom' => 'required|string|max:255',
            'contenu' => 'nullable|string',
        ]);

        $auteur = Auteur::firstOrCreate(['nom' => trim($request->auteur_nom)]);
        $categorie = Categorie::firstOrCreate(['nom' => trim($request->categorie_nom)]);

        Article::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'auteur_id' => $auteur->id,
            'categorie_id' => $categorie->id,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'un article
     */
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        $auteurs = Auteur::all();

        return view('articles.edit', compact('article', 'categories', 'auteurs'));
    }

    /**
     * Met à jour un article existant.
     * Si l'auteur ou la catégorie tapés n'existent pas encore, ils sont créés automatiquement.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur_nom' => 'required|string|max:255',
            'categorie_nom' => 'required|string|max:255',
            'contenu' => 'nullable|string',
        ]);

        $auteur = Auteur::firstOrCreate(['nom' => trim($request->auteur_nom)]);
        $categorie = Categorie::firstOrCreate(['nom' => trim($request->categorie_nom)]);

        $article->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'auteur_id' => $auteur->id,
            'categorie_id' => $categorie->id,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article modifié avec succès.');
    }

    /**
     * Supprime un article
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé.');
    }
}