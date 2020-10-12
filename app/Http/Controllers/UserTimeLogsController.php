<?php

namespace App\Http\Controllers;

use App\Services\getTimeLogByUsersService;
use Illuminate\Http\Request;

class UserTimeLogsController extends Controller
{
    private $getTimeLogByUsersService;

    public function __construct(getTimeLogByUsersService $getTimeLogByUsersService)
    {
        $this->getTimeLogByUsersService = $getTimeLogByUsersService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
