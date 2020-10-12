<?php

namespace app\site\model;
use app\core\Conn;
class CategoriaModel
{
    private $pdo;

    public function __construct() {
        $this->pdo = new Conn();
    }

    public function lerPorId(int $categoriaId) {
        $sql = 'SELECT * FROM receita_categoria WHERE id = :id';

        $dr = $this->pdo->executeQueryOneRow($sql, [':id' => $categoriaId]);

        return $this->collection($dr);
    }

    public function lerTodos() {
        $sql = 'SELECT * FROM receita_categoria ORDER BY titulo ASC';

        $dt = $this->pdo->executeQuery($sql);
        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    private function collection($arr){
        return (object) [
            'id'     => $arr['id'] ?? null,
            'titulo' => $arr['titulo'] ?? null,
            'slug'   => $arr['slug'] ?? null
        ];
    }
}
