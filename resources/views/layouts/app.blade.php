<html>

<head>
    <title>Empty shop</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #9C27B0;
            color: white;
            text-align: center;
        }
        #app{
            margin-left: 50px;
            margin-right: 50px;
        }
    </style>

</head>

<body>
    <div id="app">
        <nav id='navigation' class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="http://127.0.0.1:8000/">Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stores">Stores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="storedproducts">Stored products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="urls">URLs</a>
                    </li>
                    </ul>
                    <span class="navbar-text">
                        Admin panel
                    </span>
                </div>
            </nav>
        @show
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!--@section('sidebar')

    @show

    <div class="container">
        @yield('content')
    </div>-->
    <div class="text-center footer">

        <h4>+381 64 101 38 08</h4>
        <h4>goran.krahtis@gmail.com</h4>

    </div>
</body>

</html>