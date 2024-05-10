<?php

namespace App\Services\Department;

use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DepartmentService 
{
    public function getDepartments()
    {
        $departments = Department::paginate(10);
        return $departments;
    }

    public function createDepartment(Request $request)
    {
        try{
            DB::beginTransaction();

            $data = $request->validate([
                'name' => 'required',
                'description' => 'nullable',
            ]);

            $department = Department::insert($data);

            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
            dd($exception);
        }

        return $department;
    }

    public function getDepartmentById($id){
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['error' => 'Department not found'], 404);
        }
    
        return $department;
    }

    public function updateDepartment($data , $id){

        $department = Department::find($id);

        if(!$department){
            return response()->json(['error'=> 'Department not found'], 404);
        }

        try {
            DB::beginTransaction();

            $department->update($data);

            DB::commit();
        }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()] , 404);
        }

        return $department;
    }

    public function deleteDepartment($id){
        $department = Department::find($id);

        if(!$department){
            return response()->json(['error' => 'Department not found'], 404);
        }

        try {
            DB::beginTransaction();

            $department->delete();

            DB::commit();
        }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 404);
        }
    }

}