<?php

namespace App\Http\Controllers\Api\Position;

use App\Http\Controllers\Controller;
use App\Services\Position\PositionService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected PositionService $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    public function index()
    {
        $positions = $this->positionService->getPositions();
        return $positions;

    }

    public function store(Request $request)
    {
        $response = $this->positionService->createPosition($request);

        return $response;
    }
    

    public function update(Request $request , String $uuid)
    {
        $position = $this->positionService->getPositionByUuid($uuid);
        return $this->positionService->updatePosition($request , $position->id);
    }

    public function destroy(String $uuid)
    {
        $position = $this->positionService->getPositionByUuid($uuid);
        return $this->positionService->deletePosition($position);
    }

}
