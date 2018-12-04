{% extends 'templates/base.volt' %}

{% block content %}
    <h1>Ingredienten</h1>
    <h2>Nieuw</h2>

    <form action="/ingredients/create" class="form-horizontal" method="post">
        <div class="form-group row">
            <label for="ingredientName" class="col-md-3 col-form-label">Naam</label>
            <div class="col-md-9">
                <input type="text" id="ingredientName" name="name" class="form-control">
            </div>
        </div>

        <input type="submit" value="Opslaan" class="btn btn-primary">
    </form>
{% endblock %}
