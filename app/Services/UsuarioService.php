<?php
namespace App\Services;

use App\Models\UsuarioModel;
use App\Repositories\UsuarioRepository;

class UsuarioService
{

    public function __construct(protected UsuarioRepository $repository)
    {}

    public function cadastrar(array $params): UsuarioModel
    {
        return $this->repository->cadastrar($params);
    }

    public function editar($id, array $params): UsuarioModel
    {
        $model = $this->recuperar($id);
        $this->repository->editar($model, $params);
        return $model;
    }

    public function listar(array $params): array
    {
        $items = $this->repository->listar($params);

        if (count($items) < 1) {
            return response()->json(['message' => 'Nenhum resultado encontrado'], 404);
        }

        return $items;
    }

    public function recuperar(int $id): UsuarioModel
    {
        $model = $this->repository->recuperar($id);

        if (!$model) {
            return response()->json(['message' => 'Nenhum resultado encontrado'], 404);
        }

        return $model;
    }

    public function excluir(int $id): bool
    {
        $model = $this->recuperar($id);

        $this->repository->excluir($model);
        return true;
    }
}
