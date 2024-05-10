<?php

namespace App\Http\Controllers\Web\Department;

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

        return view('department.index')->with('departments',$departments);
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $this->departmentService->createDepartment($request);
        
        return redirect()->route('departments.index')->withSuccess('Department created successfully');
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

    public function edit(String $id){

        $department = Department::find($id);

        return view('department.edit')->with('department', $department);
    }

    public function update(Request $request, String $id){

        $data = $request->validate([
            'name' => 'required',
            'description'=> 'nullable'
        ]);

        $this->departmentService->updateDepartment($data , $id);

        return redirect()->route('departments.index')->withSuccess('Department Updated Successfully');

    }

    public function destroy(String $id)
    {
        $this->departmentService->deleteDepartment($id);

        return redirect()->route('departments.index')->withSuccess('Department deleted successfully');

    }


}
