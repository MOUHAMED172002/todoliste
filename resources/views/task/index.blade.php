@extends('base')

@section('title', 'Liste tâches')

@section('content')
    <div class="page-content">
        <form method="GET">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="contenu">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Rechercher une tache par titre ou description" value="{{ old('keyword') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="contenu">
                        <select class="form-control" id="category" name="category">
                            <option value="">Toutes les catégories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-submit">Filtrer</button>
        </form>
        <h3 class="society-stats">Liste des tâches</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Date de réalisation</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $identifiant = 1;
                @endphp
                @foreach ($tasks as $task)
                    <tr>
                        <th scope="row">{{ $identifiant }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        @foreach ($categories as $category)
                            @if ($category->id === $task->category_id)
                                <td>{{ $category->name }}</td>
                            @endif
                        @endforeach
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <a href="/task/update/{{ $task->id }}" class="btn btn-info">Update</a>
                            <a href="/task/destroy/{{ $task->id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @php
                        $identifiant += 1;
                    @endphp
                @endforeach
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
@endsection