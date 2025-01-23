<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UsuarioService;
use App\Http\Requests\CadastrarRequest;
use App\Http\Requests\EditarRequest;
use App\Http\Requests\ListarRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $service) {}

    public function cadastrar(CadastrarRequest $request)
    {
        return response()->json(
            $this->service->cadastrar($request->validated()),
            Response::HTTP_CREATED
        );
    }

    public function editar($id, EditarRequest $request)
    {
        return response()->json(
            $this->service->editar($id, $request->validated()),
            Response::HTTP_OK
        );
    }

    public function listar(Request $request)
    {
        return response()->json(
            $this->service->listar($request->all())
        , Response::HTTP_OK);
    }

    public function recuperar(int $id)
    {
        return response()->json(
            $this->service->recuperar($id)
        , Response::HTTP_OK);
    }

    public function excluir(int $id)
    {
        return response()->json(
            $this->service->excluir($id)
        , Response::HTTP_NO_CONTENT);
    }
}
