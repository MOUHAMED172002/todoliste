@extends('base')

@section('title', 'Mettre à jour une catégorie')

@section('content')
    <div class="page-content">
        <h3 class="society-stats">Mettre à jour une catégorie</h3>
        <form action="/category/update/store" method="POST" >
            @csrf
            <input type="text" name="id" style="display: none;" value="{{ $categoryConcerne -> id }}">
                <div class="conteneur">
                    <div class="contenu">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $categoryConcerne -> name }}" >
                    </div>
                    <div class="contenu">
                        @error('name')
                            <span class="error-msg">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="contenu-btn">
                        <button type="submit" class="btn btn-primary btn-submit">Mettre à jour</button>
                    </div>
                </div>
        </form>
    </div>
@endsection