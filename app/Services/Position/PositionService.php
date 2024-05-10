<?php

namespace App\Services\Position;

use App\Models\Position;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionService
{
    
    public function getPositions()
    {
        $positions = Position::where('is_active', 1)->orderBy('id', 'desc')->paginate(3);
        return $positions;
    }

    public function getPositionByUuid($uuid)
    {
        $position = Position::where('uuid', $uuid)->firstOrFail();
        return $position;
    }

    public function createPosition($request){
        $data = $request->validate([
            'name'=> 'required',
            'description'=> 'nullable',
            'department_id' => 'required'
        ]);

        try{
            DB::beginTransaction();

            $department = Position::create($data);

            DB::commit();
        }
        catch(Exception $exception)
        {
            DB::rollBack();
            dd($exception);
        }

        return $department;
    }

    public function updatePosition($request, $id)
    {

        $position = Position::find($id);

        $data = $request->validate([
            'name'=> 'required',
            'description'=> 'nullable',
            'department_id'=> 'required'
        ]);

        if(!$position){
            return response()->json(['error'=> 'Position not found'], 404);
        }

        try{
            DB::beginTransaction();
            
            $position->update($data);

            DB::commit();

        }
        catch(Exception $exception)
        {
            DB::rollBack();
            dd($exception);
        }
    }

    public function deletePosition($data)
    {
        try{
            DB::beginTransaction();

            $data->delete();

            $data->is_active = 0;
            $data->save();

            DB::commit();
        }
        catch(Exception $exception)
        {
            DB::rollBack();
            dd($exception);
        }
    }

}