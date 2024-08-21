@extends('base')

@section('title', 'Menu catégorie')

@section('content')
    <div class="page-content">
        <h3 class="society-stats">Liste des catégories</h3>
        <table class="table table-striped table-categorie">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $identifiant = 1;
                @endphp
                @foreach ($categories as $categorie)
                    <tr>
                        <th scope="row">{{ $identifiant }}</th>
                        <td>{{ $categorie->name }}</td>
                        <td>
                            <a href="/category/update/{{ $categorie->id }}" class="btn btn-info">Update</a>
                            <a href="/category/destroy/{{ $categorie->id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @php
                        $identifiant += 1;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
@endsection