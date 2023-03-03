<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function leaveable()
    {
        return $this->morphTo();
    }
    public function status_info()
    {
        return $this->belongsTo(Status::class, 'status');
    }
}
