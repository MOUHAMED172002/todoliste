<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/styles.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">AllSafe<span>.</span></a>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" active href="/" >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category/new" >New category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category/" >All categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/task/new" >New task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/task/" >All tasks</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <hr>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}} 
            </div>
        @endif
        @yield('content')
    </div>

    <script src="{{asset('/assets/bootstrap.bundle.min.js')}}"></script>
</body>
</html>