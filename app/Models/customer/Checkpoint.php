<?php

namespace App\Models\customer;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Spatie\Activitylog\Facades\CauserResolver;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Checkpoint extends Model
{
    use HasFactory,SoftDeletes,LogsActivity;
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
     //revoke role and permission on delete 
     public function getActivitylogOptions(): LogOptions
     {
         return LogOptions::defaults()->logAll();
         // Chain fluent methods for configuration options
     }
     public function tapActivity(Activity $activity, string $eventName)
     {
         
             $activity->causer_type = get_class(Auth::guard(Helper::getGuard())->user());
             $activity->causer_id=Helper::getUserId();
         
     }
}
