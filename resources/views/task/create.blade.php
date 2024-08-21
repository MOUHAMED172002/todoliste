@extends('base')

@section('title', 'Nouvelle Tâche')

@section('content')
    <div class="page-content">
        <div class="left">

        </div>
        <div class="container">
            <h3 class="society-stats">Enregistrer une nouvelle tâche</h3>

            <form action="/task/new/store" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="contenu">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Entrez le titre de la tâche" value="{{ old('title') }}">
                        </div>
                        <div class="contenu">
                            @error('title')
                                <span class="error-msg">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>

                  
                    <div class="col-md-6 mb-3">
                        <div class="contenu">
                            <label for="status" class="form-label">Statut</label>
                            <select class="form-control" id="status" name="status" {{ old('title') }}>
                                <option value="" @if(old('status') == '') selected @endif >Définissez le statut de la tâche</option>
                                <option value="NonCommencé" @if(old('status') == 'NonCommencé') selected @endif>Non Commencé</option>
                                <option value="EnCours" @if(old('status') == 'EnCours') selected @endif>En Cours</option>
                                <option value="Accomplie" @if(old('status') == 'Accomplie') selected @endif>Accomplie</option>
                            </select>
                        </div>
                        <div class="contenu">
                            @error('status')
                                <span class="error-msg">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="contenu">
                            <label for="date_due" class="form-label">Date de réalisation</label>
                            <input type="date" class="form-control" id="date_due" name="date_due" placeholder="Entrez la date de réalisation de la tâche" value="{{ old('date_due') }}">
                        </div>
                        <div class="contenu">
                            @error('date_due')
                                <span class="error-msg">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="contenu">
                            <label for="categorie" class="form-label">Catégorie</label>
                            <select class="form-control" id="categorie" name="categorie">
                            <option value=""  >Choisissez la catégorie de la tâche</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('categorie') == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contenu">
                            @error('categorie')
                                <span class="error-msg">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="contenu">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Entrez la description de la tache" >{{ old('description') }}</textarea>
                    </div>
                    <div class="contenu">
                        @error('description')
                            <span class="error-msg">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-submit">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection