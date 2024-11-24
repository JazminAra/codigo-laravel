<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Times New Roman';
            background-color: #f4f4f4;
            color: #333;
        }
        hr {
            height: 1px;
            background-color: red;
            margin: 5px 0;
        }
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #ffffff;
            padding: 4px 8px; 
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-around;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar div {
            flex: 1;
            text-align: center;
        }
        .navbar a {
            /* color: #007bff;  */
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
            transition: color 0.3s;
            font-weight: bold;
            background-color: blue;
            border-radius: 5px;
            color: white;
        }
        .navbar .activo a {
            color: red;
            text-decoration: underline;
        }
        .navbar a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="{{ setActivo('home') }}"><a href="{{ route('home') }}">Home</a></div>
        <div class="{{ setActivo('servicios.index') }}"><a href="{{ route('servicios.index') }}">Servicios</a></div>
        <div class="{{ setActivo('contacto') }}"><a href="{{ route('contacto') }}">Contacto</a></div>
        
        @guest
            <div><a href="{{ route('login') }}">Login</a></div>
        @else
            <div>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            </div>
        @endguest
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <hr>
</body>
</html>
