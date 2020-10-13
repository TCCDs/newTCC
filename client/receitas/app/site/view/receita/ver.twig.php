{% extends "partials/body.twig.php" %}

{% block title %} {{receita.titulo}} - My Receitas {% endblock %}

{% block body %}
<h1>{{receita.titulo}}</h1>
<h5>{{receita.linhaFina}}</h5>


<div class="mt-3">
    {{receita.descricao | raw}}
</div>

<hr>

{% endblock %}