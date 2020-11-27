<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Notes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ url('./css/app.css') }}" rel="stylesheet" />

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>
    <body>
        <header>
            <div class="content">
                <a href="/" title="Accueil"><img class="mainLogo" src="{{ asset('./img/mainLogoWhite.svg') }}" alt="My Notes" /></a>
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
        
        <script src="{{ url('./js/app.js') }}"></script>
    </body>
</html>