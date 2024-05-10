<?php

namespace App\Http\Controllers\Api\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Services\Department\DepartmentService;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    protected DepartmentService $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = $this->departmentService->getDepartments();

        return $departments;

    }

    public function store(Request $request)
    {
        $response = $this->departmentService->createDepartment($request);
        
        return $response;
    }

    public function show(String $id)
    {
        $result = $this->departmentService->getDepartmentById($id);

        if ($result instanceof JsonResponse) {
            $errorMessage = $result->getData()->error;
            return redirect()->route('departments.index')->with('error', $errorMessage);
        }

        return $result;
    }

    public function update(Request $request, String $id){

        $data = $request->validate([
            'name' => 'required',
            'description'=> 'nullable'
        ]);

        $result = $this->departmentService->updateDepartment($data,$id);

        return $result;

    }

    public function destroy(String $id){
        $result = $this->departmentService->deleteDepartment($id);

        return $result;
    }

}
