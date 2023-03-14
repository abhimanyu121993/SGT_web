<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingReport extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function state_info()
    {
        return $this->belongsTo(State::class, 'state');
    }
}
