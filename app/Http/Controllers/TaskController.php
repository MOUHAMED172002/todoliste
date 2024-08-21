<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Méthode pour les infos de la page d'accueil
    public function home(){
        $tasks = Task::all();
        $tasksCount = Task::all()->count();
        $tasksNotStarted = $tasks->where("status","NonCommencé")->count();
        $tasksRunning = $tasks->where("status","EnCours")->count();
        $tasksFinished = $tasks->where("status","Accomplie")->count();
        $categoriesCount = Category::all()->count();
        return view('home', compact('tasksCount', 'tasksNotStarted', 'tasksRunning', 'tasksFinished', 'categoriesCount'));

    }

    //Méthode pour récupérer toutes les taches et les afficher   
    public function index(Request $request) {
        // Récupération des taches
        $tasks = Task::query();
    
        // Récupération des paramètres de requête
        $keyword = $request->input('keyword');
        $category = $request->input('category');
    
        // Conditions pour vérifier le mot clé saisi ou la catégorie choisie
        if ($keyword) {
            $tasks = $tasks->where('title', 'like', '%' . $keyword . '%')
                           ->orWhere('description', 'like', '%' . $keyword . '%');
        }
        if ($category) {
            $tasks = $tasks->where('category_id', $category);
        }
    
        // Pagination après application des filtres
        $tasks = $tasks->paginate(5);
    
        $categories = Category::all();
        return view('task.index', compact('tasks', 'categories'));
    }
    
    //Méthode pour créer une nouvelle tache
    public function create(){
        $categories = Category::all();
        return view('task.create',['categories'=>$categories]);
    }

    //Méthode pour valider les données et les stocker dans la base de données
    public function store(Request $request){
        $request->validate([
            'title' => ['required','min:5', "regex:/^[A-Za-z\sàéèêîïç\-_'.,;]+$/"],
            'description' => ['required','min:8', "regex:/^[A-Za-z\sàéèêîïç\-_'.,;]+$/"],
            'status' => 'required',
            'date_due' =>[
                'required',
                'date',
                'after_or_equal:today'
            ],
            'categorie' => 'required'
        ]);

        $nouvelleTache = new Task();
        $nouvelleTache -> title = $request -> title;
        $nouvelleTache -> description = $request -> description;
        $nouvelleTache -> status = $request -> status;
        $nouvelleTache -> due_date = $request -> date_due;
        $nouvelleTache -> category_id = $request -> categorie;
        $nouvelleTache -> save();
        return redirect('/task')->with('success','La nouvelle tache a été bien enregistrée !');

    }

     //Méthode pour récupérer la tache à mettre à jour
     public function update($id){
        $categories = Category::all();
        $taskConcerne = Task::find($id);
        return view('task.update', compact('taskConcerne', 'categories'));
    }

    //Méthode pour mettre à jour la tache récupérée
    public function storeUpdate(Request $request){
        $request->validate([
            'title' => ['required','min:5', "regex:/^[A-Za-z\sàéèêîïç\-_'.,;]+$/"],
            'description' => ['required','min:8', "regex:/^[A-Za-z\sàéèêîïç\-_'.,;]+$/"],
            'status' => 'required',
            'date_due' =>[
                'required',
                'date',
                'after_or_equal:today'
            ],
            'categorie' => 'required'
        ]);

        $taskConcerne = Task::find($request->id);
        $taskConcerne -> title = $request -> title;
        $taskConcerne -> description = $request -> description;
        $taskConcerne -> status = $request -> status;
        $taskConcerne -> due_date = $request -> date_due;
        $taskConcerne -> category_id = $request -> categorie;
        $taskConcerne -> update();
        return redirect('/task')->with('success', 'La mise à jour de la tâche été éffectuée avec succès!');
    }

    //Méthode pour supprimer une tache
    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        return redirect('/task')->with('success','La suppression a été éffectuée avec succès !');
    }
}
