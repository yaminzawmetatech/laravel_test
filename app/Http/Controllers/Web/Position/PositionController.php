<?php

namespace App\Http\Controllers\Web\Position;

use App\Http\Controllers\Controller;
use App\Services\Department\DepartmentService;
use App\Services\Position\PositionService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    //
    protected PositionService $positionService;
    protected DepartmentService $departmentService;

    public function __construct(PositionService $positionService, DepartmentService $departmentService)
    {
        $this->positionService = $positionService;
        $this->departmentService = $departmentService;
    }


    public function index()
    {
        $positions = $this->positionService->getPositions();
        return view('position.index')->with('positions', $positions);

    }

    public function create()
    {
        $departments = $this->departmentService->getDepartments();
        return view('position.create')->with('departments', $departments);
    }

    public function store(Request $request)
    {
        $this->positionService->createPosition($request);

        return redirect()->route('positions.index')->withSuccess('Position created successfully');
    }

    public function edit(String $uuid)
    {
        $departments = $this->departmentService->getDepartments();
        $position = $this->positionService->getPositionByUuid($uuid);

        return view('position.edit')->with('departments',$departments)->with('position', $position);
    }

    public function update(Request $request, String $uuid)
    {
        $position = $this->positionService->getPositionByUuid($uuid);
        $this->positionService->updatePosition($request, $position->id);
        return redirect()->route('positions.index')->withSuccess('Position Updated Successfully');
    }

    public function destroy(String $uuid)
    {
        $position = $this->positionService->getPositionByUuid($uuid);
        $this->positionService->deletePosition($position);
        return redirect()->route('positions.index')->withSuccess('Position Deleted Successfully');
    }

    public function show(String $uuid)
    {
        $position = $this->positionService->getPositionByUuid($uuid);
        return view("position.show")->with('position', $position);
    }

}
