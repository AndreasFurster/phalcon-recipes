{% extends 'templates/base.volt' %}

{% block content %}

    <h1>Recepten</h1>
    {% if authenticated %}
        <p>
            <a href="/recipes/create" class="btn btn-primary">Recept aanmaken</a>
        </p>
    {% endif %}

    <div class="row">
        {% for recipe in recipes %}
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ recipe.image }}" alt="{{ recipe.title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ recipe.title }}</h5>
                        <p class="card-text">{{ recipe.subtitle }}</p>
                        <a href="/recipes/view/{{ recipe.id }}" class="btn btn-primary">Bekijk</a>
                        {% if authenticated %}
                            <a href="/recipes/edit/{{ recipe.id }}" class="btn btn-outline-secondary">Bewerken</a>
                            <a href="/recipes/delete/{{ recipe.id }}" class="btn btn-outline-danger">Verwijderen</a>
                        {% endif %}
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>

{% endblock %}