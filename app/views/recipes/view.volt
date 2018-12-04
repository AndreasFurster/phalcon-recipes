{% extends 'templates/base.volt' %}

{% block contentfluid %}

    <div class="jumbotron jumbotron-fluid recipe-jumbotron" style="background-image: url('{{ recipe.image }}');">
        <div class="container">
            <div class="recipe-heading">
                <h1 class="display-4">{{ recipe.title }}</h1>
                <p class="lead">{{ recipe.subtitle}}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Ingredienten</h2>
        <ul>
            {% for recipe_ingredient in recipe_ingredients %}
                <li>{{ recipe_ingredient.amount }} {{ recipe_ingredient.ingredient.name }}</li>
            {% endfor %}
        </ul>

        <h2>Recept</h2>
        {{ recipe.instruction }}
    </div>

{% endblock %}