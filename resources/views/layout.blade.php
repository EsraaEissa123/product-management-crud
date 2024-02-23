<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        img {
            width: 200px;
            height: 100px;
        }

        .black {
            color: black;
        }

        /* Example CSS */
        .navbar {
            background-color: #333;
            border: none;
        }

        .navbar-brand {
            color: white;
        }

        .icon-bar {
            background-color: white;
        }

        .navbar-icons {
            color: white;
            font-weight: bold;
            text-decoration: none;
            margin-left: 20px;
        }

        .navbar-icons:hover {
            color: lightgray;
            /* Change color on hover if desired */
        }
    </style>
    @yield('styles')
    <title>Products</title>
</head>

<body>
    <nav class="navbar">
        <div class="container d-flex justify-content-between">
            <div>
                <a class="navbar-brand" href="#">Your Brand</a>
            </div>
            <div>
                <a class="navbar-icons ml-3" href="{{ route(" products.index") }}">Products</a>
                <a class="navbar-icons ml-3" href="{{ route(" pharmacies.index") }}">Pharmacies</a>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>
