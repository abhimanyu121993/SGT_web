<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckpointHasTask extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
