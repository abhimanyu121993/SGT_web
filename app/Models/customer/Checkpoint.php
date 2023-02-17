<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function getQrCodeAttribute()
    {
        $image=QrCode::format('png')
                         ->merge(public_path('app-assets/images/logo/sgtlogo.jpeg'), 0.5, true)
                         ->size(500)
                         ->errorCorrection('H')->generate($this->checkpoint_id);
                        //  return response($image)->header('Content-type','image/png');
                        return $image;
    }
}
