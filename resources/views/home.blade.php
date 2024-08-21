@extends('base')

@section('title', 'Page d\'accueil')

@section('content')
    <div class="page-content">
        <div class="society-info">
            <span class="welcome">
                Bienvenue chez
                <span class="navbar-brand">AllSafe</span>
            </span><br>
            <span class="accroche">votre gestionnaire de tâche au quotidien .</span>
        </div>
        <p class="society-description">
            <span class="navbar-brand">AllSafe</span> est une application conçue pour simplifier la vie des utilisateurs en leur proposant des
            services tels que la création et la planification, la mise à jour, la suppression des tâches et un système de notification leur permettant de recevoir des informations en temps réel concernant leurs tâches.
        </p>
        <h3 class="society-stats">Tableau de bord</h3>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Total Tâches</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $tasksCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Total Catégories</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $categoriesCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Total Tâches Non Commencées</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $tasksNotStarted }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Total Tâches en Cours</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $tasksRunning }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Total Tâches Accomplies</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $tasksFinished }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection