<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Auteur;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Categorie::all();
        $auteurs = Auteur::all();

        $articles = [
            [
                'titre' => 'Les tendances technologiques de 2026',
                'contenu' => 'Un aperçu des innovations technologiques marquantes de cette année.',
                'categorie' => 'Technologie',
                'auteur' => 'Ahmed Ben Ali',
            ],
            [
                'titre' => 'Résultats de la Coupe du Monde',
                'contenu' => 'Retour sur les moments forts de la compétition.',
                'categorie' => 'Sport',
                'auteur' => 'Sarah Trabelsi',
            ],
            [
                'titre' => 'Exposition d\'art contemporain à Tunis',
                'contenu' => 'Une exposition qui met en lumière de jeunes artistes tunisiens.',
                'categorie' => 'Culture',
                'auteur' => 'Karim Jendoubi',
            ],
            [
                'titre' => 'L\'économie tunisienne en croissance',
                'contenu' => 'Analyse des derniers indicateurs économiques du pays.',
                'categorie' => 'Économie',
                'auteur' => 'Nadia Sassi',
            ],
            [
                'titre' => 'Conseils pour une alimentation saine',
                'contenu' => 'Les bonnes pratiques à adopter au quotidien.',
                'categorie' => 'Santé',
                'auteur' => 'Ahmed Ben Ali',
            ],
            [
                'titre' => 'Intelligence artificielle et emploi',
                'contenu' => 'Comment l\'IA transforme le marché du travail.',
                'categorie' => 'Technologie',
                'auteur' => 'Sarah Trabelsi',
            ],
        ];

        foreach ($articles as $data) {
            Article::create([
                'titre' => $data['titre'],
                'contenu' => $data['contenu'],
                'categorie_id' => $categories->where('nom', $data['categorie'])->first()->id,
                'auteur_id' => $auteurs->where('nom', $data['auteur'])->first()->id,
            ]);
        }
    }
}