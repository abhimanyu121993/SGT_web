<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkpoint extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function checkpointhastask()
    {
        return $this->hasMany(CheckpointHasTask::class, 'checkpoint_id','id');
    }
}
