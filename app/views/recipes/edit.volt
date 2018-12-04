{% extends 'templates/base.volt' %}

{% block content %}
    <h1>Recept</h1>
    <h2>Bewerken</h2>

    <form action="/recipes/edit/{{ recipe.id }}" class="form-horizontal" method="post">
        <div class="form-group row">
            <label for="recipeTitle" class="col-md-3 col-form-label">Naam recept</label>
            <div class="col-md-9">
                <input type="text" id="recipeTitle" name="title" class="form-control" value="{{ recipe.title }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="recipeImage" class="col-md-3 col-form-label">Url naar foto</label>
            <div class="col-md-9">
                <input type="text" id="recipeImage" name="image" class="form-control" value="{{ recipe.image }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="recipeSubTitle" class="col-md-3 col-form-label">Korte omschrijving</label>
            <div class="col-md-9">
                <input type="text" id="recipeSubTitle" name="subtitle" class="form-control" value="{{ recipe.subtitle }}" required>
            </div>
        </div>
        <div class="row">
            <span class="col-md-3 col-form-label">Ingredienten</span>
            <div class="col-md-9">
                {% if recipe.id %}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hoeveelheid</th>
                                <th>Naam</th>
                                <th>Actie</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for recipe_ingredient in recipe_ingredients %}
                                <tr>
                                    <td>{{ recipe_ingredient.amount }}</td>
                                    <td>{{ recipe_ingredient.ingredient.name }}</td>
                                    <td>
                                        <button type="submit" name="remove_recipe_ingredient" value="{{ recipe_ingredient.id }}" class="btn btn-outline-danger btn-sm">Verwijderen</button>
                                    </td>
                                </tr>
                            {% endfor %}
                            <tr>
                                <td><input type="text" name="recipe_ingredient_amount" class="form-control form-control-sm"></td>
                                <td>
                                    <select name="recipe_ingredient_id" class="form-control form-control-sm">
                                        {% for ingredient in ingredients %}
                                            <option value="{{ ingredient['id'] }}">{{ ingredient['name'] }}</option>
                                        {% endfor %}
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" name="add_recipe_ingredient" value="yes" class="btn btn-primary btn-sm">Toevoegen</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                {% else %}
                    <p><i>Klik op opslaan om ingredienten toe te voegen.</i></p>
                {% endif %}
            </div>
        </div>
        
        <div class="form-group row">
            <label for="recipeDescription" class="col-md-3 col-form-label">Recept</label>
            <div class="col-md-9">
                <textarea type="text" id="recipeDescription" rows="20" name="instruction" class="form-control">{{ recipe.instruction }}</textarea>
                <script>
                    $(document).ready(function() {
                        $('#recipeDescription').summernote({
                            height: 600
                        });
                    });
                </script>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 offset-md-3">
                <button type="submit" name="save_recipe" value="save" class="btn btn-primary">Opslaan</button>
            </div>
        </div>
    </form>
{% endblock %}
