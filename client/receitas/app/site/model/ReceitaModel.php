<?php

namespace app\site\model;

use app\core\Conn;
use app\site\entities\Receita;

class ReceitaModel
{
    private $pdo;

    public function __construct() {
        $this->pdo = new Conn();
    }

    public function lerPorId(int $receitaId) {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN receita_categoria c ON c.id = r.categoria_id WHERE r.id = :id';
        $dr = $this->pdo->executeQueryOneRow($sql, [
            ':id' => $receitaId
        ]);

        return $this->collection($dr);
    }

    public function lerPorSlug(string $slug) {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN receita_categoria c ON c.id = r.categoria_id WHERE r.slug = :slug';
        $dr = $this->pdo->executeQueryOneRow($sql, [
            ':slug' => $slug
        ]);

        return $this->collection($dr);
    }

    public function lerUltimos($limit = 10) {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN receita_categoria c ON c.id = r.categoria_id ORDER BY r.data DESC LIMIT :limit';
        $dt = $this->pdo->executeQuery($sql, [
            ':limit' => $limit
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function lerTodosPorCategoria(int $categoriaId) {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN receita_categoria c ON c.id = r.categoria_id WHERE r.categoria_id = :categoriaid ORDER BY r.data DESC ';
        $dt = $this->pdo->executeQuery($sql, [
            ':categoriaid' => $categoriaId
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function lerPorCategoriaLimit(int $categoriaId, $limit = 10) {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN receita_categoria c ON c.id = r.categoria_id WHERE r.categoria_id = :categoriaid ORDER BY r.data DESC LIMIT :limit';
        $dt = $this->pdo->executeQuery($sql, [
            ':categoriaid' => $categoriaId,
            ':limit' => $limit
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function pesquisar(string $termo) {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN receita_categoria c ON c.id = r.categoria_id WHERE UPPER(r.titulo) LIKE :titulo OR UPPER(r.linha_fina) LIKE :linhafina ORDER BY r.titulo ASC ';
        $dt = $this->pdo->executeQuery($sql, [
            ':titulo' => strtoupper("%{$termo}%"),
            ':linhafina' => strtoupper("%{$termo}%")
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    private function collection($arr) {
        $receita = new Receita();
        $receita->setId($arr['id'] ?? null);
        $receita->setTitulo($arr['titulo'] ?? null);
        $receita->setSlug($arr['slug'] ?? null);
        $receita->setLinhaFina($arr['linha_fina'] ?? null);
        $receita->setDescricao(html_entity_decode($arr['descricao'] ?? null));
        $receita->setCategoriaId($arr['categoria_id'] ?? null);
        $receita->setCategoriaTitulo($arr['cattitulo'] ?? null);
        $receita->setThumb($arr['thumb'] ?? null);
        $receita->setData($arr['data'] ?? null);
        return $receita;
    }
}
