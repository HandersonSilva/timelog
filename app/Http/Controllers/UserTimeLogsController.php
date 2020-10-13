<?php

namespace App\Http\Controllers;

use App\Services\getTimeLogByUsersService;
use Illuminate\Http\Request;

class UserTimeLogsController extends Controller
{
    private $getTimeLogByUsersService;

    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * UserTimeLogsController constructor.
     * @param getTimeLogByUsersService $getTimeLogByUsersService
     */
    public function __construct(getTimeLogByUsersService $getTimeLogByUsersService)
    {
        $this->getTimeLogByUsersService = $getTimeLogByUsersService;
    }

    /**
     * Método responsável por executar a service e retornar um json
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        try{
            $objs = $this->getTimeLogByUsersService->execute();
            return response()->json($objs);
        }catch (\Exception $e){
            return response()->json('erro', 500);
        }
    }
}
