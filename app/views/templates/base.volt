<!DOCTYPE html>
<html lang="nl-NL">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css" />

        <!-- include summernote css -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <title>Recepten applicatie</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="/">Recepten</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        {% if authenticated %}
                            <li class="nav-item">
                                <a class="nav-link" href="/ingredients">Ingredienten</a>
                            </li>
                        {% endif %}
                        
                    </ul>
                </div>
                <div class="navbar-nav">
                    {% if authenticated %}
                        <div class="nav-item">
                            Welkom {{ email }}
                            <a class="btn btn-secondary" href="/account/logout">Uitloggen</a>
                        </div>
                    {% else %}
                        <div class="nav-item">
                            <a class="btn btn-secondary" href="/account/login">Inloggen</a>
                        </div>
                    {% endif %}
                </div>
            </div>
        </nav>

        <div class="container">
            {{ this.flashSession.output() }}
            {% block content %}{% endblock %}
        </div>
        {% block contentfluid %}{% endblock %}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- include summernote js -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    </body>
</html>