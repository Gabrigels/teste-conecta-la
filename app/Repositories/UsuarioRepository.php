<?php
namespace App\Repositories;

use App\Models\UsuarioModel;

class UsuarioRepository
{
    public function __construct(private UsuarioModel $model)
    {

    }

    public function cadastrar(array $params): UsuarioModel
    {
        $model = $this->model->fill($params);
        $model->senha = md5($params['senha']);
        $model->ativo = true;
        $model->save();
        return $model;
    }

    public function editar(UsuarioModel $usuario, $params)
    {
        $usuario->fill($params);
        $usuario->senha = md5($params['senha']);
        $usuario->update();
    }

    public function listar(array $params): array
    {
        $query = $this->model::where('ativo', true);

        if (isset($params['nome']) && !empty($params['nome'])) {
            $query->where("nome", 'ilike', "%" . $params['nome'] . "%");
        }

        if (isset($params['email']) && !empty($params['email'])) {
            $query->where("email", 'ilike', "%" . $params['email'] . "%");
        }

        return $query->get()->toArray();
    }

    public function recuperar(int $id):? UsuarioModel
    {
        return $this->model::find($id);
    }

    public function excluir(UsuarioModel $model): void
    {
        $model->ativo = false;
        $model->update();
    }
}
