{% extends 'templates/base.volt' %}

{% block content %}
    <h1>Account</h1>
    <h2>Inloggen</h2>

    <form action="/account/login" class="form-horizontal" method="post">
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email</label>
            <div class="col-md-9">
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label">Wachtwoord</label>
            <div class="col-md-9">
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>

        <input type="submit" value="Inloggen" class="btn btn-primary">
    </form>
{% endblock %}
