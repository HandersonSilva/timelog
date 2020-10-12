<?php

namespace App\Http\Controllers;

use App\Services\ComponentMetadataService;
use App\Services\getTimeLogByUsersService;
use Illuminate\Http\Request;

class ComponentMetadataController extends Controller
{
    private $componentMetadataService;

    public function __construct(ComponentMetadataService $componentMetadataService)
    {
        $this->componentMetadataService = $componentMetadataService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $objs = $this->componentMetadataService->execute();
        return response()->json($objs);
    }
}
