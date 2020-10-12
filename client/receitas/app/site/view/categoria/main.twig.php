{% extends "partials/body.twig.php" %}

{% block title %} Categorias -  Receitas {% endblock %}

{% block body %}
<h1>Categorias</h1>

<hr>

<div class="overflow-auto">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            {% for categoria in listaCategoria %}
            <tr>
                <td>{{ categoria.titulo }}</td>
                <td>{{ categoria.slug }}</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}