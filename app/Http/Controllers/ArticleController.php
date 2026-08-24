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
     * Enregistre un nouvel article
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur_id' => 'required|exists:auteurs,id',
            'categorie_id' => 'required|exists:categories,id',
            'contenu' => 'nullable|string',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
    }

    /**
     * Affiche un article spécifique (non utilisé ici, mais requis par le resource controller)
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
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
}