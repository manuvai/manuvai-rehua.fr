<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Manuvai REHUA</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script type="application/javascript" async=false defer=false src="https://platform.linkedin.com/badges/js/profile.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar header navbar-expand-lg navbar-light bg-light fixed-top">
                <router-link to="/#intro" class="navbar-brand">Manuvai REHUA</router-link>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            
                            <router-link  class="nav-link" to="/#about">&Agrave; propos</a>
                        </li>
                        <li class="nav-item">
                            
                            <router-link  class="nav-link" to="/#skills">Comp&eacute;tences</a>
                        </li>
                        <li class="nav-item">
                            
                            <router-link  class="nav-link" to="/#portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            
                            <router-link  class="nav-link" to="/#experiences">Exp&eacute;riences</a>
                        </li>
                        <li class="nav-item">
                            <router-link  class="nav-link" to="/#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="container">
                <router-view/>

            </div>
            <footer class="d-flex justify-content-center pt-2">
                <p>
                    Site d&eacute;velopp&eacute; par Manuvai REHUA &copy; 2021
                </p>
            </footer>
        </div>

    </body>
</html>
