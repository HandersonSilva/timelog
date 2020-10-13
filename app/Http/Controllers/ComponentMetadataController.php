<?php

namespace App\Http\Controllers;

use App\Services\ComponentMetadataService;
use App\Services\getTimeLogByUsersService;
use Illuminate\Http\Request;

class ComponentMetadataController extends Controller
{
    private $componentMetadataService;

    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * ComponentMetadataController constructor.
     * @param ComponentMetadataService $componentMetadataService
     */
    public function __construct(ComponentMetadataService $componentMetadataService)
    {
        $this->componentMetadataService = $componentMetadataService;
    }

    /**
     * Método responsável por executar a service e retornar um json
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $objs = $this->componentMetadataService->execute();
        return response()->json($objs);
    }
}
