<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Notes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="./css/app.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <div class="content">
                <a href="/" title="Accueil"><img class="mainLogo" src="{{ asset('./img/mainLogo.svg') }}" alt="My Notes" /></a>
                <ul class="mainMenu">
                    <li><a class="button button-grey" href="/notes" title="Notes">Notes</a></li>
                    <li><a class="button button-grey" href="/skills" title="Compétences">Compétences</a></li>
                </ul>
            </div>
        </header>

        @yield('content')

        <footer>
            <p>&copy; Copyright Thibaut Van Callemont 2020</p>
        </footer>
        
        <!--<script src="./js/app.js"></script>-->
    </body>
</html>