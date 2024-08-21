@extends('base')

@section('title', 'Formulaire catégorie')

@section('content')
<div class="page-content">
    <h3 class="society-stats">Enregistrer une nouvelle catégorie</h3>
    <form action="/category/new/store" method="POST">
        @csrf
            <div class="conteneur">
                <div class="contenu">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la catégorie" value="{{ old('name') }}" >
                </div>
                <div class="contenu">
                    @error('name')
                        <span class="error-msg">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="contenu-btn">
                    <button type="submit" class="btn btn-primary btn-submit">Enregistrer</button>
                </div>
            </div>
    </form>
</div>
@endsection