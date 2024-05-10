<?php

namespace App\Models;

use App\Foundations\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;



class Position extends Model
{
    use HasFactory, HasUUID, SoftDeletes;

    protected $fillable = ['name', 'description', 'department_id', 'is_active'];

    protected $with = ['department'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}


