{% extends 'templates/base.volt' %}

{% block content %}

    <h1>Ingredienten</h1>
    <h2>Overzicht</h2>

    <p>
        <a href="/ingredients/create" class="btn btn-primary">Nieuw</a>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            {% for ingredient in ingredients %}
                <tr>
                    <th>{{ ingredient.id }}</th>
                    <td>{{ ingredient.name }}</td>
                    <td>
                        <a href="/ingredients/edit/{{ ingredient.id }}" class="btn btn-outline-secondary btn-sm">Bewerken</a>
                        <a href="/ingredients/delete/{{ ingredient.id }}" class="btn btn-outline-danger btn-sm">Verwijderen</a>
                    </td>
                </tr>
            {% endfor %}
        </tbody>
    </table>

{% endblock %}