<?php

namespace Tests\Unit;

use App\Models\UsuarioModel;
use App\Repositories\UsuarioRepository;
use App\Services\UsuarioService;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Response;
use Mockery;

class UsuarioServiceTest extends TestCase
{
    protected $usuarioRepository;
    protected $usuarioService;

    public function setUp(): void
    {
        parent::setUp();
        $this->usuarioRepository = Mockery::mock(UsuarioRepository::class);
        $this->usuarioService = new UsuarioService($this->usuarioRepository);
    }

    public function testCadastrar()
    {
        $params = ['nome' => 'João', 'email' => 'joao@example.com'];

        $this->usuarioRepository
            ->shouldReceive('cadastrar')
            ->with($params)
            ->once()
            ->andReturn(new UsuarioModel($params));

        $usuario = $this->usuarioService->cadastrar($params);

        $this->assertInstanceOf(UsuarioModel::class, $usuario);
        $this->assertEquals('João', $usuario->nome);
        $this->assertEquals('joao@example.com', $usuario->email);
    }

    public function testListar()
    {
        $params = [];
        $response = [['id' => 1, 'nome' => 'João'], ['id' => 2, 'nome' => 'Maria']];

        $this->usuarioRepository
            ->shouldReceive('listar')
            ->with($params)
            ->once()
            ->andReturn($response);

        $usuarios = $this->usuarioService->listar($params);

        $this->assertIsArray($usuarios);
    }

    public function testRecuperar()
    {
        $id = 1;
        $usuarioModel = new UsuarioModel(['id' => $id, 'nome' => 'João']);

        $this->usuarioRepository
            ->shouldReceive('recuperar')
            ->with($id)
            ->once()
            ->andReturn($usuarioModel);

        $usuario = $this->usuarioService->recuperar($id);

        $this->assertInstanceOf(UsuarioModel::class, $usuario);
        $this->assertEquals('João', $usuario->nome);
    }

    public function testExcluir()
    {
        $id = 1;
        $usuarioModel = new UsuarioModel(['id' => $id, 'nome' => 'João']);

        $this->usuarioRepository
            ->shouldReceive('recuperar')
            ->with($id)
            ->once()
            ->andReturn($usuarioModel);

        $this->usuarioRepository
            ->shouldReceive('excluir')
            ->with($usuarioModel)
            ->once();

        $result = $this->usuarioService->excluir($id);

        $this->assertTrue($result);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
