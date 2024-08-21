<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Méthode pour récuperer toutes les taches et les afficher
    public function index(){
        $categories = Category::paginate(5);
        return view('category.index', compact('categories'));
    }

    //Méthode pour créer une nouvelle categorie
    public function create(){
        return view('category.create');
    }

    //Méthode pour valider les données et les stocker dans la base de données
    public function store(Request $request){
        $request->validate([
            'name' => ['required','min:5', "regex:/^[A-Za-z\sàéèêîïç\-_'.,;]+$/"],
        ]);

        $nouvelleCategorie = new Category();
        $nouvelleCategorie -> name = $request -> name;
        $nouvelleCategorie -> save();
        return redirect('/category')->with('success','Enregistrement éffectué');
    }

    //Méthode pour récupérer la catégorie à mettre à jour
    public function update($id){
        $categoryConcerne = Category::find($id);
        return view('category.update', compact('categoryConcerne'));
    }

    //Méthode pour mettre à jour la catégorie récupérée
    public function storeUpdate(Request $request){
        $request->validate([
            'name' => ['required','min:5', "regex:/^[A-Za-z\sàéèêîïç\-_'.,;]+$/"],
        ]);

        $categoryConcerne = Category::find($request->id);
        $categoryConcerne -> name = $request -> name;
        $categoryConcerne -> update();
        return redirect('/category')->with('success','La mise à jour été éffectuée !');
    }

    //Méthode pour supprimer une categorie
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success','La suppression a été éffectuée avec succès !');
    }
}